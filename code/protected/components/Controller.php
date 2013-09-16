<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

	public $weeks = array(1=>'星期一',2=>'星期二',3=>'星期三',
				4=>'星期四',5=>'星期五',6=>'星期六',7=>'星期日');
				
    public $layout='//layouts/column1';

    public $userid=0;
	public $userInfo = array();
	
    // 页面title
    public $actionName=0;


    protected function beforeAction($action)
    {
    	header("Cache-Control: no-cache, must-revalidate");
    	date_default_timezone_set('PRC');	
    	//return true;
        // 登陆
        preg_match("/(^.*?)\?|(^.*)/",$_SERVER['REQUEST_URI'],$matchs);
        //var_dump($matchs);exit;
        $requestUrl = empty($matchs[1]) ? $matchs[2] : $matchs[1];
        
        //echo $requestUrl;exit;
        // 页面title
        $actionInfo = Action::model()->find("route=:route",array(':route'=>$requestUrl));
        //var_dump($actionInfo);exit;
        if (!empty($actionInfo))
        {
        	$this->actionName = $actionInfo['aname'];
        }
        
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
        //var_dump($userInfo);exit;
        $url = urlencode($_SERVER['REQUEST_URI']);
        //var_dump($url);exit;
        if(empty($userInfo)) $this->redirect('/main/user/login?url='.$url);
        $this->userid = $userInfo['uid'];
		$this->userInfo = $userInfo;
        // 权限限制
        if(!Privilege::hasPrivilege($userInfo['uid'],$requestUrl)) 
        {
        	//echo "22222";
            return false;
        }

        return true;
    }

}
