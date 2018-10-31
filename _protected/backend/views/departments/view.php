<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Subjects */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjects-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Subject',['add-subject','id'=>Yii::$app->getRequest()->getQueryParam('id')],['class'=>'btn btn-success'])?>
        <?= Html::a('Back',['index'],['class'=>'btn btn-white'])?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $data,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'department_id',
            'subject_name',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{edit-subject}{delete}',
                'buttons' => [
                    'edit-subject' =>function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', 'Edit subject'),
                            'aria-label' => Yii::t('yii', 'Edit subject'),
                            'data-pjax' => '0',
                        ], []);
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update-subject','id'=>$model->id], $options);
                    },
                     'delete' => function ($url, $model) {
                         return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                             'title' => Yii::t('app', 'Delete slider'),
                             'data' => [
                                 'confirm' => Yii::t('app', 'Are you sure you want to delete this user?'),
                                 'method' => 'post']
                         ]);
                     }

                ],
            ],
        ], // columns
    ]); ?>

</div>
