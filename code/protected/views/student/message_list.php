<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的消息</title>
<link href="css/css.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="stylesheet" href="jqtransformplugin/jqtransform.css" type="text/css" media="all" />

	<script type="text/javascript" src="requiered/jquery.js" ></script>
	<script type="text/javascript" src="jqtransformplugin/jquery.jqtransform.js" ></script>
	<script language="javascript">
		$(function(){
			$('form').jqTransform({imgPath:'images/'});
		});
	</script>
</head>

<body>
<div class="bg">
    <div class="head">
        <span class="logo"><img src="images/logo.png" /></span>
        <span class="home"><a href="#"><img src="images/home.png" /></a><a href="#"><img src="images/out.png" /></a></span>
    </div>
    
    <div class="content">
    	<div class="Add_Class_left">
            <div class="Nav_1">学员,您好!</div>
            <div class="Nav_2">2013年6月18日<br />星期二&nbsp;&nbsp; 10：34:05</div>
            <ul>   
            	<li><a href="My4D.html"><img src="images/My4D.png" /></a></li>
            	<li><a href="Myclass.html"><img src="images/Myclass.png" /></a></li>
            	<li><a href="Mydiscuss.html"><img src="images/Mydiscuss.png" /></a></li>
            	<li><a href="Myestreat.html"><img src="images/Myestreat.png" /></a></li>
            	<li><a href="Mypostil.html"><img src="images/Mypostil.png" /></a></li>
            	<li><a href="Mywork.html"><img src="images/Mywork.png" /></a></li>
            	<li class="move"><a href="Myinfo.html"><img src="images/Myinfo_move.png" /></a></li>
            </ul>
        
        </div>
    	<div class="Add_Class_content">
        	<div class="top"><img src="images/cont_home.png" align="absmiddle" class="home" /><span> 我的消息</span></div>
            <div class="cont">
            	<div class="Info_tittle">消息列表</div>
                <div class="info_list" id="wrapper">
                	<div class="info_list_top">
                    	<ul>
                        	<li class="info_li_1">状态</li>
                        	<li class="info_li_2">发件人</li>
                        	<li class="info_li_3">主题</li>
                        	<li class="info_li_4">时间</li>
                        	<li class="info_li_5">操作</li>
                        </ul>
                    </div>
                    <ul class="myinfo_list_cont">
                        <li id="list1">
                        <div>
                            <span class="info_li_1"><img src="images/email_no_ico.png" align="absmiddle" /></span>
                            <span class="info_li_2">张三</span>
                            <span class="info_li_3"><a href="#list1">申请编辑课程</a></span>
                            <span class="info_li_4">6月18日</span>
                            <span class="info_li_5"><img src="images/del_ico.png" align="absmiddle" /></span> 
                        </div>
                           <ul>
                                <div class="myinfo_cont">
                                你已被<b>张三</b>添加到小组三，成为小组三的成员
                                </div>                                                                
                            </ul>
                        </li>
                        <li id="list2">
                        <div>
                            <span class="info_li_1"><img src="images/email_no_ico.png" align="absmiddle" /></span>
                            <span class="info_li_2">李四</span>
                            <span class="info_li_3"><a href="#list2">申请编辑课程</a></span>
                            <span class="info_li_4">6月18日</span>
                            <span class="info_li_5"><img src="images/del_ico.png" align="absmiddle" /></span> 
                        </div>
                           <ul>
                                <div class="myinfo_cont">
                                你已被<b>张三</b>添加到小组三，成为小组三的成员
                                </div>                                                                
                            </ul>
                        </li>                        
                        <li id="list3">
                        <div>
                            <span class="info_li_1"><img src="images/email_no_ico.png" align="absmiddle" /></span>
                            <span class="info_li_2">李四</span>
                            <span class="info_li_3"><a href="#list2">申请编辑课程</a></span>
                            <span class="info_li_4">6月18日</span>
                            <span class="info_li_5"><img src="images/del_ico.png" align="absmiddle" /></span> 
                        </div>
                           <ul>
                                <div class="myinfo_cont">
                                你已被<b>张三</b>添加到小组三，成为小组三的成员
                                </div>                                                                
                            </ul>
                        </li>                        
                        <li id="list4">
                        <div>
                            <span class="info_li_1"><img src="images/email_no_ico.png" align="absmiddle" /></span>
                            <span class="info_li_2">李四</span>
                            <span class="info_li_3"><a href="#list4">申请编辑课程</a></span>
                            <span class="info_li_4">6月18日</span>
                            <span class="info_li_5"><img src="images/del_ico.png" align="absmiddle" /></span> 
                        </div>
                           <ul>
                                <div class="myinfo_cont">
                                你已被<b>张三</b>添加到小组三，成为小组三的成员
                                </div>                                                                
                            </ul>
                        </li>                        
                        <li id="list5">
                        <div>
                            <span class="info_li_1"><img src="images/email_ico.png" align="absmiddle" /></span>
                            <span class="info_li_2">李四</span>
                            <span class="info_li_3"><a href="#list5">申请编辑课程</a></span>
                            <span class="info_li_4">6月18日</span>
                            <span class="info_li_5"><img src="images/del_ico.png" align="absmiddle" /></span> 
                        </div>
                           <ul>
                                <div class="myinfo_cont">
                                你已被<b>张三</b>添加到小组三，成为小组三的成员
                                </div>                                                                
                            </ul>
                        </li>                        
                        <li id="list6">
                        <div>
                            <span class="info_li_1"><img src="images/email_ico.png" align="absmiddle" /></span>
                            <span class="info_li_2">李四</span>
                            <span class="info_li_3"><a href="#list6">申请编辑课程</a></span>
                            <span class="info_li_4">6月18日</span>
                            <span class="info_li_5"><img src="images/del_ico.png" align="absmiddle" /></span> 
                        </div>
                           <ul>
                                <div class="myinfo_cont">
                                你已被<b>张三</b>添加到小组三，成为小组三的成员
                                </div>                                                                
                            </ul>
                        </li>                        
                        <li id="list7">
                        <div>
                            <span class="info_li_1"><img src="images/email_ico.png" align="absmiddle" /></span>
                            <span class="info_li_2">李四</span>
                            <span class="info_li_3"><a href="#list7">申请编辑课程</a></span>
                            <span class="info_li_4">6月18日</span>
                            <span class="info_li_5"><img src="images/del_ico.png" align="absmiddle" /></span> 
                        </div>
                           <ul>
                                <div class="myinfo_cont">
                                你已被<b>张三</b>添加到小组三，成为小组三的成员
                                </div>                                                                
                            </ul>
                        </li>                        
                        <li id="list8">
                        <div>
                            <span class="info_li_1"><img src="images/email_ico.png" align="absmiddle" /></span>
                            <span class="info_li_2">李四</span>
                            <span class="info_li_3"><a href="#list8">申请编辑课程</a></span>
                            <span class="info_li_4">6月18日</span>
                            <span class="info_li_5"><img src="images/del_ico.png" align="absmiddle" /></span> 
                        </div>
                           <ul>
                                <div class="myinfo_cont">
                                你已被<b>张三</b>添加到小组三，成为小组三的成员
                                </div>                                                                
                            </ul>
                        </li>                        
                        <li id="list9">
                        <div>
                            <span class="info_li_1"><img src="images/email_ico.png" align="absmiddle" /></span>
                            <span class="info_li_2">李四</span>
                            <span class="info_li_3"><a href="#list9">申请编辑课程</a></span>
                            <span class="info_li_4">6月18日</span>
                            <span class="info_li_5"><img src="images/del_ico.png" align="absmiddle" /></span> 
                        </div>
                           <ul>
                                <div class="myinfo_cont">
                                你已被<b>张三</b>添加到小组三，成为小组三的成员
                                </div>                                                                
                            </ul>
                        </li>                        
                        <li id="list10">
                        <div>
                            <span class="info_li_1"><img src="images/email_ico.png" align="absmiddle" /></span>
                            <span class="info_li_2">李四</span>
                            <span class="info_li_3"><a href="#list10">申请编辑课程</a></span>
                            <span class="info_li_4">6月18日</span>
                            <span class="info_li_5"><img src="images/del_ico.png" align="absmiddle" /></span> 
                        </div>
                           <ul>
                                <div class="myinfo_cont">
                                你已被<b>张三</b>添加到小组三，成为小组三的成员
                                </div>                                                                
                            </ul>
                        </li>                        
                        <li id="list11">
                        <div>
                            <span class="info_li_1"><img src="images/email_ico.png" align="absmiddle" /></span>
                            <span class="info_li_2">李四</span>
                            <span class="info_li_3"><a href="#list11">申请编辑课程</a></span>
                            <span class="info_li_4">6月18日</span>
                            <span class="info_li_5"><img src="images/del_ico.png" align="absmiddle" /></span> 
                        </div>
                           <ul>
                                <div class="myinfo_cont">
                                你已被<b>张三</b>添加到小组三，成为小组三的成员
                                </div>                                                                
                            </ul>
                        </li>                        
                        <li id="list12">
                        <div>
                            <span class="info_li_1"><img src="images/email_ico.png" align="absmiddle" /></span>
                            <span class="info_li_2">李四</span>
                            <span class="info_li_3"><a href="#list12">申请编辑课程</a></span>
                            <span class="info_li_4">6月18日</span>
                            <span class="info_li_5"><img src="images/del_ico.png" align="absmiddle" /></span> 
                        </div>
                           <ul>
                                <div class="myinfo_cont">
                                你已被<b>张三</b>添加到小组三，成为小组三的成员
                                </div>                                                                
                            </ul>
                        </li>                        
                    
                    
                    
                    
                    
                    </ul>
                    
                    
                    
                </div>
				<div class="page">
                	<ul>
                    	<li class="up"><a href="#">&nbsp;</a></li>
                    	<li><a href="">1</a></li>
                    	<li><a href="">2</a></li>
                    	<li><a href="">3</a></li>
                    	<li><a href="">4</a></li>
                    	<li class="down"><a href="#">&nbsp;</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
     </div>
     <div class="foot">Copyright© 2012 Open Vision. 版权所有&nbsp;&nbsp;</div>
</div>

</body>
</html>
