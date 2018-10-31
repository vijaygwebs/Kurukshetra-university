<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
?>
<?=Html::a('Create new slide',['createslide','id' => Yii::$app->getRequest()->getQueryParam('id'), $model],['class'=>'btn btn-primary'])?>
<?=Html::a('Back',['index', $model],['class'=>'btn btn-primary'])?>

<?= GridView::widget([
    'dataProvider' => $data,
    'summary' => false,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'title',
        'description',
        [
            'attribute'=>'images',
            'value' => function ($model) {
                return \yii\helpers\Html::img('@uploads/homeslider/' .$model->image,[ 'width' => '150px', 'height' => '100px']);
            },
            'format' => 'raw',
        ],
        [
            'attribute' => 'status',
            'value' => function ($model) {
                if ($model->status==0) {
                    return Html::a(Yii::t('app', 'Active'), null, [
                        'class' => 'btn btn-success status',
                        'data-id' =>  $model->id,
                        'data-status' =>  $model->status,
                        'href' => 'javascript:void(0);',
                    ]);
                } else {
                    return Html::a(Yii::t('app', 'Inactive'), null, [
                        'class' => 'btn btn-danger status',
                        'data-id' =>  $model->id,
                        'data-status' =>  $model->status,
                        'href' => 'javascript:void(0);',
                    ]);
                }
            },
            'contentOptions' => ['style' => 'width:160px;text-align:center'],
            'format' => 'raw',
            'filter'=>array("1"=>"Active","0"=>"Inactive"),
        ],

         // buttons
        ['class' => 'yii\grid\ActionColumn',
            'header' => "Menu",
            'template' => '{edit-slide} {deleteslide}',
            'buttons' => [
                'edit-slide' =>function ($url, $model, $key) {
                    $options = array_merge([
                        'title' => Yii::t('yii', 'Edit slide'),
                        'aria-label' => Yii::t('yii', 'Edit Slide'),
                        'data-pjax' => '0',
                    ], []);
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['editslide','id'=>$model->id], $options);
                },

                'deleteslide' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['deleteslide','id'=>$model->slider_id,'id'=>$model->id], [
                        'title' => Yii::t('app', 'Delete slide'),
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this Slide?'),
                            'method' => 'post']
                    ]);
                }
            ]
        ], // ActionColumn
    ], // columns
]); ?>