<?php

class DiscussMember extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-discussmember`';
    }
    
    //根据讨论id获取参与讨论的人员信息
    public function getDisMemberInfoByDiscussId($id)
    {
    	$sql = "select uid from `m-discussmember` where discussid = {$id}";
		$conn = Yii::app()->db;
		$command = $conn->createCommand($sql);
        $rows = $command->queryAll();
        
        $uidsArray = array();
        foreach ($rows as $key => $value)
        {
        	$uidsArray[] = $value['uid'];
        }
        
        $userInfo = array();
        if (!empty($uidsArray))
        {
        	$userModel = new MUser();
        	$userInfo = $userModel->getUserInfoByUids($uidsArray);
        }
        
        return $userInfo;
    }
}
