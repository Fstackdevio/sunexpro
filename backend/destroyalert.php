<?php 
    function destroysess(){
        unset($_SESSION['message']);
        unset($_SESSION['messagetype']);
    }
  ?>
  <script>
        setTimeout(function(){
          $('#sessmsg').remove();
        }, 5000);
        var runQuery = "<?php destroysess(); ?>"; 
  </script>