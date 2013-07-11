<?php

class User extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '`m-user`';
    }

    public function getUserWithRole($condition='',$params=array())
    {
        if(!empty($condition)) {
            $sql = "
                SELECT u.*,r.rid,r.rname  
                FROM `m-user` u 
                LEFT JOIN `m-role` r ON u.rid=r.rid
                where {$condition} order by u.uname;
            ";
        } else {
            $sql = "
                SELECT u.*,r.rid,r.rname 
                FROM `m-user` u 
                LEFT JOIN `m-role` r ON u.rid=r.rid order by u.uname
            ";
        }
        $conn = Yii::app()->db;
        $command = $conn->createCommand($sql);
        foreach($params as $key=>$value) {
            $command->bindParam($key,$value);
        }
        $rows = $command->queryAll();
        return $rows;
    }

}
