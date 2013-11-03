<?php

class CourseContent extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-coursecontent`';
    }

    public function getCourseIdByChapterId($chapterId)
    {
    	$sql = "select cc.courseid from `m-coursecontent` as cc 
    	where cc.id = {$chapterId}";
          //echo $sql;exit;
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        $rows = $command->queryAll();
        //var_dump($rows);exit;
        return empty($rows)? 0 :$rows[0]['courseid'];
    }
    
    
}
