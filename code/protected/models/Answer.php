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
    
    //获取一个小组的学生对于某一章习题的回答情况
    public function getGroupMemberAnswer($groupMemIds, $chapterId)
    {
    	$groupMemIdsStr = implode(',', $groupMemIds);
    	$command = "select a.* from `m-homework` h inner join `m-answer` a on h.id = a.homeworkid
    				where h.chapterid = {$chapterId} and a.uid in ({$groupMemIdsStr})";
    	
    	$conn = Yii::app()->db;
        $command = $conn->createCommand($command);
        
        $rows = $command->queryAll();
        return $rows;
    }
}
