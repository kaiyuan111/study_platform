<?php

// 邀请老师参加讨论组
class MessDiscussCreate extends MessCommon
{
	public $MESS_TYPE = 'notify';
	public function send($discussInfo,$member)
	{
		$uidFrom = $discussInfo['uid'];

        $message = "邀请您参加讨论组《<a href='http://115.28.53.156/student/discussdetail?id={$discussInfo['id']}' target='_blank' >{$discussInfo['title']}</a>》!";

		$mail = new Mail;
		$mail->isHtml();
		$title = "邀请讨论";
		$userfrom = User::model()->findByPk($uidFrom);
        foreach($member as $t) 
        {
			$user = User::model()->findByPk($t);
			if(empty($user)) continue;
			// 消息
			$this->sendM($this->MESS_TYPE, $title, $message, $uidFrom, $user['uid']);

			// 邮件
			$message .= "<br><br>讨论内容：<br>".$discussInfo['content'];
			$mailmess = $mail->commonTemple($user['uname'],$message,$userfrom['uname']);
			$ret = $mail->send($user['email'],$title,$mailmess);
        }
		return true;
	}
}


