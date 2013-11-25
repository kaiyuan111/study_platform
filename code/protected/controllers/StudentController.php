<?php

class StudentController extends Controller
{
    //public $layout = '/layouts/frame_with_leftnav';
    static $msgArray = array(0=>'成功',
							-1=>'参数错误',
							-2=>'操作失败');

	static $optionMap = array(0 => 'A', 1 => 'B', 2 => 'C', 3 => 'D');							
    public $layout = 'application.modules.main.views.layouts.frame_with_leftnav';

    //课程列表
    public function actionCourseList()
    {
    	$course = new Course();
    	
    	$courseList = $course->courseListByUid($this->userid);
    	
    	//$courseList = $course->findAll('creator=:creator' , array(':creator' => $this->userid));
        $this->render('/student/my4d' , array('courseList' => $courseList));
    }

    //作业列表
    public function actionHomeWorkList()
    {
    	//学生上的课
    	$course = new Course();
    	$courseList = $course->courseListByUid($this->userid);
    	
    	$chapterId = isset($_REQUEST['chapterid']) ? intval($_REQUEST['chapterid']) : 0;
    	$homework = array();
    	$answer = array();
    	
    	if (!empty($chapterId)) 
    	{
    		//获取这章的作业
			$homeworkT = Homework::model()->findAll('chapterid=:chapterid', array(':chapterid'=>$chapterId));
	    	//var_dump($homework);exit;
	    	$homework = array();
	    	$homeworkIds = array();
	    	foreach ($homeworkT as $key => $value)
			{
				if ($value['type'] == 1 || $value['type'] == 2)
				{
					$value['option'] = explode(',||' , $value['option']);
				}
				$homework[$value['id']] = $value;
			}
			
			//获取这章的答案
	    	$answer = array();
			$answerModel = new Answer();
			$answerT = $answerModel->getHomeworkAnswerByChapterid($chapterId, $this->userid);
			
			foreach ($answerT as $key => $value)
			{
				$answer[$value['homeworkid']] = $value;
			}
    	}
    	$this->render('homework_list' , 
    				array('courseList' => $courseList,
    					'homework' => $homework,
    					'answer' => $answer,
    					'chapterId' => $chapterId,
    					'optionMap' => self::$optionMap));
    }
    
