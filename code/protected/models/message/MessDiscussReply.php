<?php

class MessDiscussReply extends MessCommon
{
	public $MESS_TYPE = 'notify';
	public function send($uidFrom,$discussid,$content)
	{
		$userfrom = User::model()->findByPk($uidFrom);
        $discussInfo = StudyDiscuss::model()->findByPk($discussid);
        $message = "{$userfrom['uname']} 在讨论话题《<a href='http://{$_SERVER['HTTP_HOST']}/student/discussdetail?id={$discussInfo['id']}' target='_blank' >{$discussInfo['title']}</a>》进行了回复!";
		$mailmessage = $message."<br><br><br>回复内容：<br>-------------------------<br>".$content."<br>-------------------------<br>"."请访问 <a href='http://{$_SERVER['HTTP_HOST']}/student/discussdetail?id={$discussInfo['id']}'>http://{$_SERVER['HTTP_HOST']}/student/discussdetail?id={$discussInfo['id']}</a> 对话题进行回复<br>";
		//$mailmessage = $message."<br><br>讨论内容：<br>".$discussInfo['content'];

		$mail = new Mail;
		$mail->isHtml();
		$messtitle = "{$discussInfo['title']}话题讨论更新提醒";
		$title = "[4D系统学习平台]-{$discussInfo['title']}话题讨论更新提醒";
    	$discussMember = new DiscussMember();
    	$discussMemberInfo = $discussMember->getDisMemberInfoByDiscussId($discussid);
		//var_dump($discussMemberInfo);exit;
        foreach($discussMemberInfo as $user) 
        {
			if(empty($user)) continue;
			// 消息
			$this->sendM($this->MESS_TYPE, $messtitle, $message, $uidFrom, $user['uid']);

			// 邮件
			$mailmess = $mail->commonTemple($user['uname'],$mailmessage,'4d.com');
			$ret = $mail->send($user['email'],$title,$mailmess);
        }
		return true;
	}
}


