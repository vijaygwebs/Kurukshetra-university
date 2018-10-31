<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use \yii\helpers\Url;
?>
<div class="row">
    <div class="col-lg-12">

            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Slide Managment</h3>

                        <?php
                        $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]);

                        ?>
                        <?=$form->field($model,'title')?>
                        <?=$form->field($model,'description')->textarea();?>
                        <?=$form->field($model,'dbimg')->hiddenInput(['value'=>$model->image])->label(false)?>
                        <?=$form->field($model,'image')->fileInput()?>

                        <div class="form-group" style="display: inline-block;width: 100%">
                            <?php echo Html::img(Yii::$app->urlManagerFrontend->baseUrl.'/uploads/homeslider/'.$model->image, ['class' => 'pull-left img-responsive','height'=>'150px','width'=>'150px']); ?>
                        </div>
                        <div class="form-group">
                            <?=Html::submitButton('Save Slide',['class'=>'btn btn-primary']); ?>

                            <?=Html::a('Cancel',['editslider', 'id' => $model->slider_id],['class'=>'btn btn-white'])?>
                        </div>
                        <?php ActiveForm::end();?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


