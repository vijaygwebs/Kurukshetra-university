<?php
use yii\helpers\url;
?>
<div class="slide-area">
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <img src="<?=yii::$app->view->theme->baseUrl?>/images/logo.png">
                </div>
                <div class="top-nav">
                    <!--<a href="#" class="btn btn-primary">Login</a>-->
                    <ul>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                    </ul>
                    <a href="students-wifi-password.html" class="btn btn-primary">WiFi Password Request</a>
                    <a class="btn" href="nirf.html">NIRF</a>
                    <a class="btn" href="research-assistant.html">Vacancies</a>
                    <a class="btn" href="contact-us.html">Contact Us</a>
                    <?php
                    if (Yii::$app->user->isGuest)
                    {
                        ?>
                        <a class="btn" href="site/signup">Sign up</a>
                        <a class="btn" href="site/login">Sign in</a>
                        <?php
                    }
                    // display Logout to all logged in users
                    else
                    {
                        ?>
                        <a class="btn" data-method="post" href="site/logout">Logout(<?=yii::$app->user->identity->username?>)</a>
                        <?php
                    }
                    ?>

                </div>
                <div class="search-box">
                    <div class="search">
                        <a class="close-btn">+</a>
                        <input type="text">
                        <button class="btn"><i class="icon-search"></i></button>
                    </div>
                    <a class="btn search-toggle"><i class="icon-search"></i></a>
                    <div class="contact">
                        <span class="btn btn-primary">+91 181 8888 888</span>
                        <i class="icon-phone btn btn-primary"></i>
                    </div>
                </div>
                <nav class="navbar navbar-expand-md">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span></span>
                        </button>
                        <a class="navbar-brand" href="#">Menu</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="<?=url::base()?>/">Home</a></li>
                            <li><a href="<?=url::base()?>/site/about">About</a></li>
                            <li><a href="<?=url::base()?>/site/staff">Staff</a></li>
                            <li><a href="<?=url::base()?>/site/courses">Courses</a></li>
                            <li><a href="<?=url::base()?>/site/prospectus">Prospectus</a></li>
                            <li>
                                <a href="<?=url::base()?>/site/arts">Departments</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?=url::base()?>/site/arts">Arts</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::base()?>/site/commerce">Commerce</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::base()?>/site/science">Science</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="<?=url::base()?>/site/students-corner">Student Corner</a></li>
                            <li><a href="<?=url::base()?>/site/gallery">Gallery</a></li>
                            <li><a href="<?=url::base()?>/site/admissionlist">Admission Lists</a></li>
                            <li><a href="<?=url::base()?>/site/pride">Pride</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>
    </header>
</div>