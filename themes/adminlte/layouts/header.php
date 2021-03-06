<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"><i class="fa fa-heartbeat text-white"></i>
</span><span class="logo-lg">เมนู</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

    
                     
              
                      

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>-->
                        <i class="fa fa-user-circle-o text-white"></i>
                        <span class="hidden-xs"><?=Yii::$app->user->identity->u_name ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
<!--                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>-->
<i class="fa fa-user-circle-o fa-4x text-white img-circle"></i>

                            <p>
                                
                               <?=Yii::$app->user->identity->u_name ?>
                            </p>
                        </li>
                        <!-- Menu Body -->
                      
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                              
                                  <?= Html::a(
                                    'เปลี่ยนรหัสผ่าน',
                                    ['/home/changepassword'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'ออกจากระบบ',
                                    ['/home/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
               
            </ul>
        </div>
    </nav>
</header>
