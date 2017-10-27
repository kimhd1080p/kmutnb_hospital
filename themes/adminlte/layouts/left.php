<?php
use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use yii\helpers\Html;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        
        <br />
        <?php
//            $menu = [
//                ['label' => 'ตารางการใช้ห้อง', 'url' => ['/reserve/calendar']],
//                ['label' => 'แสดงห้องทั้งหมด', 'url' => ['room/list-room']],   
//                ['label' => 'ค้นหาห้องว่าง', 'url' => ['/reserve/search-empty-room']],                             
//                ['label' => 'ระเบียบการใช้ห้อง', 'url' => ['/reserve/rule']],
//            ];

            $callback = function($menu){
                $data = eval($menu['data']);
                return [
                    'label' => $menu['name'],
                    'url' => [$menu['route']],
                    'option' => $data,
                    // 'icon' => (!empty($data['icon'])?$data['icon']:'circle-o'), //heres what u want ! :+1: 
                    'items' => $menu['children'],
                ];
            };

            $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
            
            //$menuItems = array_merge($menu,$items);
            // print_r($items)

        ?>
        <?php echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $items,
            ]
        ) ?>

    </section>
</aside>
