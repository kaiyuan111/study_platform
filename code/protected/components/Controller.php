<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

    public $layout='//layouts/column1';

    public $userid=0;
	public $userInfo = array();
	
    // 页面title
    public $actionName=0;


    protected function beforeAction($action)
    {
    	
    	//return true;
        // 登陆
        preg_match("/(^.*?)\?|(^.*)/",$_SERVER['REQUEST_URI'],$matchs);
        $requestUrl = empty($matchs[1]) ? $matchs[2] : $matchs[1];
        //echo $requestUrl;exit;
        // 页面title
        $actionInfo = Action::model()->find("route=:route",array(':route'=>$requestUrl));
        $this->actionName = $actionInfo['aname'];
        //var_dump($this->actionName);exit;

        // 登陆限制
        if($_SERVER['REQUEST_URI']=='/main/user/logout' 
            || preg_match('|^/main/user/login|',$_SERVER['REQUEST_URI']) 
            || preg_match('|^/main/user/register|',$_SERVER['REQUEST_URI'])
            || $requestUrl=='/site/index'
            || $requestUrl=='/main/user/initsystem'
            ) 
        {
            return true;
        }
        
        $userInfo = Login::getLoginInfo();
        $url = urlencode($_SERVER['REQUEST_URI']);
        //var_dump($url);exit;
        if(empty($userInfo)) $this->redirect('/main/user/login?url='.$url);
        $this->userid = $userInfo['uid'];
		$this->userInfo = $userInfo;
        // 权限限制
        if(!Privilege::hasPrivilege($userInfo['uid'],$requestUrl)) 
        {
            return false;
        }

        return true;
    }

}
