<?php
use common\components\bannerslider\BannerSlider;
use \common\components\latestnews\LatestNews;
use \common\components\gallery\Gallery;
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Uckkr');
?>
<?=BannerSlider::widget();?>
<?=LatestNews::widget();?>
<?= $this->render('about')?>
<?=Gallery::widget();?>
