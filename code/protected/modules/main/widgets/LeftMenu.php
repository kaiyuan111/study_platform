<?php


class LeftMenu extends CWidget
{
    public $userid;
    public function run()
    {
        $actions = Privilege::getMenu($this->userid);
        $this->render('main.views.widget.left_menu',array('actions'=>$actions));
    }

}
