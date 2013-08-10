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
    	//$this->render('createcoursesuc', '创建成功');
    	$this->redirect('/teacher/courselist');
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
        //echo "<pre>";var_dump($_REQUEST,$_FILES);exit;
        $course = new Course;
        $courseList = $course->findAll('creator=:creator' , array(':creator' => $this->userid));
        if(isset($_REQUEST['sub'])) {
            $group = new Group;
            $group->name = $_REQUEST['name'];
            $group->creator = $this->userid;
            $group->description = $_REQUEST['description'];
            $group->courseid = $_REQUEST['courseid'];
            $group->jointype = $_REQUEST['jointype'];
            $group->save();
            if($_FILES['file']['error']==0) {
                $imgpath = Yii::app()->params['img_upload_path'];
                preg_match('|^image/(.*)|',$_FILES['file']['type'],$match);
                $filetype = $match[1];
                $filepath = $imgpath.'grouplogo'.$group->id.'.'.$filetype;
                if(file_exists($filepath)) {
                    unlink($filepath);
                }
                move_uploaded_file($_FILES['file']['tmp_name'],$filepath);
            }
        }
        $this->render('group_edit',array('course_list'=>$courseList));
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
    	$courseId = isset($_REQUEST['courseid']) ? intval($_REQUEST['courseid']) : 0;
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
   		$chapterId = isset($_REQUEST['chapterid']) ? intval($_REQUEST['chapterid']) : 0;
   		$courseContent = array();
   		$homework = array();
   		if ($chapterId)
   		{
   			//拉取该章内容
   			$courseContent =  CourseContent::model()->findByPk($chapterId);
   			if (empty($courseContent))
    		{
    			$this->jsonResult(-1);
    		}
    		$courseContent = $courseContent->getAttributes();
    		
    		//拉取该章习题
    		$homework = Homework::model()->findAll('chapterid = :chapterid', 
    											array(':chapterid' => $chapterId));
    		//var_dump($homework);	exit;								
			foreach ($homework as $key => &$value)
			{
				if ($value['type'] == 1 || $value['type'] == 2)
				{
					$value['option'] = explode(',||' , $value['option']);
				}
			}
			//var_dump($homework);	exit;	    											
   		}
   		
   		
    	$this->render('neir_bianh', array('currentCourse' => $currentCourse, 
    										'courseId' => $courseId,
    										'chapterId' => $chapterId,
    										'courseContent' => $courseContent,
    										'homework' => $homework));
    	//$this->render('neir_bianh');
    }
    
    //保存内容
    public function actionSaveContent()
    {
    	
    	$title = isset($_REQUEST['title']) ? trim($_REQUEST['title']) : '';
    	$courseId = isset($_REQUEST['courseid']) ? intval($_REQUEST['courseid']) : 0;
    	
    	$content = isset($_REQUEST['content']) ? trim($_REQUEST['content']) : 0;
    	
    	if (empty($title) || empty($courseId) || empty($content))
    	{
    		//$this->render('showmsg', '标题，课程id和内容不能为空');
    		$this->jsonResult(-1);
    	}
    	
    	$chapterId = isset($_REQUEST['chapterid']) ? trim($_REQUEST['chapterid']) : '';
    	if (empty($chapterId))
    	{
	    	//var_dump($title, $courseId, $content);
	    	$courseContent = new CourseContent();
	    	$courseContent->title = $title;
	    	$courseContent->courseid = $courseId;
	    	$courseContent->content = $content;
	    	$courseContent->save();
	    	$this->jsonResult(0, array('id'=>$courseContent->id));
    	}
    	else
    	{
    		$courseContent =  CourseContent::model()->findByPk($chapterId);
    		if (empty($courseContent))
    		{
    			$this->jsonResult(-1);
    		}
	    	$courseContent->title = $title;
	    	$courseContent->courseid = $courseId;
	    	$courseContent->content = $content;
	    	$courseContent->save();
	    	$this->jsonResult(0);
    	}
    }
    
    //添加习题
    public function actionSaveHomeWork()
    {
    	$title = isset($_REQUEST['title']) ? trim($_REQUEST['title']) : '';
    	$chapterid = isset($_REQUEST['chapterid']) ? intval($_REQUEST['chapterid']) : 0;
    	
    	$type = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 0;
    	$option = isset($_REQUEST['option']) ? trim($_REQUEST['option']) : '';
    	
    	$homeworkid = isset($_REQUEST['homeworkid']) ? intval($_REQUEST['homeworkid']) : 0;
    	
    	if (empty($title) || empty($chapterid) || empty($type))
    	{
    		//$this->render('showmsg', '标题，课程id和内容不能为空');
    		$this->jsonResult(-1);
    	}
    	
    	if (($type == 1 || $type == 2) && empty($option))
    	{
    		$this->jsonResult(-1);
    	}
   		
    	if (empty($homeworkid))
    	{
	    	//var_dump($title, $courseId, $content);
	    	$homework = new Homework();
	    	$homework->title = $title;
	    	$homework->chapterid = $chapterid;
	    	$homework->type = $type;
	    	$homework->option = $option;
	    	$homework->save();
	    	$this->jsonResult(0, array('id'=>$homework->id));
    	}
    	else
    	{
    		
    		$homework =  Homework::model()->findByPk($homeworkid);
    		if (empty($homework))
    		{
    			$this->jsonResult(-1);
    		}
	    	$homework->title = $title;
	    	$homework->chapterid = $chapterid;
	    	$homework->type = $type;
	    	$homework->option = $option;
	    	$homework->save();
	    	
	    	$this->jsonResult(0);
	    	//$this->jsonResult(0, array('id'=>$homework->id));
    	}
    	
    }
    
    public function actionGetHomeWork()
    {
    	$homeworkid = isset($_REQUEST['homeworkid']) ? intval($_REQUEST['homeworkid']) : 0;
    	if (empty($homeworkid)) 
    	{
    		$this->jsonResult(-1);
    	}
    	
    	$homework =  Homework::model()->findByPk($homeworkid);
   		if (empty($homework))
   		{
   			$this->jsonResult(-1);
   		}
   		$homework = $homework->getAttributes();
   		$homework['option'] = explode(',||' , $homework['option']);
   		$this->jsonResult(0, $homework);
    }
    
	public function actionDeleteHomeWork()
    {
    	$homeworkid = isset($_REQUEST['homeworkid']) ? intval($_REQUEST['homeworkid']) : 0;
    	if (empty($homeworkid)) 
    	{
    		$this->jsonResult(-1);
    	}
    	
    	$homework =  Homework::model()->findByPk($homeworkid);
   		if (empty($homework))
   		{
   			$this->jsonResult(-1);
   		}
   		
   		$homework->delete();
   		$this->jsonResult(0);
    }
    
    public function jsonResult($retCode = 0, $info = array())
    {
    	$result = array('retCode' => $retCode,
    					'msg' => self::$msgArray[$retCode],
    					'info' => $info);
    	
    	echo json_encode($result);
    	exit;
    }
}
