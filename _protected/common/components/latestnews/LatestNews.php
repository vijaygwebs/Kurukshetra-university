<?php
namespace common\components\latestnews;
use yii\base\widget;

Class LatestNews extends widget{
    public function run(){
        return $this->render('latestnews');
    }
}
?>