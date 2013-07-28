<?php

// 命令行下获取ip
function get_server_ip()
{ 
	if(!empty($_SERVER['SERVER_ADDR'])) 
		return $_SERVER['SERVER_ADDR']; 
	$result = shell_exec("ifconfig"); 
	if(preg_match_all("/addr:(\d+\.\d+\.\d+\.\d+)/", $result, $match) !== 0) { 
		foreach($match[0] as $k=>$v) { 
			if($match[1][$k] != "127.0.0.1") 
				return $match[1][$k]; 
		} 
	} 
	return false; 
}
$ip = get_server_ip();
$_SERVER["SERVER_ADDR"] = isset($_SERVER["SERVER_ADDR"]) ? $_SERVER["SERVER_ADDR"] : $ip;

// db info
$dbconfig = include "../../config/db.php";
$dbh = new PDO($dbconfig['connectionString'], $dbconfig['username'], $dbconfig['password']);
// $dsn = 'mysql:dbname=questionnaire;host=10.16.15.79:3306';
// $user = 'open';
// $password = '8J6cn4A7f4SC2a7W';
// $dbh = new PDO($dsn, $user, $password);

for($i=11;$i<=28;$i++) {
    $name = 'q3'.$i;
    $sql = "alter table questionnaire add column {$name} int(10) unsigned not null default '0'";
    $pre = $dbh->prepare($sql);
    $ret = $pre->execute();
}




