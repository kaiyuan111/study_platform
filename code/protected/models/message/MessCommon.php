<?php

class MessCommon
{
	// 获取消息列表
	public function findall($userid)
	{
        $tinfos = Info::model()->findAll('uid_to=:id order by is_read asc,request_time desc',array(':id'=>$userid));
        $infos = array();
		// 填充信息
        foreach($tinfos as $i) {
            $r = $i->getAttributes();
			// get user info of message sourse 
			$user = User::model()->find('uid=:id',array(':id'=>$i['uid_from']));
			$r['uname_from'] = $user['uname'];
			$r['request_time'] = date("Y-m-d",strtotime($r['request_time']));
            if($i['type']=='request_edit_class')  {
				// get course info
                $course = Course::model()->find('id=:id',array(':id'=>$i['content']));
                $r['courseid'] = $course['id'];
                $r['coursename'] = $course['name'];
			} elseif($i['type']=='notify') {
			}
            $infos[] = $r;
        }
		return $infos;
	}

    protected function sendM($type, $title, $message, $uidFrom, $uidTo)
    {
		$info = new Info;
        $info->type=$type;
        $info->title=$title;
        $info->uid_from=$uidFrom;
        $info->request_time=date("Y-m-d");
        $info->content=$message;
        $info->uid_to=$uidTo;
        $info->save();
    }

	protected function acceptM()
	{
	}

	protected function refuseM()
	{
	}
}

