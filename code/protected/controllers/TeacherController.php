<?php

class TeacherController extends Controller
{
    //public $layout = '/layouts/frame_with_leftnav';
    public $layout = 'application.modules.main.views.layouts.frame_with_leftnav';

    public function actionIndex()
    {
        $this->redirect('/main/teacher/courselist');
    }

	//public function action
    
    public function actionSaveGroup()
    {
        $usr = new User;
        $usrInfos = array();
        if(!empty($_REQUEST['name'])) {
            $usrInfos = $usr->getUserWithRole('uname=:name',array(':name'=>$_REQUEST['name']));
        } else {
            $usrInfos = $usr->getUserWithRole();
        }

        $groupName = trim($_POST['name']);
        $courseId = intval($_POST['courseid']);
        $desc = trim($_POST['desc']);
        
        if (empty($groupName) || empty($courseId) || empty($desc)) 
        {
        	$this->showMsg("信息填写错误");
        }
        
        $joinType = intval($_POST['jointype']);
        if ($joinType != 1 && $joinType != 2)
        {
        	$this->showMsg("加入方式错误");
        }
        
        $icon = isset($_POST['desc']) ? trim($_POST['desc']) : '';
        
        
        $group = new Group();
        $group->creator = $this->userid;
        $group->name = $groupName;
        $group->description = $desc;
        $group->courseid = $courseId;
        $group->icon = $icon;
        $group->jointype = $joinType;
        
        $group->save();
    }
	
    //创建课程页面
    public function actionCreateCourse()
    {
    	$courseClass = CourseClass::model()->findAll();
    	$this->render('createcourse' , array('couseClass' => $courseClass));
    }
    
    public function actionSaveCourse()
    {
    	$courseName = isset($_POST['name']) ? trim($_POST['name']) : '';
    	if (empty($courseName)) 
    	{
    		//$this->render('error', );
    		$nameError = '课程名称不能为空';
    		$this->render('createcourse', array('name' => $nameError));
    	}
    	
    	$courseClass = isset($_POST['classid']) ? intval($_POST['clasid']) : 0;
    	if (empty($courseClass)) 
    	{
    		//$this->render('error', );
    		$classError = '所属科目必选';
    		$this->render('createcourse', array('class' => $classError));
    	}
    	
    	$courseDesc = isset($_POST['desc']) ? intval($_POST['desc']) : 0;
    	if (empty($courseClass)) 
    	{
    		//$this->render('error', );
    		$descError = '课程描述必填';
    		$this->render('createcourse', array('desc' => $descError));
    	}
    	
    	$newCourse = new Course();
    	$newCourse->name = $courseName;
    	$newCourse->desc = $courseDesc;
    	$newCourse->classid = $courseClass;
    	$newCourse->createor = $this->userid;
    	
    	$newCourse->save();
    }
    
    //课程列表页面
    public function actionCourseList()
    {
    	$course = new Course();
    	//$courseList = $course->find('creator=:creator' , array(':creator' => $this->userid));
    	//$this->render('course_list', array('courseList' => $courseList));
    	$this->render('course_list');
    }
    
	//管理内容
    public function actionManageCourse()
    {
    	$this->render('course_content');
    }
    
	//创建编辑小组
    public function actionCreateGroup()
    {
    	$this->render('group_edit');
    }
    
	//小组人员管理
    public function actionManageGroup()
    {
    	$this->render('group_manage');
    }
    
	//查看讨论
    public function actionDiscussList()
    {
    	$this->render('discuss_list');
    }
    
	//查看消息
    public function actionMessageList()
    {
    	$this->render('message_list');
    }
    
//查看消息
    public function actionAddContent()
    {
    	$this->render('neir_bianh');
    }
}
