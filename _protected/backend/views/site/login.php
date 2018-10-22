<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app', 'Login');

?>   <div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <h3>Welcome to Backend login</h3>

        <p>Login in. To manage the website.</p>
        <?php $form = ActiveForm::begin(['id' => 'login-form'],['class'=>'m-t','role'=>'form']); ?>

        <?php //-- use email or username field depending on model scenario --// ?>
        <?php if ($model->scenario === 'lwe'): ?>
            <?= $form->field($model, 'email') ?>
        <?php else: ?>
            <?= $form->field($model, 'username') ?>
        <?php endif ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary block full-width m-b', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        <p class="m-t"> <small>Kurukshetra University &copy; <?=date('Y');?></small> </p>
    </div>
</div>