<?php

// 创建讨论组通知
class MessDiscussCreate extends MessCommon
{
	public $MESS_TYPE = 'notify';
	public function send($discussInfo,$member)
	{
		$uidFrom = $discussInfo['uid'];
		$userfrom = User::model()->findByPk($uidFrom);

        $message = "讨论话题《<a href='http://{$_SERVER['HTTP_HOST']}/student/discussdetail?id={$discussInfo['id']}' target='_blank' >{$discussInfo['title']}</a>》已经被 {$userfrom['uname']} 更新!";
		$mailmessage = $message."<br><br><br>讨论内容：<br>-------------------------<br>".$discussInfo['content']."<br>-------------------------<br>"."请访问 http://{$_SERVER['HTTP_HOST']}/student/discussdetail?id={$discussInfo['id']} 对话题进行回复<br>";

		$mail = new Mail;
		$mail->isHtml();
		$title = "邀请讨论";
		$member[] = $discussInfo['uid'];
        foreach($member as $t) 
        {
			$user = User::model()->findByPk($t);
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


