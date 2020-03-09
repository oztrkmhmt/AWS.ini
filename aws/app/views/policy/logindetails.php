<?php require APPROOT . '/views/inc/header.php' ; ?>
<div id="wrapper">
    <!-- Sidebar -->
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>
    <!-- IF any error occured show Message -->
    
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <?php echo("Kullanıcı Detayları") ?>
                </div>
                <!-- Kullanıcı Detayları -->
                <div class="card-body">
                    <form class="needs-validation">
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">acnNo</label>
                                <input type="text" class="form-control" readonly id="validationCustom01" value="<?php echo($_SESSION['logindetails']['acnNo']) ?>" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom02">acnKaynakKod</label>
                                <input type="text" class="form-control" readonly id="validationCustom02" value="<?php echo($_SESSION['logindetails']['acnKaynakKod']) ?>" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom02">acnSubeKod</label>
                                <input type="text" class="form-control" readonly id="validationCustom03" value="<?php echo($_SESSION['logindetails']['acnSubeKod']) ?>" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom03">otorRef</label>
                                <input type="text" class="form-control" readonly id="validationCustom09" value="<?php echo($_SESSION['logindetails']['otorRef']) ?>" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom03">mustKaynakKod</label>
                                <input type="text" class="form-control" readonly id="validationCustom05" value="<?php echo($_SESSION['logindetails']['mustKaynakKod']) ?>" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom03">mustNo</label>
                                <input type="text" class="form-control" readonly id="validationCustom06" value="<?php echo($_SESSION['logindetails']['mustNo']) ?>" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom05">mustSubeKod</label>
                                <input type="text" class="form-control" readonly id="validationCustom07" value="<?php echo($_SESSION['logindetails']['mustSubeKod']) ?>" >
                            </div>
                            <div class="col-md-3  mb-3">
                                <label for="validationCustom02">email</label>
                                <input type="text" class="form-control" readonly id="validationCustom04" value="<?php echo($_SESSION['logindetails']['email']) ?>" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom02">title</label>
                                <input type="text" class="form-control" readonly id="validationCustom08" value="<?php echo($_SESSION['logindetails']['title']) ?>" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
</div>
<?php require APPROOT . '/views/inc/footer.php' ; ?>
<!-- Error Modal JS -->
<script type="text/javascript">
$(document).ready(function () {
$('#loginDetailsModal').modal('show');
});