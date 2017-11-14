<?php

namespace app\models;
use Yii;
use yii\base\Component;
//use yii\base\Event;
use yii\helpers\Json;
//use app\models\Logs;
class Event extends Component
{
    
    const ACTION_ADD = 'add';
    const ACTION_DELETE = 'delete';
    const ACTION_UPDATE = 'update';
      const ACTION_VIEW = 'view';

    const TYPE_PROJECT = 10;
    const TYPE_BIDS = 20;
    const TYPE_BIDS_DATA = 30;

    /**
     * @param $event
     */
    public function init()
    {
        $this->on(Event::ACTION_DELETE, [ $this, 'sendInLog']);
        $this->on(Event::ACTION_VIEW, [ $this, 'sendInLog']);
    }
    public static function sendInLog($event)
    {
        /** @var \yii\base\Event $event */
        /** @var ActiveRecord $event->sender */
        $userId = Yii::$app->user->identity->id; 
//        
//            Yii::$app->getSession()->setFlash('view', [
//     'type' => 'success',
//     'duration' => 5000,
//     'icon' => 'fa fa-users',
//     'message' => 'สำเร็จ'. print_r($event),
//     'title' => 'บันทึกข้อมูล',
//     'positonY' => 'top',
//     'positonX' => 'right'
// ]); 
        
        $a=Json::encode($event->sender->attributes);
        $o=Json::encode($event->sender->oldAttributes);
 Yii::$app->db->createCommand("INSERT INTO `logs`(`id`, `type`, `action`, `id_user`, `old_data`, `new_data`) VALUES ('','','$event->name','$userId','$a','$o')")->execute();
     
    }
}