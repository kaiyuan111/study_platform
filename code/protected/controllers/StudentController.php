<?php

class StudentController extends Controller
{
    //public $layout = '/layouts/frame_with_leftnav';
    public $layout = 'application.modules.main.views.layouts.frame_with_leftnav';

    //课程列表
    public function actionCourseList()
    {
    	$course = new Course();
    	
    	$courseList = $course->courseListByUid($this->userid);
    	
    	//$courseList = $course->findAll('creator=:creator' , array(':creator' => $this->userid));
        $this->render('/student/my4d' , array('courseList' => $courseList));
    }

    //目录列表
    public function actionCatalogueList()
    {
    	$courseid = isset($_REQUEST['courseid']) ? intval($_REQUEST['courseid']) : 0;
    	if (empty($courseid))
    	{
    		$this->render('error', '课程id不能为空');
    	}
    	
    	$course = new Course();
    	//$courseContent = Course::model()->find('id=:courseid',array(':courseid' => $courseid));
    	$courseCatalogue = $course->courseCatalogueByCid($courseid);
    	
    	$courseCreator = $course->courseCreatorByCid($courseid);
    	if (empty($courseCreator))
    	{
    		$this->render('error', '创建者为空，出错');
    	}
    	
    	$courseInfo = Course::model()->findByPk($courseid);
    	
    	//var_dump($courseCatalogue,$courseCreator,$courseInfo);exit;
    	$this->render('my4d_course', array('courseCatalogue' => $courseCatalogue,
    										'courseCreator' => $courseCreator,
    										'courseInfo' => $courseInfo));
    }
    
    //学习页面
    public function actionLearnDetail()
    {
    	$this->layout = 'application.modules.main.views.layouts.frame_without_leftnav';
    	$chapterid = isset($_REQUEST['chapterid']) ? intval($_REQUEST['chapterid']) : 0;
    	if (empty($chapterid)) 
    	{
    		$this->render('error', '章节id不能为空');
    	}
    	
    	$courseContent = new CourseContent();
    	$courseContent = CourseContent::model()->findByPk($chapterid);
    	
    	$courseId = $courseContent['courseid'];
    	
    	$course = new Course();
    	$courseCreator = $course->courseCreatorByCid($courseId);
    	
    	$studyDetail = new StudyDetail();
    	
    	//注释列表
    	$annotationList = $studyDetail->findAll('uid=:uid and type = 2 and chapterid = :chapterid', 
    										array(':uid' => $this->userid, 'chapterid' => $chapterid));
    	//摘抄列表
    	$excerptList = $studyDetail->findAll('uid=:uid and type = 1 and chapterid = :chapterid', 
    										array(':uid' => $this->userid, 'chapterid' => $chapterid));
    	
    	$homework = Homework::model()->findAll('chapterid=:chapterid', array(':chapterid'=>$chapterid));
    	
    	foreach ($homework as $key => &$value)
		{
			if ($value['type'] == 1 || $value['type'] == 2)
			{
				$value['option'] = explode(',||' , $value['option']);
			}
		}
    	
		//下一页
		$nextChapter = CourseContent::model()->find('id > :chapterid', 
													array(':chapterid'=>$chapterid));
		//上一页
		$preChapter = CourseContent::model()->find('id < :chapterid', 
													array(':chapterid'=>$chapterid));
													
		CourseContent::model()->findByPk($chapterid);
    	$this->render('learn_detail', array('courseContent' => $courseContent,
    										'courseCreator' => $courseCreator,
    										'studyDetail' => $studyDetail,
    										'annotationList' => $annotationList,
    										'excerptList' => $excerptList,
    										'homework' => $homework,
    										'nextChapter' => $nextChapter,
    										'preChapter' => $preChapter,));
    	
    	$this->layout = 'application.modules.main.views.layouts.frame_with_leftnav';
    }
    
