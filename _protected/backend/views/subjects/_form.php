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
    <?php // get countries from database table
    $departments=\backend\models\Departments::find()->all();
    // convert $country modal result to array format using ArrayHelper's map() method.
    $countryList=ArrayHelper::map($departments,'id','department_name');
    ?>
    <?= $form->field($model,'department_id')->dropDownList($countryList,['prompt'=>'Please select'])?>

    <?= $form->field($model, 'subject_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel',['index'], ['class' => 'btn btn-white']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
