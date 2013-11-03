<?php

class UserController extends Controller
{
    public $layout = '/layouts/frame_with_leftnav';
	
	const ACCOUNT_PATTERN = '/^[A-Za-z\x{4e00}-\x{9fa5}][A-Za-z0-9\x{4e00}-\x{9fa5}_-]{3,20}$/u';
	//const ACCOUNT_PATTERN = '/^[A-Za-z\x{4e00-\x{9fa5}}][A-Za-z0-9\x{4e00-\x{9fa5}_-}{2-20}]$/u';
    public function actionInitSystem()
    {
        //todo 增加权限限制
        InitSystem::initActions();
        InitSystem::initSupperUser('superman','superman');
        InitSystem::initRoles();
    }

    public function actionIndex()
    {
        $this->redirect('/main/user/list');
    }


    public function actionList()
    {
        $usr = new User;
        $usrInfos = array();
        if(!empty($_REQUEST['name'])) {
            $usrInfos = $usr->getUserWithRole('uname=:name',array(':name'=>$_REQUEST['name']));
        } else {
            $usrInfos = $usr->getUserWithRole();
        }

        // 过滤超极管理员
        $users = array();
        foreach($usrInfos as $user) {
            if($user['rname']!='superman') $users[] = $user;
        }

        $this->render('list',array('entitys'=>$users));
    }

    public function actionEdit()
    {
        $usr = new User;
        $role = new Role;
        $usrInfo = array();
        $label = '';
        foreach($_REQUEST as $k=>$v) {
            $_REQUEST[$k] = trim($v);
        }

        // 获取role列表
        $roleInfos = $role->findAll(array('select'=>'rid,rname'));
        // 过滤超极管理员
        foreach($roleInfos as $role) {
            if($role['rname']!='superman') $roles[] = $role;
        }
        // var_dump($_REQUEST); exit;
// 
        if(isset($_REQUEST['id'])&&$_REQUEST['id']!='') {
            // 修改
            $usrInfo = $usr->getUserWithRole('uid=:uid',array(':uid'=>$_REQUEST['id']));
            $usrInfo = $usrInfo[0];
            if(isset($_REQUEST['modify'])) {
                $usr->updateByPk($_REQUEST['id'],array(
                    'uname'=>$_REQUEST['name'],
                    'email'=>$_REQUEST['email'],
                    'pwd'=>Login::pwdEncry($_REQUEST['pwd']),
                    'rid'=>$_REQUEST['rid'],
                ));
                $this->redirect('/main/user/list');
            }
        } elseif(!empty($_REQUEST['name'])) {
            // 新增
            $usrInfo = $usr->getUserWithRole('uname=:name',array(':name'=>$_REQUEST['name']));
            if(!empty($usrInfo)) {
                $this->render('edit',array('roles'=>$roles,'entity'=>$usrInfo[0],'label'=>'has_usr'));
                exit;
            }
            if(isset($_REQUEST['modify'])) {
                $usr->uname = $_REQUEST['name'];
                $usr->email = $_REQUEST['email'];
                $usr->pwd = Login::pwdEncry($_REQUEST['pwd']);
                $usr->rid = $_REQUEST['rid'];
                $usr->save();
                $this->redirect('/main/user/list');
            }
        }

        $this->render('edit',array('entity'=>$usrInfo,'roles'=>$roles,'label'=>$label));
    }

    //登录
    public function actionLogin()
    {
    	$this->layout = '';
        $url = isset($_REQUEST['url']) ? $_REQUEST['url'] : '';
        if(isset($_POST['login_sub'])&&!empty($_POST['name'])&&!empty($_POST['pwd'])) 
        {
            $loginUserInfo = Login::logins($_REQUEST['name'],$_REQUEST['pwd'],'notmingwen');
			// 兼容老的情况
			if(empty($loginUserInfo))
            	$loginUserInfo = Login::logins($_REQUEST['name'],$_REQUEST['pwd'],'mingwen');
            if (!empty($loginUserInfo))
            {
                if (!empty($url) && $url != '/')
                {
                    $this->redirect($url);
                }
                else 
                {
                    $this->redirect('/site/index');
                }
            }
            else 
            {
            	$this->render('login', array('error'=>1,'url'=>$url));
                exit;
            }
        }
        //echo "fuck,world";
        $this->render('login',array(
            'url' => $url,
        ));
    }

    //注册
    public function actionRegister()
    {
    	$account = isset($_POST['name']) ? trim($_POST['name']) : '';
    	$pwd = isset($_POST['pwd']) ? trim($_POST['pwd']) : '';
    	$pwdConfirm = isset($_POST['pwdconfirm']) ? trim($_POST['pwdconfirm']) : '';
    	
    	//var_dump($account);//exit;
    	if (!$this->validateAccount($account))
    	{
    		//$this->render('/site/error',array('errortxt'=>$descError));
    		$errorDesc = '用户名只能包括英文字符汉字和数字，并且不能以数字开头,长度4-20个字符';
    		$this->render('/site/error', array('errortxt' => $errorDesc)); 
    		exit();
    	}
    	
    	if (empty($pwd) || $pwd != $pwdConfirm) 
    	{
    		$this->render('/site/error', array('errortxt' => '两次密码不一致'));
    		exit();
    	}
    	
    	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
    	if (empty($email))
    	{
    		$this->render('/site/error', array('errortxt' => '邮箱不能为空'));
    		exit();
    	}
    	
		$params = Yii::app()->getParams();
		$rid = $params['rid'];
    	$user = new User();
    	$user->uname = $account;
        $user->email = $email;
        $user->pwd = Login::pwdEncry($pwd);
        $user->rid = $rid['student'];   //学生
        $user->save();
        
        $ret = Login::logins($account,$pwd,'notmingwen');
		if(empty($ret)) {
        	Login::logins($account,$pwd,'mingwen');
		}
        $this->redirect('/student/courselist');
    }
    public function actionLogout()
    {
        Login::logout();
        $this->redirect('/main/user/login');
    }

    public function actionDel()
    {
        User::model()->delUser($_REQUEST['id']);
        $this->redirect('/main/user/list');
    }

    public function validateAccount($account)
    {
    	//echo "11111";exit;
    	//echo $account;
    	//$result = preg_match(self::ACCOUNT_PATTERN, $account, $match);
    	//var_dump(self::ACCOUNT_PATTERN, $account,$result,$match);exit;
    	 if (preg_match(self::ACCOUNT_PATTERN, $account, $match))
    	 {
    	 	//echo "fuck,world";exit;
    	 	return true;
    	 }
    	 else
    	 {
    	 	//echo "hello,world";exit;
    	 	return false;
    	 }
    }
}
