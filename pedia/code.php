<?php
    session_start();
    ob_start();
    include('config/dbcon.php');

    
    
  

      function get_size($size){
        $kb_size = $size / 1024;
        $formal_size = number_format($kb_size,2);
        return $formal_size;
      }
















?>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
  myModal.show();
});
</script>