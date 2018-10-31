<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>
<?php $listdesignations = ArrayHelper::map($designations,'id','designation_name');  ?>
<?php $listdepartment = ArrayHelper::map($department,'id','department_name');  ?>
<?php $listsubjects = ArrayHelper::map($subjects,'id','subject_name');  ?>
<?php $form = ActiveForm::begin();?>
    <h1>Basic Info</h1>
<?=$form->field($faculty,'name')->textInput()?>
<?=$form->field($faculty,'email')->textInput()?>
<?=$form->field($faculty,'Contact_no')->textInput()?>

<?=$form->field($faculty,'profile_img')->FileInput()?>
    <h1>Add Role:</h1>
<div class="row">
<div class="col-md-4"><?= $form->field($faculty_designation,'designation_id')->dropDownList($listdesignations,['prompt'=>'Select designation..'])->label('Designation');?></div>
<div class="col-md-4"><?= $form->field($faculty_designation,'department_id')->dropDownList($listdepartment,['prompt'=>'Select department.','onchange'=>'$.get( "'.Url::toRoute('faculity/getsubjects').'", { id: $(this).val() } ).done(function( data ) {$( "#facultydesignation-subject_id" ).html( data );});'])->label('Department');?></div>
    <div class="col-md-4"><?= $form->field($faculty_designation,'subject_id')->dropDownList($listsubjects,['prompt'=>'Select subject..'])->label('Subject');?></div>
    <?=Html::Button('Add more',['class'=>'btn btn-success','onclick'=>'addmore(this);'])?>
</div>

<?=Html::submitButton('Create',['class'=>'btn btn-success'])?>
<?=Html::a('Cancel',['index'],['class'=>'btn btn-white'])?>

<?php ActiveForm::end();?>


