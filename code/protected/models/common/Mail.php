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
			$from = 'noreply@kyyj.net';
		}

		$header = "{$this->header}From: admin <{$from}>\r\n";
        
		$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
		//var_dump($to,$subject,$message,$header);
		$rt = mail($to,$subject,$message,$header);
		return $rt;
	}

	function commonTemple($toname,$message,$fromname='')
	{
		$now = date("Y-m-d");
		return "
<html>
<head>
<title></title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<style type='text/css'>
tr,td {border: 0px; padding: 0px; margin: 0px;}
#backgroud {width:100%;border:0;}
#content_border {width:100%;padding:10px;}
#content {width:638px;border:1px solid #d3d3d3; }
#content_bk {width:90%;font-size: 12px;font-family: Helvetica,Arial,sans-serif;padding-bottom:50px;}
</style>
</head>
<body>
<table id='backgroud' align='center'>
<tr> <td id='content_border' valign='top' bgcolor='#ececec'>
    <table id='content' align='center' cellpadding='0' cellspacing='0' bgcolor='#ffffff'> <tr> <td>
        <table id='content_bk' cellpadding='0' cellspacing='0' border='0' align='center' valign='top' >
        <tr> <td><h2>4d系统学习平台</h2><hr> <br></td> </tr>
        <tr> <td style='font-weight:bold;'>尊敬的 <span style='color:rgb(55, 112, 165)'>{$toname}</span>, 您好！</td> </tr>
        <tr> <td style='width:600px;background-color:#fffff;margin-left:auto;margin-right:auto;padding:20px;'> {$message}</td> </tr>
		<tr> <td align='right'>非常感谢!</td> </tr>
        <tr> <td align='right'>{$fromname}</td> </tr>
        <tr> <td align='right'>{$now}</td> </tr>
        </table>
    </td> </tr> </table>
</td> </tr>
</table>
</body>
</html>		
		";
	}

	function commonTemple1($toname,$message,$fromname='')
	{
		return "
<html>
<head>
<title></title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<style type='text/css'>
</style>
</head>
<body style='font-size:90%'>
<div style='background-color:rgb(233, 233, 233);width:100%;margin:12px'>
<div style='padding-top:10px;padding-bottom:10px;'>
    <div style='width:650px;background-color:white;border:1px solid rgb(218, 218, 218);margin-left:auto;margin-right:auto;padding-bottom:50px;'>
        <div style='margin:10px;'>
        <h2>4d系统学习平台</h2>
        <hr> <br>
        <div style='font-weight:bold;'>尊敬的 <span style='color:rgb(55, 112, 165)'>{$toname}</span>, 您好！</div>
        <div style='width:600px;background-color:#fffff;margin-left:auto;margin-right:auto;padding:20px;'>{$message}</div>
        <div style='float:right;'>{$fromname}</div>
        <div style='float:right;'>2013-01-01</div>
        </div>
    </div>
</div>
</body>
</html>
		";
	}


}



