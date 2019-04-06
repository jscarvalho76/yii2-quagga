<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

?>


<div class="row">
    <div class="col-lg-6">
        <div class="input-group">

            <?php $form = ActiveForm::begin(['id' => $id, 'action' => \yii\helpers\Url::toRoute($action)]); ?>

            <input id=<?=$scanner_input?> class="form-control" name=<?=$scanner_input?> placeholder="Click the button to scan an EAN..." type="text" />

            <?php ActiveForm::end(); ?>


            <span class="input-group-btn">
                        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#livestream_scanner">
                            <i class="fa fa-barcode"></i>
                        </button>
                    </span>
        </div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<div class="modal" id="livestream_scanner">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Barcode Scanner Ean</h4>
            </div>
            <div class="modal-body" style="position: static">
                <div id="interactive" class="viewport"></div>
                <div class="error"></div>
            </div>
            <div class="modal-footer">
                <label class="btn btn-default pull-left">
                    <i class="fa fa-camera"></i> Use camera app
                    <input type="file" accept="image/*;capture=camera" capture="camera" class="hidden" />
                </label>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
