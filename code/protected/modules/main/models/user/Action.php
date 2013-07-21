<?php

class Action extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-action`';
    }

    /**
     * getLogoPaths 
     *
     * 获取侧边栏按钮图片web访问路径，并获取当前action的已设置图片地址
     * 
     * @return array 
     */
    public function getLogoPaths($aid=false)
    {
        if($aid!==false) {
            $action = $this->find("aid=:id",array(':id'=>$aid));
        }
        $path = Yii::app()->basePath."/../images/frame/leftnav/";
        $h = opendir($path);
        $ret = array();
        while(($file=readdir($h))!==false) {
            $filepath = $path.$file;
            if(is_file($filepath)) {
                $r = array(
                    'unionpath'=>"/images/frame/leftnav/".$file."&"."/images/frame/leftnav/".$file,
                    'path'=>"/images/frame/leftnav/".$file,
                    // 点击的图片在子目录里，名字和不点击图片名字相同
                    'clickpath'=>"/images/frame/leftnav/click/".$file,
                );
                $r['click'] = false;
                if(!empty($action['logo'])&&$action['logo']==$r['path']) $r['click'] = true;
                $ret[] = $r;
            }
        }
        return $ret;
    }
}
