<?php



class StatController extends Controller
{
    public function actionPointStat() 
    {
        $model = new Question();
        switch($_REQUEST['type']) {
        case 'start_answer':
            // 开始答题时间
            $model->saveStartAnswerTime($_REQUEST);
            break;
        case 'down':
            // 统计点击方块数，同一个方块多次点击算一次
            $qcache = new QuestionCache($_REQUEST["qid"]);
            $qcache->setPointPositon($_REQUEST["x"],$_REQUEST["y"]);
            // 点击位置信息
            if(!$model->savePointStartInfo($_REQUEST)) {
                echo 1;
            } else {
                echo 0;
            }
            break;
        case 'up':
            if(!$model->savePointEndInfo($_REQUEST)) {
                echo 1;
            } else {
                echo 0;
            }
            break;
        default:
            break;
        }
    }
}


