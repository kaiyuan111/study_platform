<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

    public $layout='//layouts/column1';

    public $userid;


    protected function beforeAction($action)
    {
        // 登陆
        preg_match("/(^.*)\?/",$_SERVER['REQUEST_URI'],$matchs);
        $requestUrl = $matchs[1];
        if($_SERVER['REQUEST_URI']=='/main/user/login' || $requestUrl=='/main/user/initsystem') {
            return true;
        }
        $userInfo = Login::getLoginInfo();
        if(empty($userInfo)) $this->redirect('/main/user/login');
        $this->userid = $userInfo['uid'];
        // 权限限制
        if(!Privilege::hasPrivilege($userInfo['uid'],$requestUrl)) {
            return false;
        }

        return true;
    }

}
