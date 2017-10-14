<?php


use yii\helpers\Html;
//use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
//use app\themes\adminLTE\components\ThemeNav;
//use yii\helpers\Url;
use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;

?>
<?php $this->beginContent('@app/themes/adminLTE/layouts/main.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

     <!-- sidebar: style can be found in sidebar.less -->
       <section class="sidebar">

    <?php




$callback = function($menu){
    $data = eval($menu['data']);
    return [
        'label' => $menu['name'], 
        'url' => [$menu['route']],
        'options' => [$data],
        'items' => $menu['children']
    ];
};

$items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback, true);

echo Nav::widget([
     'encodeLabels' => false,
     'options' => ['class' => 'sidebar-menu'],
       'items' => $items
]);
//print_r($items);


?>

<!--
       sidebar menu: : style can be found in sidebar.less 
      <ul class="sidebar-menu" data-widget="tree">
       <li class="">
          <a href="home">
            <i class="fa fa-home"></i> <span>หน้าแรก</span>
          </a>
        </li>
        <li class="">
        <? Html::a('<i class="fa fa-plus"></i> <span>งานพยาบาล</span>', ['nurseservice/index']) ?>
    
        </li>
           <li class="">
          <a href="widgets.html">
            <i class="fa fa-heartbeat"></i> <span>งานเวชระเบียน</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small> 
            </span>
          </a>
        </li>
      </ul>-->
    </section>
  
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">

   <!-- Content Header (Page header) -->
   <section class="content-header">
        <h1> <?php echo Html::encode($this->title); ?> </h1>
           <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $content; ?>
    </section><!-- /.content -->

</div><!-- /.right-side -->
<?php $this->endContent();