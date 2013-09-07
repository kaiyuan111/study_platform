<?php


/**
 * Info 
 *
 * 消息体
 * 
 * @package open 360
 * @version $Id$
 * @copyright 2005-2011 360.CN All Rights Reserved.
 * @author root@360.cn
 */
class Info extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-info`';
    }

    public function saveNotifyMessage($title,$message,$uidFrom,$uidTo)
    {
        $this->type='notify';
        $this->title=$title;
        $this->uid_from=$uidFrom;
        $this->request_time=date("Y-m-d");
        $this->content=$message;
        $this->uid_to=$uidTo;
        $this->save();
    }


}
