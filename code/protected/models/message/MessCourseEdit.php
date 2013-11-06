<?php

// 老师申请编辑
class MessCourseEdit extends MessCommon
{
	public $MESS_TYPE = 'request_edit_class';
	
	// 发送编辑申请消息
	public function send($uidFrom,$uidTo,$courseid)
	{
		$this->sendM($this->MESS_TYPE,'申请编辑课程',$courseid,$uidFrom,$uidTo);
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


