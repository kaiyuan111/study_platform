<?php

class MUser extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-user`';
    }

    /**
     * getStudent 
     *
     * 获取学生列表
     * 
     * @return void
     */
    public function getStudent()
    {
        $params = Yii::app()->getParams();
        $rid = $params['rid'];
        $sql = "
            select u.*, r.rname from `m-user` as u inner join `m-role` as r on u.rid=r.rid where u.rid = {$rid['student']}
        ";
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        $rows = $command->queryAll();
        return $rows;
    }

    /**
     * getStudentWithoutGroup 
     *
     * 获取某课程下没有分组的学生列表
     * 
     * @return void
     */
    public function getStudentWithoutGroup($cid)
    {
        $params = Yii::app()->getParams();
        $rid = $params['rid'];
        $sql = "
            select u.* from `m-user` as u 
            where u.rid = {$rid['student']} and u.uid not in 
            (select distinct uid from `m-groupmember` as gm
                inner join `m-group` as g on gm.groupid=g.id
                where courseid = {$cid}
            )
        ";
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        $rows = $command->queryAll();
        return $rows;
    }

    /**
     * getTeacherByGroup 
     *
     * 获取所有助教列表(区分是否是当前组的助教)
     * 
     * @param mixed $gid  当前组
     * @param mixed $courseuid  当前组所属的课程的老师，输入则过滤当前课程老师
     * @return void
     */
    public function getTeacherByGroup($gid,$courseuid='-1')
    {
        $params = Yii::app()->getParams();
        $rid = $params['rid'];
        $sql = "
            select u.*,
            case when u.uid in (select distinct uid from `m-groupmember` where groupid={$gid}) then '1' 
            else '0' end ingroup 
            from `m-user` as u where u.rid = {$rid['teacher']} and uid!={$courseuid}
        ";
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        $rows = $command->queryAll();
        return $rows;
    }

    /**
     * getTeacherByGroup 
     *
     * 获取当前组助教列表
     * 
     * @param mixed $gid  当前组
     * @param mixed $courseuid  当前组所属的课程的老师，输入则过滤当前课程老师
     * @return void
     */
    public function getAssistantByGroup($gid,$courseuid='-1')
    {
        $params = Yii::app()->getParams();
        $rid = $params['rid'];
        $sql = "
            select * from `m-user`  
            where rid = {$rid['teacher']} and uid!={$courseuid} 
            and uid in (select distinct uid from `m-groupmember` where groupid={$gid})
        ";
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        $rows = $command->queryAll();
        return $rows;
    }
    
    //根据uid获取用户信息
    public function getUserInfoByUids($uidArray)
    {
    	if (empty($uidArray))
    	{
    		return array();
    	}
    	$memberIdStr = implode(',',$uidArray);
		$sql = "select uid,uname,email from `m-user` where uid in ({$memberIdStr})";
		$conn = Yii::app()->db;
		$command = $conn->createCommand($sql);
       
        $rows = $command->queryAll();
        
        return $rows;
    }
}


