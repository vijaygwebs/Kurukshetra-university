<?php
use backend\assets\AdminAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\web\View;
/* @var $this \yii\web\View */
/* @var $content string */

AdminAsset::register($this);
$this->registerJs("var current_url = ".json_encode(Yii::$app->request->absoluteUrl).";var controller =".json_encode(Yii::$app->controller->id).";var baseurl = ".json_encode(Yii::$app->request->baseUrl).";", View::POS_END);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="pace-done">
    <?php $this->beginBody() ?>
    <div id="wrapper">
        <?php if(!yii::$app->user->isGuest){?>
          <?=$this->render('sidebar')?>

       <?=$this->render('content')?>
       <?php } ?>
        <?= $content ?>
        <?php if(!yii::$app->user->isGuest){ ?>
       <?=$this->render('footer');?>
        <?php } ?>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
