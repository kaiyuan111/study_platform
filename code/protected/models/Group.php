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

    /**
     * getStudentWithinGroup 
     *
     * 获取某个小组的已有成员(不包括组长)
     * 
     * @param mixed $gid 
     * @return void
     */
    public function getStudentWithinGroup($gid)
    {
        $sql = "
            select g.id,g.name,u.uid,u.uname from `m-group` as g 
            inner join `m-groupmember` as gm on g.id=gm.groupid 
            inner join `m-user` as u on gm.uid=u.uid 
            inner join `m-role` as r on u.rid=r.rid 
            where g.id={$gid} and r.rname='学生' and u.uid!=g.leaderid
        ";
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        $rows = $command->queryAll();
        return $rows;
    }

    /**
     * getGroupLeader 
     *
     * 获取组长信息
     * 
     * @param mixed $gid 
     * @return void
     */
    public function getGroupLeader($gid)
    {
        $sql = "
            select u.* from `m-group` as g 
            inner join `m-user` as u on u.uid=g.leaderid
            where g.id='{$gid}'
        ";
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        $rows = $command->queryAll();
        return empty($rows)?array():$rows[0];
    }

}