    //目录列表
    public function actionCatalogueList()
    {
    	$courseid = isset($_REQUEST['courseid']) ? intval($_REQUEST['courseid']) : 0;
    	if (empty($courseid))
    	{
    		//$this->render('error', '课程id不能为空');
    		$this->render('/site/error',array('errortxt'=>'课程不能为空'));
    		exit();
    	}
    	
    	$course = new Course();
    	//$courseContent = Course::model()->find('id=:courseid',array(':courseid' => $courseid));
    	$courseCatalogue = $course->courseCatalogueByCid($courseid);
    	
    	$courseCreator = $course->courseCreatorByCid($courseid);
    	if (empty($courseCreator))
    	{
    		//$this->render('error', '创建者为空，出错');
    		$this->render('/site/error',array('errortxt'=>'课程创建者不能为空'));
    		exit();
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
    		//$this->render('error', '章节id不能为空');
    		$this->render('/site/error',array('errortxt'=>'章节id不能为空'));
    		exit();
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
    	//var_dump($homework);exit;
    	foreach ($homework as $key => &$value)
		{
			if ($value['type'] == 1 || $value['type'] == 2)
			{
				$value['option'] = explode(',||' , $value['option']);
			}
		}
    	
		unset($value);
		
		//获取该用户提交的答案，如果有提交的话
		$answer = array();
		$answerModel = new Answer();
		$answerT = $answerModel->getHomeworkAnswerByChapterid($chapterid, $this->userid);
		
		foreach ($answerT as $key => $value)
		{
			$answer[$value['homeworkid']] = $value;
		}
		
		//下一页
		$nextChapter = CourseContent::model()->find('id > :chapterid and courseid = :courseid', 
													array(':chapterid'=>$chapterid, 
													'courseid' => $courseId));
		//上一页
		$preChapter = CourseContent::model()->find('id < :chapterid and courseid = :courseid order by id desc', 
													array(':chapterid'=>$chapterid,
														'courseid' => $courseId));
													
		//CourseContent::model()->findByPk($chapterid);
//var_dump($this->userInfo);exit;
    	$this->render('learn_detail', array('courseContent' => $courseContent,
    										'courseCreator' => $courseCreator,
    										'studyDetail' => $studyDetail,
    										'annotationList' => $annotationList,
    										'excerptList' => $excerptList,
    										'homework' => $homework,
    										'nextChapter' => $nextChapter,
    										'preChapter' => $preChapter,
											'answer' => $answer,
											'userInfo' => $this->userInfo,));
    	
    	$this->layout = 'application.modules.main.views.layouts.frame_with_leftnav';
    }
    
    //添加摘抄，添加批注，添加讨论页面，根据type参数来区分，1摘抄，2批注，3讨论
    public function actionStudyDetailPage()
    {
    	$this->layout = 'application.modules.main.views.layouts.iframe';
    	//$this->layout = 'application.modules.main.views.layouts.frame_without_leftnav';
    	$type = isset($_REQUEST['type']) ? intval($_REQUEST['type']) : 0;
    	if ($type != 1 && $type != 2 && $type != 3)
    	{
    		//$this->render('error', '添加类型参数错误');
    		$this->render('/site/error',array('errortxt'=>'添加类型参数错误'));
    		exit();
    	}
    	
    	$chapterid = isset($_REQUEST['chapterid']) ? intval($_REQUEST['chapterid']) : 0;
    	if (empty($chapterid))
    	{
    		//$this->render('error', '章节id错误');
    		$this->render('/site/error',array('errortxt'=>'章节id错误'));
    		exit();
    	}
    	
    	$groupMemberInfo = array();
    	if ($type == 3)
    	{
    		//获取用户所在的组的成员（这门课的）
    		$courseContent = new CourseContent();
    		$courseId = $courseContent->getCourseIdByChapterId($chapterid);
    		//echo $chapterid;exit;
    		//获取小组id
    		$groupMem = new GroupMember();
    		$groupId = $groupMem->getGroupIdByCourseId($courseId, $this->userid);
    		//echo $groupId;exit;
    		
    		//根据成员id获取成员的信息
    	
    		$groupMemberInfo = $groupMem->getGroupMemberInfoByGroupId($groupId);
    		//var_dump($groupMemberInfo);exit;
    	}
    	
    	$this->render('addstudy_detail' , array('type' => $type, 'chapterid' => $chapterid,
    			'groupMemberInfo' => $groupMemberInfo));
    	$this->layout = 'application.modules.main.views.layouts.frame_with_leftnav';
    }
    
    //保存添加摘抄，批注，讨论等内容
    public function actionAddStudyDetail()
    {
    	$type = isset($_REQUEST['type']) ? intval($_REQUEST['type']) : 0;
    	if ($type != 1 && $type != 2 && $type != 3)
    	{
    		//$this->render('error', '添加类型参数错误');
    		$this->render('/site/error',array('errortxt'=>'添加类型参数错误'));
    		exit();
    	}
    	
    	$chapterid = isset($_REQUEST['chapterid']) ? intval($_REQUEST['chapterid']) : 0;
    	if (empty($chapterid))
    	{
    		//$this->render('error', '章节id错误');
    		$this->render('/site/error',array('errortxt'=>'章节id错误'));
    		exit();
    	}
    	
    	if ($type == 1 || $type ==2) //添加批注和摘抄
    	{
    		$content = isset($_REQUEST['content']) ? trim($_REQUEST['content']) : '';
    		if (empty($content))
    		{
    			//$this->render('error', '内容不能为空');
    			$this->render('/site/error',array('errortxt'=>'内容不能为空'));
    			exit();
    		}
    		
    		$studyDetail = new StudyDetail();
    		$studyDetail->type = $type;
    		$studyDetail->content = $content;
    		$studyDetail->uid = $this->userid;
    		$studyDetail->chapterid = $chapterid;
    		$studyDetail->save();
    		
    		$this->layout = 'application.modules.main.views.layouts.frame_without_leftnav';
            $this->render('addstudy_detail' , array(
                'finish' => 1,
                'type' => $type, 
                'chapterid' => $chapterid)
            );
    		$this->layout = 'application.modules.main.views.layouts.frame_with_leftnav';
    	}
    	else //添加讨论
    	{
    		$content = isset($_REQUEST['content']) ? trim($_REQUEST['content']) : '';
    		if (empty($content))
    		{
    			$this->render('/site/error',array('errortxt'=>'内容不能为空'));
    			exit();
    		}
    		
    		$studyTitle = isset($_REQUEST['title']) ? trim($_REQUEST['title']) : '';
    		$studyDetail = new StudyDiscuss();
    		$studyDetail->content = $content;
    		$studyDetail->uid = $this->userid;
    		$studyDetail->chapterid = $chapterid;
    		$studyDetail->title = $studyTitle;
    		$studyDetail->save();
    		
    		$member = isset($_REQUEST['discussmember']) ? ($_REQUEST['discussmember']) : '';
			$member[] = $this->userid;
    		
    		if (!empty($member))
    		{
    			foreach ($member as $eachUid)
    			{
    				$discussMember = new DiscussMember();
    				$discussMember->discussid = $studyDetail->id;
    				$discussMember->uid = $eachUid;
    				$discussMember->save();
    			}

				// 消息 邮件
				$mess = new MessDiscussCreate;
				$mess->send($studyDetail,$member);
    		}
    		
    		$muser = new MUser();
    		$memberInfo = $muser->getUserInfoByUids($member);
    		$this->layout = 'application.modules.main.views.layouts.frame_without_leftnav';
            $this->render('addstudy_detail' , array(
                'finish' => 1,
                'type' => $type, 
                'chapterid' => $chapterid,
                'groupMemberInfo' => $memberInfo)
            );
    		$this->layout = 'application.modules.main.views.layouts.frame_with_leftnav';
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
    	//创建的讨论
    	$discuss = new StudyDiscuss();
    	$originalDiscuss = StudyDiscuss::model()->findAllBySql('select * from `m-discuss` where uid=:uid',
    	array(':uid' => $this->userid));
    	
    	//被邀请加入的讨论
    	$joindDisIdsT = DiscussMember::model()->findAllBySql('select discussid from `m-discussmember`
    		where uid=:uid' , array(':uid' => $this->userid));
    	//var_dump($joindDisIdsT);exit;
    	$joindDisIds = array();
    	foreach ($joindDisIdsT as $key => $value)
    	{
    		$joindDisIds[] = $value['discussid'];
    	}
    	//var_dump($joindDisIds);exit;
    	$joinDiscuss = array();
    	$joindDisIdsStr = implode(',',$joindDisIds);
    	//var_dump($joindDisIdsStr);exit;
    	if (!empty($joindDisIdsStr))
    	{
    		$joinDiscuss = StudyDiscuss::model()->findAllBySql("select * from `m-discuss` where id in ($joindDisIdsStr)");
    	}
    	//var_dump($joinDiscuss);exit;
    	$this->render('discuss_list', array('originalDis' => $originalDiscuss,
    							'joindDis' => $joinDiscuss));
    }


    // 邀请老师讨论

    /**
     * actionInviteTeacherForDiscuss 
     *
     * 邀请老师参与讨论
     * 
     * @return void
     */
    public function actionInviteTeacherForDiscuss()
    {
		/*
        $ret = StudyDiscuss::model()->notifyTeacherToDiscuss($this->userid,$_REQUEST['courseid'],$_REQUEST['groupid'],$_REQUEST['discussid']);
		 */
		$mess = new MessDiscussInviteTeacher;
		$ret = $mess->send($this->userid,$_REQUEST['courseid'],$_REQUEST['groupid'],$_REQUEST['discussid']);
        if($ret) 
        {
        	echo "邀请成功";
        }
        else 
        {
        	echo "邀请失败";
        }
    }

    //讨论详情页
    public function actionDiscussDetail()
    {
    	//echo "fuck,world";exit;
    	$discussId = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
    	
    	//获取讨论的主题等信息
    	$discussInfo = StudyDiscuss::model()->findByPk($discussId);
    	if (empty($discussInfo))
    	{
    		//$this->render('error', '讨论信息不能为空');
    		$this->render('/site/error',array('errortxt'=>'讨论信息不能为空'));
    		exit();
    	}

        // 获取章节信息
        $chapter = CourseContent::model()->find('id=:id',array(':id'=>$discussInfo['chapterid']));
		//echo "<pre>";var_dump($discussInfo->getAttributes());exit;
        // 获取当前讨论组的所属小组
        $temp = GroupMember::model()->find('uid=:id',array(':id'=>$discussInfo['uid']));
        if(empty($temp)) {
            $this->render('/site/error',array('errortxt'=>'获取小组信息失败'));
            exit;
        }
        $groupid = $temp['groupid'];
    	
    	//获取讨论的参与人员信息
    	$discussMember = new DiscussMember();
    	$discussMemberInfo = $discussMember->getDisMemberInfoByDiscussId($discussId);
    	
    	//获取讨论的评论
    	$discussReply = DiscussReply::model()->findAllBySql("select * from `m-discussreply` where discussid={$discussId}");
    	$uidArray = array();
    	foreach ($discussReply as $key => $value)
    	{
    		//echo $value['time'];exit;
    		$uidArray[] = $value['uid'];
    		//var_dump($value['time']);exit;
    	}
    	
    	//var_dump($discussReply);exit;
    	$replyUserInfoT = array();
    	if (!empty($uidArray))
    	{
    		$muser = new MUser();
    		$replyUserInfoT = $muser->getUserInfoByUids($uidArray);
    	}
    	
    	$replyUserInfo = array();
    	foreach ($replyUserInfoT as $key=> $value)
    	{
    		$replyUserInfo[$value['uid']] = $value;
    	}
    	
    	$this->layout = 'application.modules.main.views.layouts.frame_without_leftnav';
    		
    	$this->render('discuss_detail', array('discussInfo' => $discussInfo,
    						'discussMemberInfo' => $discussMemberInfo,
    						'discussReply' => $discussReply,
    						'chapter' => $chapter,
    						'groupid' => $groupid,
    						'replyUserInfo' => $replyUserInfo,));
    	
    	$this->layout = 'application.modules.main.views.layouts.frame_with_leftnav';
    }
    
    //添加讨论的回复
    public function actionAddDiscussReply()
    {
    	$discussId = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
    	$content = isset($_REQUEST['content']) ? trim($_REQUEST['content']) : '';
    	//echo $content;exit;
   		if (empty($content))
   		{
   			$this->jsonResult(-1);
   		}
   		//echo "fuck,world";exit;
   		$discussReply = new DiscussReply();
   		$discussReply->uid = $this->userid;
   		$discussReply->time = time();
   		$discussReply->comment = $content;
   		$discussReply->discussid = $discussId;
   		$discussReply->save();

		$mess = new MessDiscussReply;
		$mess->send($this->userid,$discussId,$content);
   		
   		$this->jsonResult(0);
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
    										'excerptList' => $excerptList));
    	//$this->render('excerpt_list');
    }
    
    //小组信息
	public function actionGroupDetail()
    {
        if(!isset($_REQUEST['id'])) $this->render('/site/error');
        $groupInfo = Group::model()->findByPk($_REQUEST['id']);
        $leaderInfo = User::model()->findByPk($groupInfo['leaderid']);
        $teacher = Course::model()->courseCreatorByCid($groupInfo['courseid']);
        $assists = MUser::model()->getAssistantByGroup($groupInfo['id'],$teacher['uid']);
        $groupUsers = Group::model()->getStudentWithinGroup($groupInfo['id']);

        //var_dump($leaderInfo->getAttributes());exit;
        $this->render('group_detail',array(
            'groupinfo'=>$groupInfo,
            'leaderinfo'=>$leaderInfo,
            'assists'=>$assists,
            'groupusers'=>$groupUsers,
        ));
    }
    
	//小组列表
	public function actionGroupList()
    {
    	$group = new Group();
    	$groupList = $group->getGroupListByUid($this->userid);
    	$this->render('group_list',array('groupList' => $groupList));
    }
    
	//消息列表
	public function actionMessageList()
    {
		$mess = new MessCourseEdit;
		$infos = $mess->findall($this->userid);
        $this->render('/teacher/message_list', array('infos'=>$infos));
    }
    
	public function jsonResult($retCode = 0, $info = array())
    {
        $result = array('retCode' => $retCode,
            'msg' => self::$msgArray[$retCode],
            'info' => $info);

        echo json_encode($result);
        exit;
    }
    
    public function makeReadTime($timeStamp)
    {
    	return date('Y-m-d G:i:s',$timeStamp);
    	//return strftime('%g-%m-%d %H:%M', $timeStamp);
    }
    
    public function actionSaveAnswer()
    {
    	//$courseId = isset($_REQUEST['courseid']) ? intval($_REQUEST['courseid']) : 0;
    	//取出习题个数，对每个习题进行操作
    	$homeworkNum = isset($_REQUEST['homeworknum']) ? intval($_REQUEST['homeworknum']) : 0;
    	
    	for ($i = 1; $i <= $homeworkNum; $i++)
    	{
    		$typeVar = 'type_' . $i;
    		$type = isset($_REQUEST[$typeVar]) ? intval($_REQUEST[$typeVar]) : 0;
    		
    		$homeworkVar = 'homeworkid_' . $i;
    		//var_dump($homeworkVar);
    		$homeworkId = isset($_REQUEST[$homeworkVar]) ? intval($_REQUEST[$homeworkVar]) : 0;
    		//var_dump($homeworkId);
    		//echo $homeworkId;
    		if (empty($homeworkId))
    		{
    			continue;
    		}
    		
    		$answerVar = 'answer_' . $i;
    		$answer = isset($_REQUEST[$answerVar]) ? trim($_REQUEST[$answerVar]) : 0;
    		//var_dump($answer);
    		//echo $answer;
    		if (empty($answer))
    		{
    			continue;
    		}
    		
    		
    		//$answerModel = new Answer();
    		$answerModel = Answer::model()->findBySql("select * from `m-answer` where homeworkid = {$homeworkId} and uid = {$this->userid}" );
    		if (empty($answerModel))
    		{
    			//echo "hello,world";
    			$answerModel = new Answer();
    			$answerModel->homeworkid = $homeworkId;
    			$answerModel->uid = $this->userid;
    		}
    		
    		//echo $answerModel['answer'];
    		$answerModel->answer = $answer;
    		$answerModel->save();
    	}
    	
    	$this->jsonResult(0);
    }
}
