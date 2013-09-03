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
}
