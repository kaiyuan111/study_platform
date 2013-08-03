<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>创建小组</title>
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
            	<li class="move"><a href="Add_Class.html"><img src="images/cjxz_move.png" /></a></li>
            	<li><a href="Manage_Class.html"><img src="images/xzgl.png" /></a></li>
            	<li><a href="Discuss_list.html"><img src="images/cktl.png" /></a></li>
            	<li><a href="Work_list.html"><img src="images/ckzy.png" /></a></li>
            	<li><a href="Info_list.html"><img src="images/ckxx.png" /></a></li>
            </ul>
        
        </div>
    	<div class="Add_Class_content">
        	<div class="top"><img src="images/cont_home.png" align="absmiddle" class="home" /><span>创建小组</span></div>
        	<div class="cont">
            	<div class="tittle">新建小组</div>
                <div class="form">
                	<form action="#">
                    	<ul>
                        	<li class="li"><span class="l">小组名称&nbsp;:&nbsp;&nbsp;&nbsp;<font color="#cb0000">*</font></span><span class="r"><input type="text" name="name" class="input" size="31"/></span></li>
                        	<li class="o_none"><span class="l">选择课程&nbsp;:&nbsp;&nbsp;&nbsp;<font color="#cb0000">*</font></span><span class="r">
                                    <select name="select">
                                        <option value="0">选择你想要的课程&nbsp;</option>
                                        <option value="1">2&nbsp;</option>
                                    </select>
                                </span>
                            </li>
                        	<li class="li"><span class="l">小组简介&nbsp;:&nbsp;&nbsp;&nbsp;<font color="#cb0000">*</font></span><span class="r"><textarea name="" cols="49" rows="10" ></textarea></span></li>
                        	<li class="li mt190"><span class="l">上传图标&nbsp;:&nbsp;&nbsp;&nbsp;<font color="#FFF">*</font></span><span class="r"><input type="text" name="" class="input" size="21" /><img src="images/file.png" /><input type="file" name="file" id="f"  name="f" style="position:absolute; filter:alpha(opacity=0); opacity:0; margin-left:-70px; width:70px; height:30px; "/></span></li>
                        	<li class="li"><span class="l">小组人数&nbsp;:&nbsp;&nbsp;&nbsp;<font color="#FFF">*</font></span><span class="r f18">12人/组</span></li>
                        	<li class="li"><span class="l">加入方式&nbsp;:&nbsp;&nbsp;&nbsp;<font color="#cb0000">*</font></span><span class="r f14">
                            <label for="radio-01" class="label_radio">      
                                <input type="radio" checked="" value="1" id="radio-01" name="sample-radio" />自由加入      
                            </label>  
                            <label for="radio-02" class="label_radio">      
                                <input type="radio" checked="" value="2" id="radio-02" name="sample-radio" />审核加入      
                            </label>                              
                            </span></li>
                        </ul>
                    		<div class="submit"><a href="Manage_Class.html"><input type="submit" value="&nbsp;&nbsp;创&nbsp;&nbsp;建&nbsp;&nbsp;" /></a></div>
                    </form>
                	
                </div>
                
            </div>
        </div>
     </div>
     <div class="foot">Copyright© 2012 Open Vision. 版权所有&nbsp;&nbsp;</div>
</div>
</body>
</html>
