<?php

class MessNotify extends MessCommon
{
	// 发送消息
    protected function sendM($type, $title, $message, $uidFrom, $uidTo)
    {
		$info = new Info;
        $info->type=$type;
        $info->title=$title;
        $info->uid_from=$uidFrom;
        $info->request_time=date("Y-m-d");
        $info->content=$message;
        $info->uid_to=$uidTo;
        $info->save();
    }

	protected function acceptM()
	{
	}

	protected function refuseM()
	{
	}
}

