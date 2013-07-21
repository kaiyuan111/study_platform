<?php


class LeftMenu extends CWidget
{
    public $userid;
    public $type;
    public $currentRoute;
    public function run()
    {
        preg_match("/(^.*?)\?|(^.*)/",$_SERVER['REQUEST_URI'],$matchs);
        $currentRoute  = empty($matchs[1]) ? $matchs[2] : $matchs[1];
        $actions = Privilege::getMenu($this->userid);
        $content = " <ul> ";
        foreach($actions as $k=>$v) {
            if($this->type=='logo'&&!empty($v['logo'])) {
                if(preg_match("|^{$v['route']}|",$currentRoute)) {
                    // 点击后
                    $logopath = $v['logo_click'];
                } else {
                    $logopath = $v['logo'];
                }
                $content .= "
                    <li><a href='{$v['route']}'><img src='{$v['logo']}' /></a></li>
                ";
            } else {
                $content .= "
                    <li><a href='{$v['route']}'>{$v['aname']}</a></li>
                ";
            }
        }
        $content .= " </ul> ";
        echo $content;
        //$this->render('main.views.widget.left_menu',array('actions'=>$actions));
    }

}
