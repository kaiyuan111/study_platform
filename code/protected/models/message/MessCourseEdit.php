<?php

// 老师申请编辑
class MessCourseEdit extends MessCommon
{
	public $MESS_TYPE = 'request_edit_class';
	
	// 发送编辑申请消息
	public function send($uidFrom,$uidTo,$courseid)
	{
		$title = "申请编辑课程";
		$this->sendM($this->MESS_TYPE,$title,$courseid,$uidFrom,$uidTo);

		$mail = new Mail;
		$mail->isHtml();
		$userfrom = User::model()->findByPk($uidFrom);
		$userto = User::model()->findByPk($uidTo);
		$courseInfo = Course::model()->findByPk($courseid);
		$url = "http://{$_SERVER['HTTP_HOST']}/teacher/messagelist";
		$message = "申请编辑课程，请访问<a href='{$url}'>消息列表</a>进行回复";
		$title = "[4D系统学习平台]-{$userfrom['uname']}申请对课程《{$courseInfo['name']}》进行编辑";
		$mailmess = $mail->commonTemple($userto['uname'],$message,$userfrom['uname']);
		$ret = $mail->send($userto['email'],$title,$mailmess);
	}

	// 接受申请
	public function accept($infoid)
	{
        $info = Info::model()->find("id=:id",array(":id"=>$infoid));
        $info->is_responce = 1;
        $info->responce = 1;
        $info->save();

		$courseid = $info['content'];
		$fromid = $info['uid_from'];

		// 编辑的特权
		$mp = MUserPriviledge::model()->find("uid=:id and privilege_tag=:t and content=:cid",
			array(':id'=>$fromid,':t'=>'courseedit',':cid'=>$courseid));
		if(empty($mp)) {
			$mp = new MUserPriviledge;
		} else {
			return true;
		}

		$mp->uid=$fromid;
		$mp->privilege_tag="courseedit";
		$mp->content=$courseid;
		$mp->save();
		return true;
	}

	// 拒绝申请
	public function refuse($infoid)
	{
        $info = Info::model()->find("id=:id",array(":id"=>$infoid));
        $info->is_responce = 1;
        $info->responce = 0;
        $info->save();

		// 去除特权
		$courseid = $info['content'];
		$fromid = $info['uid_from'];

        MUserPriviledge::model()->deleteAll("uid=:id and privilege_tag=:t and content=:cid", array(':id'=>$fromid,':t'=>'courseedit',':cid'=>$courseid));
	}

}


