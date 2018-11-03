<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>
<?php $listdesignations = ArrayHelper::map($designations,'id','designation_name');  ?>
<?php $listdepartment = ArrayHelper::map($department,'id','department_name');  ?>
<?php $listsubjects = ArrayHelper::map($subjects,'id','subject_name');  ?>

<?php $form = ActiveForm::begin(['id'=>"myform"]);?>
    <h1>Basic Info</h1>
<?=$form->field($faculty,'name')->textInput()?>
<?=$form->field($faculty,'email')->textInput()?>
<?=$form->field($faculty,'Contact_no')->textInput()?>

<?=$form->field($faculty,'profile_img')->FileInput()?>
    <h1>Add Role:</h1>

<?php
for($i=1;$i<=4;$i++)
{
?>
<div class="row custom-row">


<div class="col-md-4"><?= $form->field($faculty_designation,'['.$i.']designation_id')->dropDownList($listdesignations,['prompt'=>'Select designation..'])->label('Designation');?></div>
<div class="col-md-4"><?= $form->field($faculty_designation,'['.$i.']department_id')->dropDownList($listdepartment,['prompt'=>'Select department.','onchange'=>'var current = $(this); $.get( "'.Url::toRoute('faculity/getsubjects').'", { id: $(this).val() } ).done(function( data ) {  current.parent().parent().nextAll("div:first").find("select").html( data );});'])->label('Department');?></div>
    <div class="col-md-4"><?= $form->field($faculty_designation,'['.$i.']subject_id')->dropDownList($listsubjects,['prompt'=>'Select subject..'])->label('Subject');?></div>


</div>
<?php } ?>
<div class="btns">
<?=Html::Button('Add more',['class'=>'btn btn-success','onclick'=>'addmore(this);'])?>
<?=Html::submitButton('Create',['class'=>'btn btn-success'])?>
<?=Html::a('Cancel',['index'],['class'=>'btn btn-white'])?>
</div>
<?php ActiveForm::end();?>



<?php
$js = <<<JS
// get the form id and set the event
$('#myform').on('beforeValidate', function(e) {
var len = $('.custom-row').length;

		for(i=0;i<len;i++)
		{
			if($('.custom-row').eq(i).css('display')=='none')
			{

				$('.custom-row').eq(i).remove();


			}


		}
});

$('#myform').on('afterValidate', function(e) {
	//$('#myform').trigger('submit');
	//return true;
});

JS;

$this->registerJs($js);
