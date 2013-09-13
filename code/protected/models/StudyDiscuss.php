<?php

class StudyDiscuss extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-discuss`';
    }
    
    //获取学习详情，2批注，1摘要
    public function getStudyDetailByCid($courseId, $type = 2)
    {
    	if (empty($courseId))
    	{
    		return array();
    	}
    	
    	$command = 'select a.id,a.title, b.content from `m-coursecontent` a inner join `m-study` b 
    	            on b.chapterid = a.id where a.courseid = :courseid and b.type = :type';
    	
    	$conn = Yii::app()->db;
        $command = $conn->createCommand($command);
        $command->bindParam(':courseid',$courseId);
        $command->bindParam(':type',$type);
        
        $rows = $command->queryAll();
        return $rows;
    }
    
    //获取小组讨论列表
    public function getDiscussList($groupId)
    {
    	$command = 'select d.* from `m-group` g inner join `m-coursecontent` cc on 
    				g.courseid = cc.courseid inner join `m-discuss` d on 
    				cc.id = d.chapterid where g.id = ' . $groupId;
    	
    	
    	$conn = Yii::app()->db;
        $command = $conn->createCommand($command);
        $rows = $command->queryAll();
        
        return $rows;
    }
}