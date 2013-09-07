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

    // 老师申请其他课程的编辑权限
    public function actionRequestEdit()
    {
        $courseId = !empty($_REQUEST['courseid']) ? $_REQUEST['courseid'] : "";
        $course = Course::model()->find('id=:id',array(':id'=>$courseId));
        if(!empty($course)) {
            $info = Info::model()->find('uid_from=:fid and content=:c and is_responce=0',
                array(
                    ':c'=>$courseId,
                    ':fid'=>$this->userid,
                )
            );
            if(empty($info)) {
                $info = new Info;
            }
            $info->type='request_edit_class';
            $info->title='申请编辑课程';
            $info->uid_from=$this->userid;
            $info->request_time=date("Y-m-d");
            $info->content=$courseId;
            $info->uid_to=$course['creator'];
            $info->save();
            echo "申请成功";
        } else {
            echo "申请错误";
        }
    }
    
    //课程列表页面
    public function actionCourseList()
    {
    	$course = new Course();
    	$courseList = $course->findAll('creator=:creator' , array(':creator' => $this->userid));
    	$otherCourseList = $course->findAll('creator!=:creator' , array(':creator' => $this->userid));
    	
    	//$assistCourseList = 
    	$this->render('course_list', array('courseList' => $courseList,'otherCourseList' => $otherCourseList));
    	
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
            try {
                $group = new Group;
                $group->name = $_REQUEST['name'];
                $group->creator = $this->userid;
                $group->description = $_REQUEST['description'];
                $group->courseid = $_REQUEST['courseid'];
                $group->jointype = $_REQUEST['jointype'];
                $group->save();
            } catch(Exception $e) {
                $this->render('/site/error',array('errortxt'=>'创建小组保存错误'));
                exit;
            }
            // 保存图片
            if($_FILES['file']['error']==0) {
                $imgpath = Yii::app()->params['img_upload_path'];
                preg_match('|^image/(.*)|',$_FILES['file']['type'],$match);
                if(empty($match[1])) {
                    $this->render('/site/error',array('errortxt'=>'文件类型错误'));
                    exit;
                }
                $filetype = $match[1];
                $filepath = $imgpath.'grouplogo'.$group->id.'.'.$filetype;
                if(file_exists($filepath)) {
                    unlink($filepath);
                }
                move_uploaded_file($_FILES['file']['tmp_name'],$filepath);
                //var_dump($_FILES,$filepath);exit;
                $group->icon = $filepath;
                $group->save();
            }
        }
        $this->render('group_edit',array('course_list'=>$courseList));
    }

    // 获取小组列表
    // @param courseid 课程id
    // @return json
    public function actionGetGroups()
    {
        $ret = array();
        if(isset($_REQUEST['courseid'])) {
            $groupInst = new Group;
            $groups = $groupInst->findAll('creator=:creatorid and courseid=:courseid',array(':creatorid'=>$this->userid,':courseid'=>$_REQUEST['courseid']));
            foreach($groups as $g) {
                $ret[] = $g->getAttributes();
            }
            echo json_encode($ret);
        } else {
            echo '';
        }
    }

    // 保存小组成员设置
    // @param groupid 组id
    // @param leaderid 组长id 0为没有组长
    // @param uids 成员id 逗号分隔
    public function actionSaveGroupMember()
    {
        if(!empty($_REQUEST['uids'])&&!empty($_REQUEST['groupid'])) {
            // 设置组长
            $groupInst = new Group;
            $groupInst->updateByPk($_REQUEST['groupid'],
                array( 'leaderid'=>$_REQUEST['leaderid'] )
            );
            $groupMInst = new GroupMember;
            // 保存组员(助教，组员，组长)
            $groupMInst->deleteAll("groupid=:gid",array(":gid"=>$_REQUEST['groupid']));
            $uids = explode(',',$_REQUEST['uids']);
            foreach($uids as $id) {
                if(!empty($id)) {
                    $groupMInst = new GroupMember;
                    $groupMInst->groupid = $_REQUEST['groupid'];
                    $groupMInst->uid = $id;
                    $groupMInst->save();
                }
            }
            echo "保存成功";
        } else {
            echo '保存失败';
        }
    }

    // 小组人员管理
    // @return 页面
    public function actionManageGroup()
    {
        //var_dump($_REQUEST);exit;
        // 课程列表
        $courseInst = new Course;
        $courses = $courseInst->findAll('creator=:id',array(':id'=>$this->userid));

        $students = $teachers = array();
        $groupleader = $groupmembers = array(); 
        if(isset($_REQUEST['course'])&&isset($_REQUEST['group'])) {
            $userInst = new MUser;
            // 组员
            $students = $userInst->getStudentWithoutGroup($_REQUEST['course']);
            //var_dump($students);exit;
            $groupInst = new Group;
            $groupmembers = $groupInst->getStudentWithinGroup($_REQUEST['group']);
            $groupleader = $groupInst->getGroupLeader($_REQUEST['group']);
            // 助教
            $teachers = $userInst->getTeacherByGroup($_REQUEST['group']);
        }
        $this->render('group_manage', array(
            'courses'=>$courses,
            'curgroup'=>isset($_REQUEST['group'])?$_REQUEST['group']:false,
            'curcourse'=>isset($_REQUEST['course'])?$_REQUEST['course']:false,
            'groupleader'=>$groupleader,
            'groupmembers'=>$groupmembers,
            'students'=>$students,
            'teachers'=>$teachers,
        ));
    }

    //查看讨论
    public function actionDiscussList()
    {
        $this->render('discuss_list');
    }

    // 老师回复编辑课程的消息
    // 老师特权 m-user-privilege 的privilege_tag=courseedit
    // content字段存入课程id
    public function actionReturnMessage()
    {
        $infoid = isset($_REQUEST['infoid']) ? $_REQUEST['infoid'] : 0;
        $responce = isset($_REQUEST['responce']) ? $_REQUEST['responce'] : 0;
        $fromid = isset($_REQUEST['fromid']) ? $_REQUEST['fromid'] : 0;
        $courseid = isset($_REQUEST['courseid']) ? $_REQUEST['courseid'] : 0;

        $info = Info::model()->find("id=:id",array(":id"=>$infoid));
        if($info->is_responce==1) exit;
        $info->is_responce = 1;
        $info->responce = $responce;
        $info->save();

        // 答应
        if($responce==1) {
            $mp = MUserPriviledge::model()->find("uid=:id and privilege_tag=:t and content=:cid",
                array(':id'=>$fromid,':t'=>'courseedit',':cid'=>$courseid));
            if(empty($mp)) $mp = new MUserPriviledge;
            else exit;
            $mp->uid=$fromid;
            $mp->privilege_tag="courseedit";
            $mp->content=$courseid;
            $mp->save();
        } else {
            MUserPriviledge::model()->deleteAll("uid=:id and privilege_tag=:t and content=:cid",
                array(':id'=>$fromid,':t'=>'courseedit',':cid'=>$courseid));
        }
    }

    //查看消息
    // 老师申请编辑课程的消息表中的数据为
    // type=request_edit_class
    // content=courseid
    // responce= 1 同意 or 0 拒绝
    // 通知消息 无需回复
    public function actionMessageList()
    {
        $tinfos = Info::model()->findAll('uid_to=:id and is_responce=0 order by request_time desc',array(':id'=>$this->userid));
        //echo "<pre>";var_dump($courses);exit;
        $infos = array();
        foreach($tinfos as $i) {
            if(!empty($i['content']))  {
                $course = Course::model()->find('id=:id',array(':id'=>$i['content']));
                $r = $i->getAttributes();
                $r['courseid'] = $course['id'];
                $r['coursename'] = $course['name'];
                $user = User::model()->find('uid=:id',array(':id'=>$i['uid_from']));
                $r['uname_from'] = $user['uname'];
                $r['request_time'] = date("Y-m-d",strtotime($r['request_time']));
                $infos[] = $r;
            }
        }
        $this->render('message_list', array('infos'=>$infos));
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

    //查看作业list
    public function actionHomeWorkAnswerList()
    {
    	//获取创建的课程
    	$courseModel = new Course();
    	$createCourse = $courseModel->getCreateCourseListByUid($this->userid);
    	//var_dump($createCourse);
    	//获取是小组助教的课程
    	
    	$assistCourse = $courseModel->getCourseListOfAssist($this->userid);
    	//var_dump($assistCourse);exit;
    	//$allCourse = $createCourse + $assistCourse;
    	$allCourse = array();
    	foreach ($createCourse as $key => $value)
    	{
    		$allCourse[$value['id']] = $value;
    	}
    	
    	foreach ($assistCourse as $key => $value)
    	{
    		$allCourse[$value['id']] = $value;
    	}
    	
    	$groupId = isset($_REQUEST['groupid']) ? intval($_REQUEST['groupid']) : 0;
    	if (!empty($groupId)) 
    	{
    		//获取这个小组下的学生的这门课的作业
    		;
    	}
    	
    }
    
    //根据课程id获取课程内容
    public function getCourseContentByCid()
    {
    	$cid = isset($_REQUEST['cid']) ? intval($_REQUEST['cid']) : 0;
    	if (empty($cid)) 
    	{
    		$this->jsonResult(-1);
    	}
    	
    	$content = CourseContent::model()->findAll('courseid=:courseid',array(':courseid'=>$cid));
    	$this->jsonResult(0, $content);
    }
    
    //根据课程获取小组
    public function getGroupByCid()
    {
    	$cid = isset($_REQUEST['cid']) ? intval($_REQUEST['cid']) : 0;
    	if (empty($cid)) 
    	{
    		$this->jsonResult(-1);
    	}
    	
    	$groupList = array();
    	$courseInfo = Course::model()->findByPk($cid);
    	if ($courseInfo['creator'] == $this->userid)   //如果是创建者，可获取所有小组
    	{
    		$groupList = Group::model()->findAll('courseid=:courseid', 
    			array(':courseid' => $cid));
    			
    	}
    	else   //如果是助教，只获取属于自己助教的小组
    	{
    		$courseModel = new Course();
    		$groupList = $courseModel->getGroupListByCid($cid, $this->userid);
    	}
    	
    	$this->jsonResult(0, $groupList);
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
