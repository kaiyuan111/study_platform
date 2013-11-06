<?php

class MessInviteTeacher extends MessCommon
{
	public $MESS_TYPE = 'notify';
	public function send($uidFrom,$courseid,$groupid,$discussid)
	{
        $discussInfo = StudyDiscuss::model()->findByPk($discussid);
        $courseInfo = Course::model()->findByPk($courseid);
        $userInst = new MUser;
        $teachers = $userInst->getTeacherByGroup($groupid);
        if(empty($discussInfo)||empty($courseInfo)||empty($teachers)) {
            return false;
        }
        $message = "邀请您参加课程《{$courseInfo['name']}》的讨论组《{$discussInfo['title']}》!";
        foreach($teachers as $t) 
        {
            //$info = new Info;
            //$info->saveNotifyMessage("邀请讨论",$message,$uidFrom,$t['uid']);
			$this->sendM($this->MESS_TYPE, '邀请讨论', $message, $uidFrom, $t['uid']);
        }
        /*
        $info = new Info;
        $info->saveNotifyMessage("邀请讨论",$message,$uidFrom,$courseInfo['creator']);
         */
		return true;
	}
}


