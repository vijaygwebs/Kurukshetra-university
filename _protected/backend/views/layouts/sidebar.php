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
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Frontend Manager</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class=""><a href="<?=Url::base()?>/sitemanager/index"><span class="nav-label">Slider Managment</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="#">Categories</a> </li>
                            <li><a href="#">Create New Slider</a> </li>
                        </ul>
                    </li>
                    <li><a href="dashboard_2.html">Pages</a></li>
                    <li><a href="dashboard_3.html">Menus</a></li>
                    <li><a href="dashboard_4_1.html">News</a></li>
                    <li><a href="dashboard_4_1.html">Notices</a></li>
                    <li><a href="dashboard_5.html">Gallery<span class="label label-primary pull-right">NEW</span></a></li>
                </ul>
            </li>


        </ul>

    </div>
</nav>