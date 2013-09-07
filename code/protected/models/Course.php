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

    public function courseListByUid($uid)
    {
        if (empty($uid))
        {
            return array();
        }

        $command = 'select c.* from `m-groupmember` m inner join `m-group` g on m.groupid = g.id 
            left join `m-course` c on g.courseid = c.id where m.uid = :uid';

        $conn = Yii::app()->db;
        $command = $conn->createCommand($command);
        $command->bindParam(':uid',$uid);

        $rows = $command->queryAll();
        return $rows;
    }

    public function getCreateCourseListByUid($uid)
    {
    	if (empty($uid))
    	{
    		return array();
    	}
    	
    	/*$command = 'select c.* from `m-groupmember` m inner join `m-group` g on m.groupid = g.id 
    	left join `m-course` c on g.courseid = c.id where m.uid = :uid';*/
    	
    	$command = 'select * from `m-course` where creator = ' . $uid;

    	$conn = Yii::app()->db;
        $command = $conn->createCommand($command);
        
        $rows = $command->queryAll();
        return $rows;
    }
    
    //获取课程的目录
    public function courseCatalogueByCid($courseid)
    {
    	//var_dump($courseid);exit;
    	if (empty($courseid))
    	{
    		return array();
    	}
    	
    	/*$command = 'select a.title,b.desc,c.uname from `m-coursecontent` a 
    				left join `m-course` b on a.courseid = b.id 
    				left join `m-user` c on b.creator = c.uid where b.id = :courseid';*/
    	
    	$command = 'select a.title,a.id from `m-coursecontent` a 
    				 where a.courseid = :courseid';
    	
    	$conn = Yii::app()->db;
        $command = $conn->createCommand($command);
        $command->bindParam(':courseid',$courseid);
        
        $rows = $command->queryAll();
        return $rows;
    }
    
    //获取课程的作者信息
    public function courseCreatorByCid($courseid)
    {
    	if (empty($courseid))
    	{
    		return array();
    	}
    	//echo "fuck,world";exit;
    	$command = 'select b.* from `m-course` a 
    				left join `m-user` b on a.creator = b.uid 
    			    where a.id = :courseid';
    	
    	$conn = Yii::app()->db;
        $command = $conn->createCommand($command);
        $command->bindParam(':courseid',$courseid);
        
        $rows = $command->queryAll();
        if (!empty($rows))
        {
        	return $rows[0];
        }
        //var_dump($rows);exit;
        return array();
    }
    
    //获取助教管理的课程信息
    public function getCourseListOfAssist($userid)
    {
    	$command = 'select c.* from `m-groupmember` gm 
    				inner join `m-group` g on gm.groupid = g.id
    				inner join `m-course` c on g.courseid = c.id 
    			    where gm.uid = ' . $userid;
    	
    	$conn = Yii::app()->db;
        $command = $conn->createCommand($command);
    	$rows = $command->queryAll();
    	
    	return $rows;
    }
    
    //根据课程获取助教的小组
    public function getGroupListByCid($cid, $uid)
    {
    	$command = 'select g.* from `m-groupmember` gm 
    				inner join `m-group` g on gm.groupid = g.id
    			    where g.courseid = ' . $cid . 'and gm.uid = ' . $uid;
    	
    	$conn = Yii::app()->db;
        $command = $conn->createCommand($command);
    	$rows = $command->queryAll();
    	
    	return $rows;
    }
}
