<footer class="footer">
    <div class="container-fluid clearfix">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
        <a href="http://sunxcoin.com/" target="_blank">Sunxcoin</a>.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Developed by
      <a href="fstackdev.net" target="_blank"><i class="text-danger">Fstackdev</i></a>
      </span>
    </div>
  </footer>
  <script src="./js/jquery.min.js"></script>
  
  <script>
    function copyRefLink(){
      var link = document.getElementById("ref-link");
      link.select();
      document.execCommand("copy");
      // window.alert("Copied the text: " + link.value);
      showSwal('ref-link', link.value);
    }
  </script>
  <script src="./js/alerts.js"></script>