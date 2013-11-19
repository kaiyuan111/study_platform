<?php

class MessNotify extends MessCommon
{
	public $MESS_TYPE = 'notify';
	// 发送消息
    public function send($title, $message, $uidFrom, $uidTo)
    {
		$this->sendM($this->MESS_TYPE, $title, $message, $uidFrom, $uidTo);

		$mail = new Mail;
		$mail->isHtml();
		$userfrom = User::model()->findByPk($uidFrom);
		$userto = User::model()->findByPk($uidTo);
		$mailmess = $mail->commonTemple($userto['uname'],$message,$userfrom['uname']);
		$ret = $mail->send($userto['email'],$title,$mailmess);
    }

}

