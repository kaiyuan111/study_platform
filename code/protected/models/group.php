<?php

class Group extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-group`';
    }

    //创建小组
    public function updateGroup($groupName, $creator, $courseId, $desc, $joinType, $icon = '', $groupId = 0)
    {
    	/*if (empty($groupId))   //新建
    	{
    		//$sql = 
    	}
    	else  //更新
    	{
    		
    	}
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        
        $rows = $command->queryAll();
        return $rows;*/
    	
    }
    
    
}
