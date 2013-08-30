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


}
