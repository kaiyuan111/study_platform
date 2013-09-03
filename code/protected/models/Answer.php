<?php

class Answer extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-answer`';
    }
    
    public function getHomeworkAnswerByChapterid($chapterid, $uid)
    {
    	$command = "select a.*  from `m-homework` h inner join `m-answer` a on h.id = a.homeworkid
    				where h.chapterid = {$chapterid} and a.uid = {$uid}";
    	
    	$conn = Yii::app()->db;
        $command = $conn->createCommand($command);
        
        $rows = $command->queryAll();
        return $rows;
    }
}
