<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
?>
<?=Html::a('Add Faculty Member',['addfaculty'],['class'=>'btn btn-success'])?>
<?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'name',
        'email',
        'Contact_no',
        'profile_img',
        // buttons
        ['class' => 'yii\grid\ActionColumn',
            'header' => "Action",
            'template' => '{view-member} {edit-slide} {deleteslide}',
            'buttons' => [
                'view-member' =>function ($url, $model, $key) {
                    $options = array_merge([
                        'title' => Yii::t('yii', 'View member'),
                        'aria-label' => Yii::t('yii', 'View member'),
                        'data-pjax' => '0',
                    ], []);
                    return Html::a('<i class="glyphicon glyphicon-eye-open"></i>', ['viewmember','id'=>$model->id], $options);
                },
                'edit-slide' =>function ($url, $model, $key) {
                    $options = array_merge([
                        'title' => Yii::t('yii', 'Edit slide'),
                        'aria-label' => Yii::t('yii', 'Edit Slide'),
                        'data-pjax' => '0',
                    ], []);
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['#'], $options);
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