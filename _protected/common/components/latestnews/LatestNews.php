<?php
namespace common\components\latestnews;
use common\models\News;
use yii\base\widget;

Class LatestNews extends widget{
    public function run(){
        $model = News::find()->all();
        return $this->render('latestnews',['model' => $model]);
    }
}
?>