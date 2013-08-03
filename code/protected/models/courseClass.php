<?php

class Course extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-course`';
    }

    //获得某个教师的科目列表
    public function getCourseListByTeacher($teacherId = '')
    {
    	$sql = "select * from `m-course` ";
        if(!empty($condition)) 
        {
            $sql .=  'where creator=' . $teacherId;
        }         
        
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        
        $rows = $command->queryAll();
        return $rows;
    }
    
    //获得某个科目的具体信息
	public function getCourseByCourseId($courseId)
    {
    	if (empty($courseId))
    	{
    		return false;
    	}
    	
    	$sql = "select * from `m-course` where courseid={$courseId}";
        
        
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        
        $rows = $command->queryRow();
        return $rows;
    }
    
    //更新科目的信息，比如类别,科目名称等
    public function saveCourseByCourseId($courseInfo, $courseId = '')
    {
    	
    	$sql = "select * from `m-course` where courseid={$courseId}";
        
        
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        
        $rows = $command->queryRow();
        return $rows;
    }
    
    //获得科目的目录,title代表目录
	public function getCourseCatalogueByCourseId($courseId)
    {
    	if (empty($courseId))
    	{
    		return false;
    	}
    	
    	$sql = "select contentid,courseid,title from `m-coursecontent` where courseid={$courseId}";
        
        
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        
        $rows = $command->queryRow();
        return $rows;
    }
    
	//添加内容
	public function saveCourseContent($contentInfo,$courseId)
    {
    	if (empty($courseId) || empty($contentInfo))
    	{
    		return false;
    	}
    	
    	$sql = "select contentid,courseid,title from `m-coursecontent` where courseid={$courseId}";
        
        
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        
        $rows = $command->queryRow();
        return $rows;
    }
}
