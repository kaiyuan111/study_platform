<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看讨论</title>
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
            <div class="Nav_1">老师,您好!</div>
            <div class="Nav_2">2013年6月18日<br />星期二&nbsp;&nbsp; 10：34:05</div>
            <ul>   
            	<li><img src="images/kcgl.png" /></li>
            	<li><img src="images/nrgl.png" /></li>
            	<li><a href="Add_Class.html"><img src="images/cjxz.png" /></a></li>
            	<li><a href="Manage_Class.html"><img src="images/xzgl.png" /></a></li>
            	<li class="move"><a href="Discuss_list.html"><img src="images/cktl_move.png" /></a></li>
            	<li><a href="Work_list.html"><img src="images/ckzy.png" /></a></li>
            	<li><a href="Info_list.html"><img src="images/ckxx.png" /></a></li>
            </ul>
        
        </div>
    	<div class="Add_Class_content">
        	<div class="top"><img src="images/cont_home.png" align="absmiddle" class="home" /><span>查看讨论</span></div>
        	<div class="search_classs">
                <p>选择讨论</p>
                <form action="#">
                    <select name="select">
                        <option value="0">课程名称&nbsp;</option>
                        <option value="1">课程名称&nbsp;</option>
                    </select>
                    <select name="select1">
                        <option value="0">小组名称&nbsp;</option>
                        <option value="1">小组名称&nbsp;</option>
                    </select>
                    <input type="submit" value="&nbsp;确&nbsp;定&nbsp;" />
                </form>
            </div>
            <div class="cont2">
            	<div class="Discuss_tittle">讨论列表</div>
                <div class="Discuss_list" id="wrapper">
                    <ul class="menu">
                        <li class="item1" id="list1"><a href="#list1">如何做好网页设计 </a>
                           <ul>
                            <div class="list_top"></div>
                            <div class="list_cont">
                            	<div class="t">关于<i>如何做好网页设计</i>这个主题（20130619）<p>由<i>某某</i>发表于2013-06-19  星期三  13:34</p></div>
                            	<ul>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                </ul>
                                <div class="Discuss_input">
                                	<form action="">
                                    	<input name="text" type="text" size="48" onfocus="if (value =='写下你的评论'){value =''}" onblur="if (value ==''){value='写下你的评论'}" value="写下你的评论"/><input type="submit" value="&nbsp;发&nbsp;表&nbsp;" />
                                    </form>
                                </div>
                            </div>
                            <div class="list_bottom"></div>
                            </ul>
                        </li>
                        <li class="item1" id="list2"><a href="#list2">网页设计师的理解和精神 </a>
                           <ul>
                            <div class="list_top"></div>
                            <div class="list_cont">
                            	<div class="t">关于<i>网页设计师的理解和精神</i>这个主题（20130619）<p>由<i>某某</i>发表于2013-06-19  星期三  13:34</p></div>
                            	<ul>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                </ul>
                                <div class="Discuss_input">
                                	<form action="">
                                    	<input name="text" type="text" size="48" onfocus="if (value =='写下你的评论'){value =''}" onblur="if (value ==''){value='写下你的评论'}" value="写下你的评论"/><input type="submit" value="&nbsp;发&nbsp;表&nbsp;" />
                                    </form>
                                </div>
                            </div>
                            <div class="list_bottom"></div>
                            </ul>
                        </li>

                        <li class="item1" id="list3"><a href="#list3">如何对网站进行策划定位 </a>
                           <ul>
                            <div class="list_top"></div>
                            <div class="list_cont">
                            	<div class="t">关于<i>如何对网站进行策划定位</i>这个主题（20130619）<p>由<i>某某</i>发表于2013-06-19  星期三  13:34</p></div>
                            	<ul>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                </ul>
                                <div class="Discuss_input">
                                	<form action="">
                                    	<input name="text" type="text" size="48" onfocus="if (value =='写下你的评论'){value =''}" onblur="if (value ==''){value='写下你的评论'}" value="写下你的评论"/><input type="submit" value="&nbsp;发&nbsp;表&nbsp;" />
                                    </form>
                                </div>
                            </div>
                            <div class="list_bottom"></div>
                            </ul>
                        </li>

                        <li class="item1" id="list4"><a href="#list4">网页设计之信息的的可视化的五个特征 </a>
                           <ul>
                            <div class="list_top"></div>
                            <div class="list_cont">
                            	<div class="t">关于<i>网页设计之信息的的可视化的五个特征</i>这个主题（20130619）<p>由<i>某某</i>发表于2013-06-19  星期三  13:34</p></div>
                            	<ul>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                </ul>
                                <div class="Discuss_input">
                                	<form action="">
                                    	<input name="text" type="text" size="48" onfocus="if (value =='写下你的评论'){value =''}" onblur="if (value ==''){value='写下你的评论'}" value="写下你的评论"/><input type="submit" value="&nbsp;发&nbsp;表&nbsp;" />
                                    </form>
                                </div>
                            </div>
                            <div class="list_bottom"></div>
                            </ul>
                        </li>
                        <li class="item1" id="list5"><a href="#list5">网页设计师的理解 </a>
                           <ul>
                            <div class="list_top"></div>
                            <div class="list_cont">
                            	<div class="t">关于<i>网页设计师的理解</i>这个主题（20130619）<p>由<i>某某</i>发表于2013-06-19  星期三  13:34</p></div>
                            	<ul>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                </ul>
                                <div class="Discuss_input">
                                	<form action="">
                                    	<input name="text" type="text" size="48" onfocus="if (value =='写下你的评论'){value =''}" onblur="if (value ==''){value='写下你的评论'}" value="写下你的评论"/><input type="submit" value="&nbsp;发&nbsp;表&nbsp;" />
                                    </form>
                                </div>
                            </div>
                            <div class="list_bottom"></div>
                            </ul>
                        </li>
                        <li class="item1" id="list6"><a href="#list6">网页设计师的理解 </a>
                           <ul>
                            <div class="list_top"></div>
                            <div class="list_cont">
                            	<div class="t">关于<i>网页设计师的理解</i>这个主题（20130619）<p>由<i>某某</i>发表于2013-06-19  星期三  13:34</p></div>
                            	<ul>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                    <li><a href="#">学员</a><span>2013-06-19 13:34</span><br />需要长期的经验累计</li>
                                </ul>
                                <div class="Discuss_input">
                                	<form action="">
                                    	<input name="text" type="text" size="48" onfocus="if (value =='写下你的评论'){value =''}" onblur="if (value ==''){value='写下你的评论'}" value="写下你的评论"/><input type="submit" value="&nbsp;发&nbsp;表&nbsp;" />
                                    </form>
                                </div>
                            </div>
                            <div class="list_bottom"></div>
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
