<?php

class RoleController extends Controller
{
    public $layout = '/layouts/frame_with_leftnav';

    public function actionIndex()
    {
        $this->redirect('/main/role/list');
    }

    public function actionList()
    {
        $role = new Role;
        $roleInfos = array();
        if(!empty($_REQUEST['name'])) {
            $roleInfos = $role->findAll('rname=:name',array(':name'=>$_REQUEST['name']));
        } else {
            $roleInfos = $role->findAll();
        }

        // 过滤超极管理员
        // foreach($roleInfos as $role) {
            // if($role['rname']!='superman') $roles[] = $role;
        // }

        $this->render('list',array('entitys'=>$roleInfos));
    }

    public function actionGetRoleList()
    {
        $role = new Role;
        $roleInfos = $role->findAll(array('select'=>'rid,rname'));
        $ret = array();
        foreach($roleInfos as $role) {
            $ret[] = $role->getAttributes();
        }
        echo json_encode($ret);
    }

    public function actionEdit()
    {
        //echo "<pre>";var_dump($_REQUEST);exit;
        $role = new Role;
        $roleInfo = array();
        $label = '';
        foreach($_REQUEST as $k=>$v) {
            if($k!='actions'&&$k!='positions')
                $_REQUEST[$k] = trim($v);
        }
        // action 列表 展现
        $action = new Action;
        $actionList = $action->findAll('1=1 order by is_menu desc, route desc');
        if(isset($_REQUEST['id'])&&$_REQUEST['id']!='') {
            // 修改
            $roleInfo = $role->findRole($_REQUEST['id']);
            if(!empty($_REQUEST['modify'])) {
                $role->updateRole($_REQUEST);
                $this->redirect('/main/role/list');
            }
        } elseif(!empty($_REQUEST['name'])) {
            // 新增
            $roleInfo = $role->find('rname=:name',array(':name'=>$_REQUEST['name']));
            if(!empty($roleInfo)) {
                $roleInfo = $roleInfo->getAttributes();
                $roleInfo['actions'] = RoleAction::model()->findActions($roleInfo['rid']);
                $this->render('edit',array('action_list'=>$actionList,'entity'=>$roleInfo,'label'=>'has_role'));
                exit;
            }
            if(!empty($_REQUEST['modify'])) {
                $role->saveRole($_REQUEST);
                $this->redirect('/main/role/list');
            }
        }

        // foreach($actionList as $k=>$v) {
            // echo "<pre>";var_dump($k,$v->getAttributes());
        // }exit;
        $this->render('edit',array('action_list'=>$actionList,'entity'=>$roleInfo,'label'=>$label));
    }
}
