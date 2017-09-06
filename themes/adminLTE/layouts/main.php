<?php

use yii\helpers\Html;
//use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\themes\adminLTE\assets\AdminlteAsset;
/* @var $this \yii\web\View */
/* @var $content string */
use kartik\growl\Growl;
use yii\helpers\Url;
use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;
AdminlteAsset::register($this);
AppAsset::register($this);
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
    <body class="skin-blue sidebar-mini">

        <?php $this->beginBody() ?>
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?= Yii::$app->request->baseUrl; ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b></b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>เมนู</b></span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <?php
                        echo Nav::widget([
                            'options' => ['class' => 'nav navbar-nav'],
                            'items' => 
                            [
                                 [
				'label' => 'เปลี่ยนรหัสผ่าน', 
				'url' => ['/home/changepassword']
            ],
                                Yii::$app->user->isGuest ?
                                        ['label' => 'Login', 'url' => ['login']] :
                                        ['label' => 'Logout (' . Yii::$app->user->identity->u_name . " " . Yii::$app->user->identity->u_surname . ')',
                                    'url' => ['logout'],
                                    'linkOptions' => ['data-method' => 'post']],
                                
                                
                            ],
                        ]);
                        ?>
                       
                    </div>
                </nav>

            </header>



            <?php //foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
                <?php if( $message = Yii::$app->session->getFlash('alert') ):?>
                <?php
                echo Growl::widget([
                    'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                    'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
                    'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                    'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
                    'showSeparator' => true,
                    'delay' => 1, //This delay is how long before the message shows
                    'pluginOptions' => [
                        'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                        'placement' => [
                            'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                            'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                        ]
                    ]
                ]);
                ?>
                <?php endif; ?>
            <?php //endforeach; ?>

            

            <?= $content ?>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <?php echo Yii::powered(); ?>
                </div>
                Copyright &copy; <?php echo date('Y'); ?> by My Company. All Rights Reserved.
            </footer>

        </div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
