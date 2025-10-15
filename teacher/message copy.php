<?php 
if (isset($_SESSION['message'])) :
?>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <!-- Add Toastr CSS -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />


<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: '<?= $_SESSION['message']; ?>',
        showConfirmButton: false,
        timer: 3000,
        
        customClass: {
            popup: 'colored-toast'
           
        }

    });
</script>

<style>
/* SweetAlert2 toast colors */
.colored-toast.swal2-icon-success {
     background-color: rgba(255, 255, 255, 0.8) !important;
    
   
}

/* Adjust text and checkmark size */
.colored-toast .swal2-title,
.colored-toast .swal2-close,
.colored-toast .swal2-html-container {
    color: black; 
}

</style>

<?php 
unset($_SESSION['message']);
endif;
?>
