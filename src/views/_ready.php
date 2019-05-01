<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

?>

<?php if($model->submit): ?>

    <?php $form = ActiveForm::begin(['id' => $model->id, 'action' => \yii\helpers\Url::To($model->action), 'method' => $model->method]); ?>
        <div class="input-group">
            <?= Html::input('number', $model->input, '', [
                'id' => $model->input,
                'alt' => \Yii::t('quagga', 'Click the button to scan an EAN...'),
                'class' => 'form-control',
                'placeholder' => \Yii::t('quagga', 'Click the button to scan an EAN...')
            ]);
            ?>

            <span class="input-group-btn">
                <button class="btn btn-default" type="button"
                        <?php if($model->modal): ?>
                        data-toggle="modal" data-target="#livestream_scanner"
                        <?php else: ?>
                        value="Scan" onclick="getScan();"
                        <?php endif; ?>
                        title="<?=\Yii::t('quagga', 'Click the button to scan an EAN...');?>"  >
                    <i class="fa fa-barcode"></i>
                </button>
            </span>
        </div>
    <?php ActiveForm::end(); ?>


<?php else: ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="input-group">

                <?= Html::input('number', $model->input, '', [
                    'id' => $model->input,
                    'class' => 'form-control',
                    'placeholder' => \Yii::t('quagga', 'Click the button to scan an EAN...')
                ]);
                ?>

                <span class="input-group-btn">

                    <button class="btn btn-default" type="button"
                        <?php if($model->modal): ?>
                            data-toggle="modal" data-target="#livestream_scanner"
                        <?php else: ?>
                            value="Scan" onclick="getScan();"
                        <?php endif; ?>
                        title="<?=\Yii::t('quagga', 'Click the button to scan an EAN...');?>"  >
                        <i class="fa fa-barcode"></i>
                    </button>

                 </span>

            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->

<?php endif; ?>

<?php if($model->modal): ?>
    <div class="modal" id="livestream_scanner">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><?=\Yii::t('quagga', 'Barcode Scanner Ean');?></h4>
                </div>
                <div class="modal-body" style="position: static">
                    <div id="interactive" class="viewport"></div>
                    <div class="error"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?=\Yii::t('quagga', 'Close');?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php endif; ?>
