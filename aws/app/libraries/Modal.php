<?php
/*
   * App Modal Class
*/
class Modal {
    //Error Modal
    public function GetModal($title,$modalID,$inputID){
    ?>
    <form action="../users/main" method="post">
        <div class="modal fade bd-example-modal-sm" id="<?php echo($modalID) ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div style="background-color: whitesmoke !important;" class="modal-header">
                    <h6 style="color:slategray !important" class="modal-title" id="exampleModalLabel"><?php echo($title) ?></h6>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-sm" onkeydown="return event.keyCode !== 69" name="kimlikno" minlength="11" maxlength="11" id="<?php echo($inputID) ?>" placeholder="T.C. Kimlik No" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary btn-sm">Ara</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php 
    }
}
?>


