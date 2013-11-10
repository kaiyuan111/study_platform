<?php

class MessNotify extends MessCommon
{
	public $MESS_TYPE = 'notify';
	// 发送消息
    public function send($title, $message, $uidFrom, $uidTo)
    {
		$this->sendM($this->MESS_TYPE, $title, $message, $uidFrom, $uidTo);
    }

}

