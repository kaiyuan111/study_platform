<?php

class GroupMember extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-groupmember`';
    }

	public function getGroupIdByCourseId($courseId, $userId)
	{
		$sql = "select g.id from `m-groupmember` as gm inner join `m-group` as g on 
				gm.groupid=g.id where gm.uid = :uid and g.courseid = :courseid";
          
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        $command->bindParam(':uid',$userId);
        $command->bindParam(':courseid',$courseId);
        $rows = $command->queryAll();
        
        return empty($rows) ? 0 : $rows[0]['id'];
	}
	
	public function getGroupMemberIdsByGroupId($groupId)
	{
		//这个包括助教
		//"select gm.uid from `m-groupmember` as gm where gm.groupid = {$groupId}";
		//这个不包括助教
		$sql = "select gm.uid from `m-groupmember` as gm 
				inner join `m-user` as u on gm.uid = u.uid where gm.groupid = {$groupId} and u.rid = 3";
          
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        
        $rows = $command->queryAll();
        
        return $rows;
	}
	
	public function getGroupMemberInfoByGroupId($groupId)
	{
		
		//根据小组id获取小组成员id
   		$groupMemberId = $this->getGroupMemberIdsByGroupId($groupId);
   		
   		//获取组长信息
   		$groupInfo = Group::model()->findByPk($groupId);
   		$leaderId = $groupInfo->leaderid;
   		
   		$memberId = array();
   		foreach ($groupMemberId as $key => $value)
   		{
   			$memberId[] = $value['uid'];
   		}
   		if (!empty($leaderId))
   		{
   			$memberId[] = $leaderId;
   		}
   		
   		/*$memberIdStr = implode(',',$memberId);
		$sql = "select uid,uname from `m-user` where uid in ({$memberIdStr})";
		$conn = Yii::app()->db;
		$command = $conn->createCommand($sql);
        //$command->bindParam(':uid',$userId);
        //$command->bindParam(':groupid',$groupId);
        $rows = $command->queryAll();
        */
   		
   		$muser = new MUser();
   		$rows = $muser->getUserInfoByUids($memberId);
        return $rows;
	}
}
