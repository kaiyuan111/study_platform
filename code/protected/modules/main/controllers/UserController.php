<?php

class UserController extends Controller
{
    public $layout = '/layouts/empty';

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

        $this->render('list',array('entitys'=>$usrInfos));
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
        $roles = $role->findAll(array('select'=>'rid,rname'));
        // var_dump($_REQUEST);
        // exit;
// 
        if(isset($_REQUEST['id'])&&$_REQUEST['id']!='') {
            // 修改
            $usrInfo = $usr->getUserWithRole('uid=:uid',array(':uid'=>$_REQUEST['id']));
            $usrInfo = $usrInfo[0];
            if(!empty($_REQUEST['modify'])) {
                $usr->updateByPk($_REQUEST['id'],array(
                    'uname'=>$_REQUEST['name'],
                    'email'=>$_REQUEST['email'],
                    'pwd'=>$_REQUEST['pwd'],
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
            if(!empty($_REQUEST['modify'])) {
                $usr->uname = $_REQUEST['name'];
                $usr->email = $_REQUEST['email'];
                $usr->pwd = $_REQUEST['pwd'];
                $usr->rid = $_REQUEST['rid'];
                $usr->save();
                $this->redirect('/main/user/list');
            }
        }

        $this->render('edit',array('entity'=>$usrInfo,'roles'=>$roles,'label'=>$label));
    }

    public function actionLogin()
    {
        $url = isset($_REQUEST['url']) ? $_REQUEST['url'] : '/';
        if(isset($_REQUEST['login_sub'])&&!empty($_REQUEST['name'])&&!empty($_REQUEST['pwd'])) {
            // 创建超极管理员
            Login::logins($_REQUEST['name'],$_REQUEST['pwd']);
            // var_dump($_REQUEST,$_SESSION);
            $this->redirect($url);
        }
        // var_dump($_SESSION);
        //unset($_SESSION['user']);
        $this->render('login',array(
            'url' => $url,
        ));
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION['user']);
        $this->redirect('/main/user/login');
    }

}
