<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学习内容</title>
<link href="css/css.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="stylesheet" href="jqtransformplugin/jqtransform.css" type="text/css" media="all" />
	<script type="text/javascript" src="requiered/jquery.js" ></script>
<script >
function slay(num)
{
	for(var id = 1;id<=4;id++)
	{
		var ss="tabcont"+id; 
	
		if(id==num)
			document.getElementById(ss).style.display="block";
		else
			document.getElementById(ss).style.display="none";
	}  

	for(var id = 1;id<=4;id++)
	{
	
		var bb="tab"+id;
	
		if(id==num)
			document.getElementById(bb).className="active";
		else
			document.getElementById(bb).className="";
	}
}

</script>
<script type="text/javascript">     
function setupLabel(){      
if($('.label_check input').length) {
	$('.label_check').each(function(){
		$(this).removeClass('c_on');       
	});       
	$('.label_check input:checked').each(function(){        
		$(this).parent('label').addClass('c_on');       
	});      
	};      
	if($('.label_radio input').length) {
		$('.label_radio').each(function(){        
			$(this).removeClass('r_on');       
		});       
		$('.label_radio input:checked').each(function(){        
			$(this).parent('label').addClass('r_on');       
		});      
	};     
	}          
$(function(){      $('body').addClass('has-js');
$('.label_check,.label_radio').click(function(){       
setupLabel();      
});     
setupLabel();     
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
    	<div class="Workcont_left">
        	<div class="tittle">第一章 地质学的研究对象</div>
            <div class="writer">作者：<span>舒良树</span></div>
            <div class="cont">
                <p>网页设计——网站是企业向用户和网民提供信息（包括产品和服务）的一
种方式，是企业开展电子商务的基础设施和信息平台，离开网站（或者只是利
用第三方网站）去谈电子商务是不可能的。企业的网址被称为"网络商标"，
也是企业无形资产的组成部分，而网站是INTERNET上宣传和反映企业形象和文
化的重要窗口。</p>
    <p>Web站点的设计是展现企业形象、介绍产品和服务、体现企业发展战略的重
要途径，因此我们必须明确设计站点的目的和用户的需求，从而做出切实可行
的设计方案。我们会根据消费者的需求、市场的状况、企业自身的情况等进行
综合分析，以"消费者"为中心，而不是以"美术"为中心的进行设计规划。</p>
<p>网站制作设计和域名注册查询是根据它设定的目标在一个商业网站的情况下,网
页设计的定义是根据它设定的目标:企业网站制作的主要目的是增加供应和品牌
的知名度。</p>
<p>在设计规划时我们会考虑：</p>
<p>建设网站的目的是什么？</p>
<p>为谁提供服务和产品？</p>
<p>企业能提供什么样的产品和服务给客户？</p>
<p><p>网站[1]的目标消费者和受众的特点是什么？</p>
企业产品和服务适合什么样的表现方式（风格）？</p>
<p>在设计规划时我们会考虑：</p>
<p>建设网站的目的是什么？</p>
<p>为谁提供服务和产品？</p>
<p>企业能提供什么样的产品和服务给客户？</p>
<p><p>网站[1]的目标消费者和受众的特点是什么？</p>
企业产品和服务适合什么样的表现方式（风格）？</p>
            </div>
            
            <div class="workcont_page">
            	<ul>
                	<li><a href="">[上一页]</a></li>
                	<li><a href="My4D_view.html">[回目录]</a></li>
                	<li><a href="">[下一页]</a></li>
                </ul>
            </div>
        </div>
    	<div class="Workcont_right">
        

    <DIV class="leftTitle">
        <UL>
            <LI class="active" id="tab1"><A onmouseover=javascript:slay(1) href="javascript:slay(1)">&nbsp;练&nbsp;&nbsp;&nbsp;&nbsp;习&nbsp;</A></LI>
            <LI id="tab2"><A onmouseover=javascript:slay(2) href="javascript:slay(2)">添加摘抄</A></LI>
            <LI id="tab3"><A onmouseover=javascript:slay(3) href="javascript:slay(3)">添加批注</A></LI>
            <LI id="tab4"><A onmouseover=javascript:slay(4) href="Add_Discuss.html" target="_self">发起讨论</A></LI>
        </UL>
    </DIV>
    
    <DIV id="tabcont1" >
    <form>
    	<div class="practise_tittle">&nbsp;&nbsp;1.什么是拖延症？</div>
        <div class="practise_answer"><textarea name="text1"></textarea></div>
    	<div class="practise_tittle">&nbsp;&nbsp;2.怎么解决自身存在的拖延症？</div>
        <div class="practise_answer"><textarea name="text1"></textarea></div>
    	<div class="practise_tittle">&nbsp;&nbsp;3.如何改变自己？</div>
        <div class="practise_answer"><textarea name="text1"></textarea></div>
    	<div class="practise_tittle">&nbsp;&nbsp;4."事实就是"是出自哪一部典籍？</div>
        <div class="practise_answer">
            <span>
                <label for="radio-01" class="label_radio">      
                    <input type="radio" checked="" value="1" id="radio-01" name="sample-radio" /> A、 《左传》      
                </label>  
            </span>
            <span>
                <label for="radio-02" class="label_radio">      
                    <input type="radio" checked="" value="2" id="radio-02" name="sample-radio" /> B、 《战国策》     
                </label>  
            </span>        
            <span>
                <label for="radio-03" class="label_radio">      
                    <input type="radio" checked="" value="3" id="radio-03" name="sample-radio" /> C、 《史记》      
                </label>  
            </span>
            <span>
                <label for="radio-04" class="label_radio">      
                    <input type="radio" checked="" value="4" id="radio-04" name="sample-radio" /> D、 《汉书》  
                </label>  
            </span> 
        </div>  
    	<div class="practise_tittle">&nbsp;&nbsp;4."事实就是"是出自哪一部典籍？多选</div>
        <div class="practise_answer">
            <span>
                <label for="checkbox-01" class="label_check">       
                <input type="checkbox" checked="" value="1" id="checkbox-01" name="sample-checkbox-01" />多选1      </label>  
            </span>
            <span>
                <label for="checkbox-02" class="label_check">       
                <input type="checkbox" value="2" id="checkbox-02" name="sample-checkbox-02" />多选2      </label>     
            </span>        
            <span>
                <label for="checkbox-03" class="label_check">       
                <input type="checkbox" value="3" id="checkbox-03" name="sample-checkbox-03" />多选3      </label>     
            </span>
            <span>
                <label for="checkbox-04" class="label_check">       
                <input type="checkbox" value="4" id="checkbox-04" name="sample-checkbox-04" />多选4      </label>     
            </span> 
        </div>   
        <div class="submit"><input type="submit" name="submit" class="submit1" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /></div>
                   
    </form>
    </DIV>				
   
    <DIV id="tabcont2" style="DISPLAY: none;">
        <div class="extract">
        	<ul>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><摘抄></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            </ul>
        </div> 
        

    </DIV>			
  
    <div id="tabcont3" style="DISPLAY: none;">
        <div class="extract">
        	<ul>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            	<li><span class="l"><批注></span><span class="r">做出改变和学会一种新的行为模式是一个循序渐进的过程</span></li>
            </ul>
        </div> 
    </div>
    <div id="tabcont4" style="DISPLAY: none;">
    </div>
        
        
        </div>
     </div>
     <div class="foot2">Copyright© 2012 Open Vision. 版权所有&nbsp;&nbsp;</div>
</div>

</body>
</html>
