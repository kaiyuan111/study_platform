<?php

class InitSystem
{
    static public function initActions()
    {
        $action = new Action;
        $actions = Yii::import('application.config-dist.actions');
        foreach($actions as $k=>$v) {
            $ret = $action->find('aname=:name',array(':name'=>$v['aname']));
            if(empty($ret)) {
                $action->aname = $v['aname'];
                $action->route = $v['route'];
                $action->is_menu = $v['is_menu'];
                $action->save();
            }
        }
    }

    static public function initRoles()
    {
    }

    static public function initUsers()
    {
    }

    /**
     * makeSupperUser 
     *
     * 创建超极管理员
     * 
     * @param mixed $uname 
     * @param mixed $pwd 
     * @return uid
     */
    static public function initSupperUser($uname, $pwd)
    {
        $user = new User;
        $userInfo = $user->getUserWithRole('uname=:name',array(':name'=>$uname));
        if(empty($userInfo)) {
            // make user
            $user->uname = $uname;
            $user->email = '';
            $user->pwd = $pwd;
            $user->rid = 0;
            $user->save();

            // make role
            $role = new Role;
            $rname = 'superman';
            $roleInfo = $role->find('rname=:name',array(':name'=>$rname));
            if(empty($roleInfo)) {
                $params = array(
                    'name' => $rname,
                    'actions' => array(),
                );
                $action = new Action;
                $actionList = $action->findAll();
                foreach($actionList as $k=>$v) {
                    $params['actions'][] = $v['aid'];
                }
                $role->saveRole($params);
            }
            // save rid
            $roleInfo = $role->find('rname=:name',array(':name'=>$rname));
            $user->rid = $roleInfo['rid'];
            $user->save();
        }
        return true;
    }
}



