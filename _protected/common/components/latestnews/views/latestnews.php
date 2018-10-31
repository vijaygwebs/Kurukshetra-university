<div class="news-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <div class="img-box">
                    <img src="<?=yii::$app->view->theme->baseUrl?>/images/news-img.jpg">
                </div>
            </div>
            <div class="col-md-8 col-sm-7">
                <div class="content-box">
                    <h2>Latest news</h2>
                    <div class="news-slider owl-carousel owl-theme">
                        <?php foreach($model as $modeldata){ ?>
                        <div class="item">
                            <h3><?=$modeldata->title;?></h3>
                            <div class="date"><i class="icon-calendar"></i><?=$modeldata->published_date;?></div>
                            <p><?=$modeldata->description;?></p>
                        </div>
                        <?php } ?>

                    </div>
                    <a href="#">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>