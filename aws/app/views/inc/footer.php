</div>  

<?php if(isset($_SESSION['AWSession'])) : ?>
    <!-- Sticky Footer -->
    <footer class="sticky-footer">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright © Atlas Web Service 2019-2020</span>
          <?php if(empty($_SESSION['logindetails']['errorMessage'])){ ?>
          <span style="float: right !important"><?php echo $_SESSION['logindetails']['userName'] ?> - <?php echo $_SESSION['logindetails']['hostIp'] ?></span>
          <?php }else{} ?>
        </div>
      </div>
    </footer>
<?php endif;?>
  <!-- JS Import-->
    <script src="../js/jquery/jquery-3.4.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.easing.min.js"></script>
    <script src="../js/sb-admin.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery/jquery-ui.js"></script>
    <script src="../js/bootstrap-timepicker.min.js"></script>
 
    <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<!-- Close Body-->
</body>
</html>
