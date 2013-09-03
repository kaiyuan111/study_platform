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
        $sql = "
            select u.*, r.rname from `m-user` as u inner join `m-role` as r on u.rid=r.rid where r.rname='学生'
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
        $sql = "
            select u.* from `m-user` as u 
            where u.rid = 3 and u.uid not in 
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
     * getTeacher
     *
     * 获取助教列表
     * 
     * @return void
     */
    public function getTeacherByGroup($gid)
    {
        $sql = "
            select u.*,
            case when u.uid in (select distinct uid from `m-groupmember` where groupid={$gid}) then '1' 
            else '0' end ingroup 
            from `m-user` as u where u.rid = 2
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
		$sql = "select uid,uname from `m-user` where uid in ({$memberIdStr})";
		$conn = Yii::app()->db;
		$command = $conn->createCommand($sql);
       
        $rows = $command->queryAll();
        
        return $rows;
    }
}


