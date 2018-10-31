<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendSliders */

$this->title = 'Update Frontend Sliders: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frontend-sliders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
