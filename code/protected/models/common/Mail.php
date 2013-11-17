<?php

class Mail
{

	public $header = '';

	function __construct()
	{		
	}


	/**
	*@desc:是否发送html邮件
	*/
	function isHtml()
	{
		$headers = "MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type:text/html;charset=utf-8"."\r\n";
		// 更多报头
		//$headers .= 'Cc: myboss@example.com' . "\r\n";
		$this->header = $headers;
	}

	function send($to,$subject,$message,$from='')
	{
        if(!$from){
			$from = 'admin@kyyj.net';
		}

		$header = "{$this->header}
		From: {$from}
		";
        
		$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
		//var_dump($to,$subject,$message,$header);
		$rt = mail($to,$subject,$message,$header);
		return $rt;
	}


}



