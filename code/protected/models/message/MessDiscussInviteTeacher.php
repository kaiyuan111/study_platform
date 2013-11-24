<?php

// 邀请老师参加讨论组
class MessDiscussInviteTeacher extends MessCommon
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
        $message = "邀请您参加课程《{$courseInfo['name']}》的讨论话题《<a href='http://{$_SERVER['HTTP_HOST']}/student/discussdetail?id={$discussInfo['id']}' target='_blank' >{$discussInfo['title']}</a>》!";
		$mailmessage = $message."<br><br><br>讨论内容：<br>-------------------------<br>".$discussInfo['content']."<br>-------------------------<br>"."请访问 http://{$_SERVER['HTTP_HOST']}/student/discussdetail?id={$discussInfo['id']} 对话题进行回复<br>";
		//$mailmessage = $message."<br><br>讨论内容：<br>".$discussInfo['content'];

		$mail = new Mail;
		$mail->isHtml();
		$title = "邀请讨论";
		$userfrom = User::model()->findByPk($uidFrom);
        foreach($teachers as $t) 
        {
			// 消息
			$this->sendM($this->MESS_TYPE, $title, $message, $uidFrom, $t['uid']);

			// 邮件
			$mailmess = $mail->commonTemple($t['uname'],$mailmessage,'4d.com');
			$ret = $mail->send($t['email'],$title,$mailmess);
        }
        /*
        $info = new Info;
        $info->saveNotifyMessage("邀请讨论",$message,$uidFrom,$courseInfo['creator']);
         */
		return true;
	}
}


