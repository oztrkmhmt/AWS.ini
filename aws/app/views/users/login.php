<?php require APPROOT . '/views/inc/header.php'; ?>

<style>
@media(min-width:992px){
  .btnAlign{
    margin-left: 28% !important;
  }

}
</style>
<body class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mx-auto">
        <div class="card card-body bg-light mt-5">
          <h5 align="center">Oturum Aç</h5>
            <?php flash('hata_yakalandi')?>
              <form action="../users/login" method="POST">
              <div class="form-group row">
                <div class="col-sm-12 col-md-12 col-lg-12 ">
                  <input type="text" name="username" placeholder="Kullanıcı Adı" class="form-control form-control-sm <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
                  <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                </div>
              </div>
              <div class="input-group">
                  <input type="password" name="password" data-toggle="password" id="password" placeholder="Parola" class="form-control form-control-sm <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="fa fa-eye"></i>
                    </span>
                  </div>
                  <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-5 col-md-5 col-lg-5 btnAlign">
                  <input type="submit" value="Giriş" class="btn btn-secondary btn-block btn-sm">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md">
                  <a href="../users/login" class="btn btn-light btn-block">Parolanızı mı unuttunuz? </a>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</body>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script src="../js/jquery/jquery-3.4.1.slim.min.js"></script>
<script src="../js/bootstrap-show-password.min.js"></script>
