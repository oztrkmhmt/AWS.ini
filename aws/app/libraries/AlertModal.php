<?php
/*
   * App AlertModal Class
*/
class AlertModal {
    //Alert Modal
    public function GetAlertModal($title,$modalID,$bodyText,$color,$bgColor,$borderColor){
    ?>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-sm" id="<?php echo($modalID) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div style="color:<?php echo($color) ?> !important; background-color:<?php echo($bgColor) ?> !important; border-color:<?php echo($borderColor) ?>" class="modal-content">
            <div style="padding:0.5rem !important;background-color: whitesmoke !important;" class="modal-header">
                <h5 class="modal-title w-100 text-center" id="exampleModalLongTitle"><?php echo($title) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="text-align:center !important; font-size:initial !important;" class="modal-body">
               <?php echo($bodyText) ?>
            </div>
            </div>
        </div>
    </div>
    <?php 
    }
}
?>


