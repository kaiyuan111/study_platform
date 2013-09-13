<?php

class ActionController extends Controller
{
    public $layout = '/layouts/frame_with_leftnav';

    public function actionIndex()
    {
        $this->redirect('/main/action/list');
    }

    public function actionList()
    {
        $action = new Action;
        $actionInfos = array();
        if(!empty($_REQUEST['name'])&&!empty($_REQUEST['query'])) {
            $actionInfos = $action->findAll('aname=:name',array(':name'=>$_REQUEST['name']));
        } else {
            $actionInfos = $action->findAll();
        }

        $this->render('list',array('entitys'=>$actionInfos));
    }


    public function actionEdit()
    {
        $action = new Action;
        $actionInfo = array();
        $label = '';
        foreach($_REQUEST as $k=>$v) {
            $_REQUEST[$k] = trim($v);
        }

        if(!empty($_REQUEST['logopath'])) {
            list($logo,$logoclick) = explode('&',$_REQUEST['logopath']);
        } else {
            $logo = $logoclick = '';
        }
        $ismenu = isset($_REQUEST['is_menu'])&&$_REQUEST['is_menu']=='on';
        // 所有logopath
        $logopaths = Action::model()->getLogoPaths();
        //echo "<pre>"; var_dump($logopaths); exit;
        if(isset($_REQUEST['id'])&&$_REQUEST['id']!='') {
            // 修改
            $logopaths = Action::model()->getLogoPaths($_REQUEST['id']);
            $actionInfo = $action->find('aid=:id',array(':id'=>$_REQUEST['id']));
            if(!empty($_REQUEST['modify'])) {
                $action->updateByPk($_REQUEST['id'],array(
                    'aname'=>$_REQUEST['name'],
                    'route'=>$_REQUEST['route'],
                    'is_menu'=>$ismenu,
                    'logo'=>$logo,
                    'logo_click'=>$logoclick,
                ));
                $this->redirect('/main/action/list');
            }
        } elseif(!empty($_REQUEST['name'])) {
            // 新增
            $actionInfo = $action->find('aname=:name',array(':name'=>$_REQUEST['name']));
            if(!empty($actionInfo)) {
                $this->render('edit',array(
                    'entity'=>$actionInfo[0],
                    'label'=>'has_action',
                    'logopaths'=>$logopaths,
                ));
                exit;
            }
            if(!empty($_REQUEST['modify'])) {
                $action->aname = $_REQUEST['name'];
                $action->route = $_REQUEST['route'];
                $action->is_menu = $ismenu;
                $action->logo = $logo;
                $action->logo_click = $logoclick;
                $action->save();
                $this->redirect('/main/action/list');
            }
        }

        $this->render('edit',array(
            'entity'=>$actionInfo,
            'label'=>$label,
            'logopaths'=>$logopaths,
        ));
    }
}
