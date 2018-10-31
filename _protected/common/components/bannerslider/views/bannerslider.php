<div class="slide-area">
    <div class="home-slider owl-carousel owl-theme">
        <?php foreach($model as $slider)
        {
            ?>
            <div class="item">
                <img src="<?=\yii\helpers\Url::base().'/uploads/homeslider/'.$slider->image?>">
                <div class="content">
                    <h2><?=$slider->title?></h2>
                    <p><?=$slider->description?></p>
                </div>
            </div>

 <?php } ?>



    </div>
    <div class="container">
        <div class="notification-slider owl-carousel owl-theme">
            <?php
            if(count($notices)>0)
            {
                foreach($notices as $noticedata)
                {


                ?>
                <div class="item">
                    <p><?=$noticedata->notice_title?></p>
                </div>
                <?php
                }
            }
            else{ ?>
                <div class="item">
                    <p>There is no Notice here</p>
                </div>
           <?php }
            ?>

        </div>
    </div>
</div>