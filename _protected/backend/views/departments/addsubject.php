<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Subjects;
/* @var $this yii\web\View */
/* @var $model backend\models\Subjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subjects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'department_id')->hiddenInput(['value'=>$model->department_id])->label(false) ?>

    <?= $form->field($model, 'subject_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel',['view','id'=>$model->department_id], ['class' => 'btn btn-white']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
