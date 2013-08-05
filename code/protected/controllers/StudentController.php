<?php

class StudentController extends Controller
{
    //public $layout = '/layouts/frame_with_leftnav';
    public $layout = 'application.modules.main.views.layouts.frame_with_leftnav';

    public function actionIndex()
    {
        $this->redirect('/student/courselist');
    }

	//批注列表
    public function actionAnnotationList()
    {
    	$this->render('annotation_list');
    }
    
	//讨论列表
    public function actionDiscussList()
    {
    	$this->render('discuss_list');
    }
    
    //摘抄列表
	public function actionExcerptList()
    {
    	$this->render('excerpt_list');
    }
    
    //小组信息
	public function actionGroupDetail()
    {
    	$this->render('group_detail');
    }
    
	//小组列表
	public function actionGroupList()
    {
    	$this->render('group_list');
    }
    
	//消息列表
	public function actionMessageList()
    {
    	$this->render('message_list');
    }
}
