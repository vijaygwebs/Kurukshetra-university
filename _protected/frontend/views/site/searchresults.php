<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

echo ListView::widget([
    'dataProvider' => $dataprovider,
    'itemView' => 'searchresultsview',
]);
?>