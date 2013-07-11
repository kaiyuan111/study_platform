<?php

class RoleAction extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-role-action`';
    }

    /**
     * findActions 
     *
     * 根据roleid获取actions
     * 
     * @param mixed $rid 
     * @return array(aid1,aid2)
     */
    public function findActions($rid)
    {
        $actions = $this->findAll('rid=:id',array(':id'=>$rid));
        foreach($actions as $v) {
            $ret[] = $v['aid'];
        }
        return $ret;
    }

    /**
     * saveActions 
     * 
     * @param mixed $rid 角色id
     * @param array $actions  array(aid1,aid2)
     * @return void
     */
    public function saveActions($rid,array $actions)
    {
        $conn = Yii::app()->db;
        $sql = "insert into `m-role-action` (rid,aid) values ";
        foreach($actions as $k=>$v) {
            $sql .= "({$rid},{$v}),";
        }
        $sql = trim($sql,',');
        $command = $conn->createCommand($sql);
        $command->execute();
    }
}
