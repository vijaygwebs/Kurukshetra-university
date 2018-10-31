<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>
<?=Html::a('Back',['index'],['class'=>'btn btn-white'])?>
<h2>View details</h2>
<?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'faculty_id',
        'department_id',
        'subject_id',
        'designation_id',
        // buttons
        ['class' => 'yii\grid\ActionColumn',
            'header' => "Action",
            'template' => '{view-member} {update} {deleteslide}',
            'buttons' => [
                'view-member' =>function ($url, $model, $key) {
                    $options = array_merge([
                        'title' => Yii::t('yii', 'View member'),
                        'aria-label' => Yii::t('yii', 'View member'),
                        'data-pjax' => '0',
                    ], []);
                    return Html::a('<i class="glyphicon glyphicon-eye-open"></i>', ['viewmember','id'=>$model->id], $options);
                },
                'update' =>function ($url, $model, $key) {
                    $options = array_merge([
                        'title' => Yii::t('yii', 'Update'),
                        'aria-label' => Yii::t('yii', 'Update'),
                        'data-pjax' => '0',
                    ], []);
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update','id'=>$model->id], $options);
                },

                'deleteslide' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['#'], [
                        'title' => Yii::t('app', 'Delete slide'),
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this Slide?'),
                            'method' => 'post']
                    ]);
                },

            ]
        ], // ActionColumn
    ]
]);?>
