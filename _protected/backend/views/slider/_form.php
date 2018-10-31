<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendSliders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-sliders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slider_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->radioList(array('1'=>'Active',0=>'Inactive')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?=Html::a('Cancel',['index', $model],['class'=>'btn btn-white'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