    //添加摘抄，添加批注，添加讨论页面，根据type参数来区分，1摘抄，2批注，3讨论
    public function actionStudyDetailPage()
    {
    	$this->layout = 'application.modules.main.views.layouts.frame_without_leftnav';
    	$type = isset($_REQUEST['type']) ? intval($_REQUEST['type']) : 0;
    	if ($type != 1 && $type != 2 && $type != 3)
    	{
    		$this->render('error', '添加类型参数错误');
    	}
    	
    	$chapterid = isset($_REQUEST['chapterid']) ? intval($_REQUEST['chapterid']) : 0;
    	if (empty($chapterid))
    	{
    		$this->render('error', '章节id错误');
    	}
    	
    	if ($type == 3)
    	{
    		//获取用户所在的组的成员（这门课的）
    		//$groupMember = 
    	}
    	
    	$this->render('addstudy_detail' , array('type' => $type, 'chapterid' => $chapterid));
    	$this->layout = 'application.modules.main.views.layouts.frame_with_leftnav';
    }
    
    //保存添加摘抄，批注，讨论等内容
    public function actionAddStudyDetail()
    {
    	$type = isset($_REQUEST['type']) ? intval($_REQUEST['type']) : 0;
    	if ($type != 1 && $type != 2 && $type != 3)
    	{
    		$this->render('error', '添加类型参数错误');
    	}
    	
    	$chapterid = isset($_REQUEST['chapterid']) ? intval($_REQUEST['chapterid']) : 0;
    	if (empty($chapterid))
    	{
    		$this->render('error', '章节id错误');
    	}
    	
    	if ($type == 1 || $type ==2) //添加批注和摘抄
    	{
    		$content = isset($_REQUEST['content']) ? trim($_REQUEST['content']) : '';
    		if (empty($content))
    		{
    			$this->render('error', '内容不能为空');
    		}
    		
    		$studyDetail = new StudyDetail();
    		$studyDetail->type = $type;
    		$studyDetail->content = $content;
    		$studyDetail->uid = $this->userid;
    		$studyDetail->chapterid = $chapterid;
    		$studyDetail->save();
    		
    		$this->layout = 'application.modules.main.views.layouts.frame_without_leftnav';
    		$this->render('addstudy_detail' , array('type' => $type, 'chapterid' => $chapterid));
    		$this->layout = 'application.modules.main.views.layouts.frame_with_leftnav';
    	}
    	else //添加讨论
    	{
    		
    	}
    	
    }
    
	//批注列表
    public function actionAnnotationList()
    {
    	$course = new Course();
    	
    	$courseList = $course->courseListByUid($this->userid); //课程列表
    	
    	$courseId = isset($_REQUEST['courseid']) ? intval($_REQUEST['courseid']) : 0;
    	
    	//$courseCatalogue = $course->courseCatalogueByCid($courseid);
    	
    	$annotationList = array();
    	if (!empty($courseId))
    	{
    		$studyDetail = new StudyDetail();
    		$annotationListT = $studyDetail->getStudyDetailByCid($courseId);
    		//var_dump($annotationListT);exit;
    		foreach ($annotationListT as $key => $value)
    		{
    			$annotationList[$value['id']]['title'] = $value['title'];
    			$annotationList[$value['id']]['content'][] = $value['content'];
    		}
    		//var_dump($annotationList);exit;
    	}
    	
    	//foreach ()
    	$this->render('annotation_list', array('courseId' => $courseId, 
    										'courseList' => $courseList,	
    										'annotationList' => $annotationList));
    }
    
	//讨论列表
	
    public function actionDiscussList()
    {
    	$this->render('discuss_list');
    }
    
    //摘抄列表
	public function actionExcerptList()
    {
    	$course = new Course();
    	
    	$courseList = $course->courseListByUid($this->userid); //课程列表
    	
    	$courseId = isset($_REQUEST['courseid']) ? intval($_REQUEST['courseid']) : 0;
    	
    	//$courseCatalogue = $course->courseCatalogueByCid($courseid);
    	
    	$excerptList = array();
    	if (!empty($courseId))
    	{
    		$studyDetail = new StudyDetail();
    		$excerptListT = $studyDetail->getStudyDetailByCid($courseId, 1);
    		//var_dump($annotationListT);exit;
    		foreach ($excerptListT as $key => $value)
    		{
    			$excerptList[$value['id']]['title'] = $value['title'];
    			$excerptList[$value['id']]['content'][] = $value['content'];
    		}
    		//var_dump($annotationList);exit;
    	}
    	
    	//foreach ()
    	$this->render('excerpt_list', array('courseId' => $courseId, 
    										'courseList' => $courseList,	
    										'annotationList' => $excerptList));
    	//$this->render('excerpt_list');
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
