<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Notices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notices-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'notice_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notice_description')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel',['index'], ['class' => 'btn btn-white']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
