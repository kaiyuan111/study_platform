<?php

// 邀请老师参加讨论组
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
        $message = "邀请您参加课程《{$courseInfo['name']}》的讨论组《<a href='http://115.28.53.156/student/discussdetail?id={$discussInfo['id']}' target='_blank' >{$discussInfo['title']}</a>》!";
		$mail = new Mail;
        foreach($teachers as $t) 
        {
            //$info = new Info;
            //$info->saveNotifyMessage("邀请讨论",$message,$uidFrom,$t['uid']);
			$this->sendM($this->MESS_TYPE, '邀请讨论', $message, $uidFrom, $t['uid']);
			//var_dump($t['email']);exit;
			//$ret = $mail->send($t['email'],'test','test');
        }
        /*
        $info = new Info;
        $info->saveNotifyMessage("邀请讨论",$message,$uidFrom,$courseInfo['creator']);
         */
		return true;
	}
}


