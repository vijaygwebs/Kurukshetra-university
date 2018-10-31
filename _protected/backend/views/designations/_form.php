<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Designations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="designations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'designation_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel',['index'], ['class' => 'btn btn-white']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
