<?php

class TeacherController extends Controller
{
    //public $layout = '/layouts/frame_with_leftnav';
    
	static $msgArray = array(0=>'成功',
							-1=>'参数错误');
	
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
    	//echo "hello,world";exit;
    	$courseClass = CourseClass::model()->findAll();
    	$this->render('createcourse' , array('couseClass' => $courseClass));
    }
    
    public function actionSaveCourseclass()
    {
    	//echo "fuck,world";exit;
    	$name = isset($_REQUEST['name']) ? trim($_REQUEST['name']) : '';
    	//echo $name;exit;
    	if (empty($name))
    	{
    		$this->jsonResult(-1);
    	}
    	
    	
    	$courseClass = new CourseClass();
    	$courseClass->name = $name;
    	
    	$courseClass->save();
    	$this->jsonResult(0);
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
    	
    	$courseClass = isset($_POST['classid']) ? intval($_POST['classid']) : 0;
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
    	$newCourse->creator = $this->userid;
    	
    	$newCourse->save();
    	//$courseClass = CourseClass::model()->findAll();
    	$this->render('createcoursesuc', '创建成功');
    }
    
    //课程列表页面
    public function actionCourseList()
    {
    	$course = new Course();
    	$courseList = $course->findAll('creator=:creator' , array(':creator' => $this->userid));
    	
    	//$assistCourseList = 
    	$this->render('course_list', array('courseList' => $courseList));
    	
    	//$this->render('course_list');
    }
    
	//管理内容,添加编辑内容
    public function actionManageCourse()
    {
    	//获取当前老师所有的课程
    	$course = new Course();
    	$courseList = Course::model()->findAll('creator=:creator' , array(':creator' => $this->userid));
    	//var_dump($courseList);exit;
    	$currentCourse = array();
    	$currentCourseContent = array();
    	$courseId = isset($_REQUEST['courseid']) ? intval($_REQUEST['courseid']) : 0;
    	if (!empty($courseId))
    	{
    		$currentCourse = Course::model()->find('id=:id', array(':id'=>$courseId))->getAttributes();  //已选择课程
    		if (!empty($currentCourse)) // 当前课程名称
    		{
    			$courseContent = new CourseContent();
    			$currentCourseContent = $courseContent->findAll('courseid=:courseid',array(':courseid'=>$courseId));
    		}
    	}
    	
    	$this->render('course_content', array('currentCourse' => $currentCourse,
    										'currentCourseContent' => $currentCourseContent,
    										'courseList' => $courseList));
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
    
	//添加内容页面
    public function actionAddContent()
    {
    	/*$courseId = isset($_REQUEST['courseid']) ? intval($_REQUEST['courseid']) : 0;
    	if (empty($courseId))
    	{
    		$this->render('error' , '课程id必须');
    	}
    	
    	$currentObject = Course::model()->find('id=:id', array(':id'=>$courseId));
    	if (empty($currentObject))
    	{
    		$this->render('error' , '课程信息不存在');
    	}
    	
    	$currentCourse = $currentObject->getAttributes();  //已选择课程
   		
    	$this->render('neir_bianh', array('currentCourse' => $currentCourse, 
    										'courseId' => $courseId));*/
    	$this->render('neir_bianh');
    }
    
    //保存内容
    public function actionSaveContent()
    {
    	$title = isset($_REQUEST['title']) ? intval($_REQUEST['title']) : 0;
    	$courseId = isset($_REQUEST['courseid']) ? intval($_REQUEST['courseid']) : 0;
    	
    }
    
    
    public function jsonResult($retCode = 0, $info = array())
    {
    	$msgArray = 
    	$result = array('retCode' => $retCode,
    					'msg' => self::$msgArray[$retCode],
    					'info' => $info);
    	
    	echo json_encode($result);
    	exit;
    }
}
