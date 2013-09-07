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
        if ($roleInfo['rname'] == 'superman') //如果是管理员
        {
            $this->redirect('/main/user/list');
        }
        elseif ($roleInfo['rname'] == 'teacher')   //老师
        {
            $this->redirect('/teacher/courselist');  //暂时为新建小组
        }
        elseif ($roleInfo['rname'] == 'student')   //学生
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
