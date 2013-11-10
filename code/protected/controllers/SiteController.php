<?php

class SiteController extends Controller
{
    public $layout = '';//"application.modules.main.views.layouts.frame_without_leftnav";

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $userInfo = Login::getLoginInfo();
        $roleInfo = Role::model()->find('rid=:id',array(':id'=>$userInfo['rid']));
        $params = Yii::app()->getParams();
        $rid = $params['rid'];
        if ($roleInfo['rid'] == 1||$roleInfo['rid'] == $rid['admin']) //如果是管理员
        {
            $this->redirect('/main/user/list');
        }
        elseif ($roleInfo['rid'] == $rid['teacher'])   //老师
        {
            $this->redirect('/teacher/courselist');  
        }
        elseif ($roleInfo['rid'] == $rid['student'])   //学生
        {
            $this->redirect('/student/courselist');
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}
