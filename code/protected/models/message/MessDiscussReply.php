<?php

class MessDiscussReply extends MessCommon
{
	public $MESS_TYPE = 'notify';
	public function send($uidFrom,$discussid,$content)
	{
		$userfrom = User::model()->findByPk($uidFrom);
        $discussInfo = StudyDiscuss::model()->findByPk($discussid);
        $message = "{$userfrom['uname']} 在讨论话题《<a href='http://{$_SERVER['HTTP_HOST']}/student/discussdetail?id={$discussInfo['id']}' target='_blank' >{$discussInfo['title']}</a>》进行了回复!";
		$mailmessage = $message."<br><br><br>讨论内容：<br>-------------------------<br>".$discussInfo['content']."<br>-------------------------<br>"."请访问 http://{$_SERVER['HTTP_HOST']}/student/discussdetail?id={$discussInfo['id']} 对话题进行回复<br>";
		//$mailmessage = $message."<br><br>讨论内容：<br>".$discussInfo['content'];

		$mail = new Mail;
		$mail->isHtml();
		$title = "回复讨论";
    	$discussMember = new DiscussMember();
    	$discussMemberInfo = $discussMember->getDisMemberInfoByDiscussId($discussid);
        foreach($discussMemberInfo as $user) 
        {
			if(empty($user)) continue;
			// 消息
			$this->sendM($this->MESS_TYPE, $title, $message, $uidFrom, $user['uid']);

			// 邮件
			$mailmess = $mail->commonTemple($user['uname'],$mailmessage,'4d.com');
			$ret = $mail->send($user['email'],$title,$mailmess);
        }
		return true;
	}
}


