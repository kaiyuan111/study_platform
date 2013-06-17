<?php

class Question
{
    /**
     * initQuestionDB 
     *
     * 初始化问卷db
     * 
     * @param mixed $qid 问卷号
     * @param mixed $expid 实验号
     * @return void
     */
    public function initQuestionDB($qid,$expid)
    {
        $db = Yii::app()->db;
        $conn = $db->createCommand();
        if($conn->insert('questionnaire',array('qid'=>$qid,'exp_id'=>$expid))) {
            return true;
        }
        return false;
    }

    public function saveAnswer(array $params, $nairetype)
    {
        switch($nairetype) {
            case "try":
                $this->saveAnswerMultiChoise($params,'q','q0');
                break;
            case "info_pannel":
                $this->saveAnswerMultiChoise($params,'q','q1');
                $this->saveEndAnswerTime($params);

                $qcache = new QuestionCache($params["naireid"]);
                list($ds,$vs) = $qcache->getDSVS();
                $ps = $qcache->getPS();
                $ci = $qcache->getCI($ds,$vs);
                $this->saveDSVSPSCI($params["naireid"],$ds,$vs,$ps,$ci);
                break;
            case "press":
                $this->saveAnswerMultiChoise($params,'q','q2');
                break;
            case "mood":
                $this->saveAnswerMultiChoise($params,'q','q3');
                break;
            case "fuzy":
                $this->saveAnswerMultiChoise($params,'q','q4');
                break;
            case "personel":
                $this->saveAnswerMultiChoise($params,'q','q5');
                break;
            case "end":
                $qcache = new QuestionCache($params["naireid"]);
                // $cache = Yii::app()->cache;
                // var_dump($cache->get("{$params["naireid"]}_xmove"));
                // var_dump($cache->get("{$params["naireid"]}_ymove"));
                // var_dump($cache->get("{$params["naireid"]}_last"));
                $qcache->clearCache();
                $db = Yii::app()->db;
                $conn = $db->createCommand();
                $conn->update('questionnaire',array("email"=>$params["email"]),"qid = {$params['naireid']}");
                break;
        }
    }

    /**
     * saveAnswerMultiChoise 
     * 
     * 保存问卷答案--选择题
     *
     * @param array $params 
     * @param mixed $keyFrom  输入的题目name前缀
     * @param mixed $keyTo db中的题目name前缀
     * @return void
     */
    public function saveAnswerMultiChoise(array $params,$keyFrom,$keyTo)
    {
        $db = Yii::app()->db;
        $conn = $db->createCommand();
        foreach($params as $key=>$value) {
            if(!preg_match("/^q\d/",$key)) continue;
            $dbkey = str_replace($keyFrom,"",$key);
            $dbkey = $keyTo.$dbkey;
            $updateData[$dbkey] = $value;
        }
        $conn->update('questionnaire',$updateData,"qid = {$params['naireid']}");
    }

    /**
     * savePointStartInfo 
     *
     * 保存信息版按钮按下后的信息
     * 
     * @param array $params 
     * @return void
     */
    public function savePointStartInfo(array $params)
    {
        $cache = Yii::app()->cache;
        $pointid = $cache->get("question_pointid".$params['qid']);

        $db = Yii::app()->db;
        $conn = $db->createCommand();
        $data = array(
            'qid' => $params['qid'],
            'pid' => $pointid,
            'x' => $params['x'],
            'y' => $params['y'],
            'start_time' => microtime(true),
        );
        return $conn->insert('points',$data);
    }

    /**
     * savePointEndInfo 
     *
     * 保存信息版按钮弹起的信息
     * 
     * @param array $params 
     * @return void
     */
    public function savePointEndInfo(array $params)
    {
        $cache = Yii::app()->cache;
        $pointid = $cache->get("question_pointid".$params['qid']);
        $cache->set("question_pointid".$params['qid'],$pointid+1);

        $db = Yii::app()->db;
        $conn = $db->createCommand();
        $pointInfo = $this->getPointsById($params['qid'],$pointid);
        $intenaltime = microtime(true)-$pointInfo[0]['start_time'];
        $data = array(
            'end_time' => microtime(true),
            'time' => $intenaltime,
        );
        $where = array(
            "and",
            "qid={$params['qid']}",
            "pid={$pointid}",
        );
        return $conn->update('points',$data,$where);
    }

    /**
     * getPointsById 
     *
     * 查询点击信息
     * 
     * @param mixed $qid 
     * @param mixed $pid 
     * @return void
     */
    public function getPointsById($qid,$pid)
    {
        $db = Yii::app()->db;
        $sql = "select * from points where qid=:qid and pid=:pid";
        $conn = $db->createCommand($sql);
        $conn->bindParam(":qid",$qid);
        $conn->bindParam(":pid",$pid);
        $conn->execute();
        return $conn->queryAll();
    }

    /**
     * getNaireById 
     *
     * 通过id查询问卷信息
     * 
     * @param mixed $qid 
     * @return void
     */
    public function getNaireById($qid)
    {
        $db = Yii::app()->db;
        $sql = "select * from questionnaire where qid=:qid";
        $conn = $db->createCommand($sql);
        $conn->bindParam(":qid",$qid);
        $conn->execute();
        return $conn->queryAll();
    }

    /**
     * saveStartAnswerTime 
     *
     * 保存开始答题时间
     * 
     * @param mixed $params 
     * @return void
     */
    public function saveStartAnswerTime($params)
    {
        $db = Yii::app()->db;
        $conn = $db->createCommand();
        $data = array("start_answer_time"=>time());
        $conn->update('questionnaire',$data,"qid = {$params['qid']}");
    }

    public function saveEndAnswerTime($params)
    {
        $db = Yii::app()->db;
        $conn = $db->createCommand();
        $naireInfo = $this->getNaireById($params["naireid"]);
        $naireInfo = $naireInfo[0];
        $data = array(
            "end_answer_time"=>time(),
            "total_answer_time"=>time()-$naireInfo["start_answer_time"],
        );
        $conn->update('questionnaire',$data,"qid = {$params['naireid']}");
    }

    public function saveDSVSPSCI($qid,$ds,$vs,$ps,$ci)
    {
        $db = Yii::app()->db;
        $conn = $db->createCommand();
        $data = array(
            "ds"=>$ds,
            "ps"=>$ps,
            "vs"=>$vs,
            "ci"=>$ci,
        );
        $conn->update('questionnaire',$data,"qid = {$qid}");
    }
}


