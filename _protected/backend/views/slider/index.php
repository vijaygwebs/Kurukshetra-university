<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\FrontendSlidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Frontend Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-sliders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Frontend Sliders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'slider_name',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{edit-slider}{manage-slides}',
                'buttons' => [
                    'edit-slider' =>function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', 'Edit slider'),
                            'aria-label' => Yii::t('yii', 'Edit slider'),
                            'data-pjax' => '0',
                        ], []);
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update','id'=>$model->id], $options);
                    },
                    'manage-slides' =>function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', 'Manage slides'),
                            'aria-label' => Yii::t('yii', 'Manage slides'),
                            'data-pjax' => '0',
                        ], []);
                        return Html::a('<i class="glyphicon glyphicon-folder-open"></i>', ['editslider','id'=>$model->id], $options);
                    },
                   /* 'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'Delete slider'),
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this user?'),
                                'method' => 'post']
                        ]);
                    } */

                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
