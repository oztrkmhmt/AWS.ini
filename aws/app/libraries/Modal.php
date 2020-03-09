<?php
/*
   * App Modal Class
*/
class Modal {
    public function GetModal($title,$modalType,$modalID,$headerColor,$closeBtn,$btnType,$btnText,$setModalBody){
    ?>
    <form action="../policy/main" method="post">
        <div class="modal fade bd-example-modal-sm" id="<?php echo($modalID) ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
            <div class="modal-dialog <?php echo($modalType) ?>" role="document">
                <div class="modal-content">
                    <div style="background-color:<?php echo($headerColor) ?>" class="modal-header">
                    <h6 style="color:slategray !important" class="modal-title" id="exampleModalLabel"><?php echo($title) ?></h6>
                    <?php echo($closeBtn) ?>
                    </div>
                    <div class="modal-body">
                        <?php echo($setModalBody) ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="<?php echo($btnType) ?>"><?php echo($btnText) ?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php 
    }
}
?>
