<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FrontendSliders */

$this->title = 'Create Frontend Sliders';
$this->params['breadcrumbs'][] = ['label' => 'Frontend Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-sliders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
