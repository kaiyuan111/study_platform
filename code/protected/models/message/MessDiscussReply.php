<?php

class MessDiscussReply extends MessCommon
{
	public $MESS_TYPE = 'notify';
	public function send($uidFrom,$discussid,$content)
	{
        $discussInfo = StudyDiscuss::model()->findByPk($discussid);
        $message = "我在讨论组《<a href='http://115.28.53.156/student/discussdetail?id={$discussInfo['id']}' target='_blank' >{$discussInfo['title']}</a>》进行了回复!";

		$mail = new Mail;
		$mail->isHtml();
		$title = "回复讨论";
		$userfrom = User::model()->findByPk($uidFrom);
    	$discussMember = new DiscussMember();
    	$discussMemberInfo = $discussMember->getDisMemberInfoByDiscussId($discussid);
        foreach($discussMemberInfo as $user) 
        {
			if(empty($user)) continue;
			// 消息
			$this->sendM($this->MESS_TYPE, $title, $message, $uidFrom, $user['uid']);

			// 邮件
			$message .= "<br><br>回复内容：<br>".$content;
			$mailmess = $mail->commonTemple($user['uname'],$message,$userfrom['uname']);
			$ret = $mail->send($user['email'],$title,$mailmess);
        }
		return true;
	}
}


