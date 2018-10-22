<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'About'); ?>
<div class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="head2">About</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 pull-right">
                    <img src="<?=yii::$app->view->theme->baseUrl?>/images/about.jpg">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 pull-left">
                    <h3>Indian students at kurukshetra university</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                    <a href="#">Read more</a>
                </div>
            </div>
        </div>
    </div>