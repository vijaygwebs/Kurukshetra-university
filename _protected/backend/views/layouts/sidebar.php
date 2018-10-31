<?php use yii\helpers\Url; ?>
<nav class="navbar-default navbar-static-side" role="navigation" style="">
    <div class="sidebar-collapse" style="
">
        <ul class="nav metismenu" id="side-menu" style="display: block;">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?=yii::$app->view->theme->baseUrl?>/img/profile_small.jpg">
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <?php $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->identity->id);?>
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=Yii::$app->user->identity->username ?></strong>
                             </span> <span class="text-muted text-xs block"><?php foreach($roles as $key => $value){ echo $key; }?><b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    UCKKR
                </div>
            </li>
            <li class="">
                <a href="index.html"> <span class="nav-label">Frontend Manager</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class=""><a href="<?=Url::base()?>/slider/"><span class="nav-label">Slider Managment</span></a>

                    </li>
                    <li><a href="">Pages</a></li>
                    <li><a href="">Menus</a></li>
                    <li><a href="<?=Url::base()?>/news">News</a></li>
                    <li><a href="<?=Url::base()?>/notices">Notices</a></li>
                    <li><a href="dashboard_5.html">Gallery<span class="label label-primary pull-right">NEW</span></a></li>
                </ul>
            </li>

            <li class="">
                <a href="index.html"> <span class="nav-label">Departments Managment</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class=""><a href="<?=Url::base()?>/departments/"><span class="nav-label">Departments </span></a>

                    </li>

                    <li class=""><a href="<?=Url::base()?>/designations/"><span class="nav-label">Designations </span></a>

                    </li>
                    <li class=""><a href="<?=Url::base()?>/faculity/"><span class="nav-label">Faculity </span></a>

                    </li>

                </ul>
            </li>

        </ul>

    </div>
</nav>