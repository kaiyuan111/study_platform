<div class="Add_Class_content">
	<div class="top_a">
		<div align="left"><img src="/images/frame//cont_home.png" align="absmiddle" class="home" /><span>课程管理</span></div>
	</div>
    <div class="cont">
		<div id="tabs">
		<div id="newz_k_top_left"><img src="/images/frame/Add_Class_content_a.png" width="65" height="43" /></div>
		<div id="newz_k_top2">
			<ul >	
			<li><a href="#tabs-1">我的课程</a>&nbsp;|&nbsp;</li>
			<li><a href="#tabs-2">其他课程</a></li>
			</ul>
		</div>
		<div class="kc_right"><a href="/teacher/createcourse"><img src="/images/frame/im9.jpg" width="84" height="31" border="0" /></a></div>
		<div class="xian_a"></div>	
		<div class="clear"></div>	
		<div id="tabs-1">
			<div class="kecheng">
				<!--  <div class="biaoti14">计算机科学类</div>-->
					<ul id="sidelist">
						<?php foreach ($courseList as $key => $value) {?>
						<li>
							<span>
								<a href="/teacher/managecourse?courseid=<?php echo $value['id'];?>"><img src="/images/frame/im21.jpg" width="36" height="24" border="0" /></a>
								<a href="#"><img src="/images/frame/im22.jpg" width="30" height="24" border="0" /></a>
							</span><?php echo $value['name'];?>
						</li>
						<?php }?>
					</ul>
			</div>
		</div>
		<div id="tabs-2">		
			<div class="kecheng">
				<!--  <div class="biaoti14">计算机科学类</div>-->
					<ul id="sidelist">
						<li><span><a href="#">申请编辑</a></span>网页设计</li>
						<li><span><a href="#">申请编辑</a></span>网页设计</li>
						<li><span><a href="#">申请编辑</a></span>网页设计</li>
					</ul>
			</div>
		</div>
	</div>				
				
				
				
	<div style="height:30px"></div>				
<!-- 页码开始-->
	<div class="meneame">
        <div align="right">
        <span class="disabled"></span>
        <span class="current">1</span>
        <a href="#?page=2">2</a>
        <a href="#?page=3">3</a>
        <a href="#?page=4">4</a>
        <span class="disabled_right"></span>
    	</div>
	</div>
<!-- 页码结束-->						
	</div>
</div>

<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>