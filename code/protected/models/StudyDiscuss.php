<?php

class StudyDiscuss extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-discuss`';
    }
    
    //获取学习详情，2批注，1摘要
    public function getStudyDetailByCid($courseId, $type = 2)
    {
    	if (empty($courseId))
    	{
    		return array();
    	}
    	
    	$command = 'select a.id,a.title, b.content from `m-coursecontent` a inner join `m-study` b 
    	            on b.chapterid = a.id where a.courseid = :courseid and b.type = :type';
    	
    	$conn = Yii::app()->db;
        $command = $conn->createCommand($command);
        $command->bindParam(':courseid',$courseId);
        $command->bindParam(':type',$type);
        
        $rows = $command->queryAll();
        return $rows;
    }

    /**
     * notifyTeacherToDiscuss 
     *
     * 保存通知老师的消息
     * 
     * @param mixed $uidFrom  消息发送者
     * @param mixed $courseid 当前讨论组所属课程
     * @param mixed $groupid  当前讨论组所属小组
     * @param mixed $discussid 当前讨论组的id
     * @return void
     */
    public function notifyTeacherToDiscuss($uidFrom,$courseid,$groupid,$discussid)
    {
        $discussInfo = StudyDiscuss::model()->findByPk($discussid);
        $courseInfo = Course::model()->findByPk($courseid);
        $userInst = new MUser;
        $teachers = $userInst->getTeacherByGroup($groupid);
        if(empty($discussInfo)||empty($courseInfo)||empty($teachers)) {
            return false;
        }
        $message = "邀请您参加课程《{$courseInfo['name']}》的讨论组《{$discussInfo['title']}》!";
        foreach($teachers as $t) {
            $info = new Info;
            $info->saveNotifyMessage("邀请讨论",$message,$uidFrom,$t['uid']);
        }
        $info = new Info;
        $info->saveNotifyMessage("邀请讨论",$message,$uidFrom,$courseInfo['creator']);
        return true;
    }

}
