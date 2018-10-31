<?php
namespace common\components\bannerslider;
use backend\models\FrontendSliders;
use backend\models\Notices;
use backend\models\Slides;
use yii\base\widget;


Class BannerSlider extends widget{
public function run(){


    $model = Slides::findall(['slider_id'=>18,'status'=>1]);
    $notices = Notices::findall(['status'=>1]);

    return $this->render('bannerslider',['model'=>$model,'notices' => $notices]);
}
}
?>