<?php

class QuestionCache
{
    private $naireid;
    public function __construct($naire)
    {
        $this->naireid = $naire;
    }

    public function setPointPositon($x,$y)
    {
        $cache = Yii::app()->cache;
        // 当前位置信息
        $cache->set("{$this->naireid}_{$x}_{$y}",1);
        //$cache->get("{$this->naireid}_{$x}_{$y}");
        // 上一次点击
        $last = $cache->get("{$this->naireid}_last");
        if(!empty($last)) {
            list($lastx,$lasty) = explode("_",$last);
            // 属性与选项间移动
            if($lasty==$y&&$lastx!=$x) {
                $xmove = $cache->get("{$this->naireid}_xmove");
                if(empty($xmove)) $xmove = 0;
                $xmove++;
                $cache->set("{$this->naireid}_xmove",$xmove);
            }
            if($lastx==$x&&$lasty!=$y) {
                $ymove = $cache->get("{$this->naireid}_ymove");
                if(empty($ymove)) $ymove = 0;
                $ymove++;
                $cache->set("{$this->naireid}_ymove",$ymove);
            }
        }
        $cache->set("{$this->naireid}_last","{$x}_{$y}");
        //echo $cache->get("{$this->naireid}_last");
    }

    public function getDSVS()
    {
        $cache = Yii::app()->cache;
        $sum=0;
        for($x=1;$x<=4;$x++) {
            $panel[$x] = 0;
            for($y=1;$y<=4;$y++) {
                if($cache->get("{$this->naireid}_{$x}_{$y}")) {
                    $panel[$x]++;
                    $sum++;
                }
            }
            $panel[$x] = (float)($panel[$x]/4);
        }
        $meanx=0;
        for($x=1;$x<=4;$x++) {
            $meanx += $panel[$x];
        }
        $meanx /= 4;

        $dev = 0;
        for($x=1;$x<=4;$x++) {
            $t = $panel[$x]-$meanx;
            $t = pow($t,2);
            $dev += $t;
        }
        $dev = sqrt($dev/4);

        $sum /= 16;
        return array($sum,$dev);
    }

    public function getPS()
    {
        $cache = Yii::app()->cache;
        $xmove = $cache->get("{$this->naireid}_xmove");
        $ymove = $cache->get("{$this->naireid}_ymove");
        // $t = (float)($ymove-$xmove)/(float)($ymove+$xmove);
        // var_dump($xmove,$ymove,$t);
        // exit;
        if(($ymove+$xmove)==0) {
            return 99;
        }
        return (float)($ymove-$xmove)/(float)($ymove+$xmove);
    }

    public function getCI($ds,$vs)
    {
        return $ds*(1-2*$vs);
    }

    public function clearCache()
    {
        $cache = Yii::app()->cache;
        for($x=1;$x<=4;$x++) {
            for($y=1;$y<=4;$y++) {
                $cache->delete("{$this->naireid}_{$x}_{$y}");
            }
        }
        $cache->delete("{$this->naireid}_xmove");
        $cache->delete("{$this->naireid}_ymove");
        $cache->delete("{$this->naireid}_last");
    }

}




