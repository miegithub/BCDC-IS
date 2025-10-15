<?php 



session_start();
include('../admin/config/dbcon.php');



if (isset($_POST['update_username'])) {
    $userID = $_POST['ID']; // User ID
    $newUsername = $_POST['username']; // New username input
    $currentPassword = $_POST['current_password']; // Current password input

    // Query to get the stored password from the database
    $query = "SELECT password FROM user WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($db_password);
        $stmt->fetch();

        // Check if the current password matches the stored password
        if ($currentPassword === $db_password) {
            // Update query to set the new username
            $update_query = "UPDATE user SET username = ? WHERE id = ?";
            $update_stmt = $con->prepare($update_query);
            $update_stmt->bind_param("si", $newUsername, $userID);

            if ($update_stmt->execute()) {
                $_SESSION['status'] = "Username updated successfully.";
                $_SESSION['status_type'] = "success";
            } else {
                $_SESSION['status'] = "Error updating username.";
                $_SESSION['status_type'] = "danger";
            }
        } else {
            $_SESSION['status'] = "Current password is incorrect!";
            $_SESSION['status_type'] = "danger";
        }
    } else {
        $_SESSION['status'] = "User not found.";
        $_SESSION['status_type'] = "danger";
    }

    header("Location: setting.php?setting=$userID");
    exit();
}

if (isset($_POST['update_password'])) {
    $userID = $_POST['ID'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    $query = "SELECT password FROM user WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($db_password);
        $stmt->fetch();

        if ($current_password === $db_password) {
            if ($new_password === $confirm_new_password) {
                $update_query = "UPDATE user SET password = ? WHERE id = ?";
                $update_stmt = $con->prepare($update_query);
                $update_stmt->bind_param("si", $new_password, $userID);

                if ($update_stmt->execute()) {
                    $_SESSION['status'] = "Password updated successfully.";
                    $_SESSION['status_type'] = "success";
                } else {
                    $_SESSION['status'] = "Error updating password.";
                    $_SESSION['status_type'] = "danger";
                }
            } else {
                $_SESSION['status'] = "New passwords do not match.";
                $_SESSION['status_type'] = "warning";
            }
        } else {
            $_SESSION['status'] = "Current password is incorrect!";
            $_SESSION['status_type'] = "danger";
        }
    } else {
        $_SESSION['status'] = "User not found.";
        $_SESSION['status_type'] = "danger";
    }

    header("Location: setting.php?setting=$userID");
    exit();
}




?>