<?php

class Login
{
    /**
     * getLoginInfo 
     *
     * 判断是否登陆并获取用户信息
     * 
     * @return false or array userInfo
     */
    static public function getLoginInfo()
    {
        session_start();
        if(empty($_SESSION['user'])) return false;
        $user = explode('_',$_SESSION['user']);
        if(isset($user[0])) {
            $userInfo = User::model()->find('uid=:id',array(':id'=>$user[0]))->getAttributes();
            return $userInfo;
        }
        return false;
    }

    /**
     * login 
     *
     *  登录
     * 
     * @param mixed $name 
     * @param mixed $pwd 
     * @return bool
     */
    static public function logins($name, $pwd)
    {
        session_start();
        $userInfo = User::model()->find('uname=:name',array(':name'=>$name))->getAttributes();
        if(!empty($userInfo)) {
            $_SESSION['user'] = $userInfo['uid'].'_'.md5($_REQUEST['name'].$_REQUEST['pwd']);
            return true;
        }
        return false;
    }

}


