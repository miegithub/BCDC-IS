<style>
    .notifications{
        position: fixed;
        top: 30px;
        right: 20px;
    }
    
    .toasts{
        border: 1px solid rgba(0,0,0,0.1);
        position: relative;
        padding: 10px;
        color: black;
        margin-bottom: 10px;
        width: 330px;
        display: grid;
        grid-template-columns: 70px 1fr 70px;
        border-radius: 5px;
        --color: #0abf30;
        background-image: 
            linear-gradient(
                to right, #0abf3055, white 100%
            ); 
        animation: show 0.3s ease 1 forwards  
    }
    .toasts .icon{
        color: var(--color);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: xx-large;
    }
    .toasts .title{
        font-size: x-large;
        font-weight: bold;
    }
    .toasts span, .toasts .icon:nth-child(3){
        color: black;
        opacity: 0.6;
    }
    @keyframes show{
        0%{
            transform: translateX(100%);
        }
        40%{
            transform: translateX(-5%);
        }
        80%{
            transform: translateX(0%);
        }
        100%{
            transform: translateX(-10%);
        }
    }
    .toasts.error{
        --color: #f24d4c;
        background-image: 
            linear-gradient(
                to right, #f24d4c55, white 100%
            );
    }
    .toasts.warning{
        --color: #e9bd0c;
        background-image: 
            linear-gradient(
                to right, #e9bd0c55, white 100%
            );
    }
    .toasts.info{
        --color: #3498db;
        background-image: 
            linear-gradient(
                to right, #3498db55, white 100%
            );
    }
</style>

<?php 

if(isset($_SESSION['message'])){
    if($_SESSION['message'] == "Success"){
        ?>
        <div class="notifications">
            <div class="toasts successs d-flex justify-content-around">
                <i class="icon fa-solid fa-circle-check mt-2"></i>
                <div class="content">
                    <div class="title"><?= $_SESSION['title']; ?></div>
                    <span><?= $_SESSION['message2']; ?></span>
                </div>
                <i class="icon fa-solid fa-xmark mt-2" onclick="(this.parentElement).remove()"></i>
            </div>
        </div>
        <?php
    }
    elseif($_SESSION['message'] == "Error"){
        ?>
        <div class="notifications">
            <div class="toasts error d-flex justify-content-around">
                <i class="icon fa-solid fa-circle-exclamation mt-2"></i>
                <div class="content">
                    <div class="title"><?= $_SESSION['title']; ?></div>
                    <span><?= $_SESSION['message2']; ?></span>
                </div>
                <i class="icon fa-solid fa-xmark mt-2" onclick="(this.parentElement).remove()"></i>
            </div>
        </div>
        <?php
    }
    elseif($_SESSION['message'] == "Warning"){
        ?>
        <div class="notifications">
            <div class="toasts warning d-flex justify-content-around">
                <i class="icon fa-triangle-exclamation mt-2"></i>
                <div class="content">
                    <div class="title"><?= $_SESSION['title']; ?></div>
                    <span><?= $_SESSION['message2']; ?></span>
                </div>
                <i class="icon fa-solid fa-xmark mt-2" onclick="(this.parentElement).remove()"></i>
            </div>
        </div>
        <?php
    }
    elseif($_SESSION['message'] == "Info"){
        ?>
        <div class="notifications">
            <div class="toasts info d-flex justify-content-around">
                <i class="icon fa-solid fa-circle-info mt-2"></i>
                <div class="content">
                    <div class="title"><?= $_SESSION['title']; ?></div>
                    <span><?= $_SESSION['message2']; ?></span>
                </div>
                <i class="icon fa-solid fa-xmark mt-2" onclick="(this.parentElement).remove()"></i>
            </div>
        </div>
        <?php
    }
    
    // Unset session variables after displaying the notification
    unset($_SESSION['message']);
    unset($_SESSION['message2']);
    unset($_SESSION['title']);
}

?>
<script>
    let notifications = document.querySelector('.notifications');
    let success = document.getElementById('successs');
    let error = document.getElementById('error');
    let warning = document.getElementById('warning');
    let info = document.getElementById('info');
    
    function createToast(type, icon, title, text){
        let newToast = document.createElement('div');
        newToast.innerHTML = `
            <div class="toasts ${type}">
                <i class="icon ${icon}"></i>
                <div class="content">
                    <div class="title">${title}</div>
                    <span>${text}</span>
                </div>
                <i class="icon fa-solid fa-xmark" onclick="(this.parentElement).remove()"></i>
            </div>`;
        notifications.appendChild(newToast);
        newToast.timeOut = setTimeout(
            ()=>newToast.remove(), 5000
        )
    }
    success.onclick = function(){
        let type = 'successs';
        let icon = 'fa-solid fa-circle-check';
        let title = 'Success';
        let text = 'This is a success toast.';
        createToast(type, icon, title, text);
    }
    
    error.onclick = function(){
        let type = 'error';
        let icon = 'fa-solid fa-circle-exclamation';
        let title = 'Error';
        let text = 'This is a error toast.';
        createToast(type, icon, title, text);
    }
    warning.onclick = function(){
        let type = 'warning';
        let icon = 'fa-solid fa-triangle-exclamation';
        let title = 'Warning';
        let text = 'This is a warning toast.';
        createToast(type, icon, title, text);
    }
    info.onclick = function(){
        let type = 'info';
        let icon = 'fa-solid fa-circle-info';
        let title = 'Info';
        let text = 'This is a info toast.';
        createToast(type, icon, title, text);
    }
</script>