<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();


    // 问卷id={rand}
    protected $naireid;
    // 实验id={1,2,3,4,5}
    protected $expid;

    protected function beforeAction()
    {
        $this->naireid = Yii::app()->request->getParam('naireid',rand(1000000,9999999));
        $this->expid = Yii::app()->request->getParam('expid',1);

        return true;
    }
}
