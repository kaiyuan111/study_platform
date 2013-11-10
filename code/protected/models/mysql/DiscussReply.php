<?php

class DiscussReply extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-discussreply`';
    }
    
    //获取一批讨论的回复
		public function getDiscussReplyByDiscussIds($discussIds)
		{
			$ids = implode(',', $discussIds);
			$command = "select * from `m-discussreply` where discussid in ({$ids})";
			$conn = Yii::app()->db;
			$command = $conn->createCommand($command);
			$rows = $command->queryAll();

			return $rows;
		}
}
