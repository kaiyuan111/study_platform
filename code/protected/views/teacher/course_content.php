<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>内容管理</span></div>		
	<div id="newz_k_top3">
		<div class="blue3">
		<div class="blue3_kc"><span style="color:#888787">课程名称</span></div>
		<div class="right_sous3">
    		<form class="jqtr" id="form" name="form" method="post" action="/teacher/managecourse">
    			<div id="uboxstyle" >
	  			<select name="courseid" id="language" style="width:120px">
	    			<option value="0">请选择</option>
	    			<?php foreach ($courseList as $key => $value){?>
	    				<option value="<?php echo $value->id;?>" <?php if (!empty($currentCourse) && $value->id == $currentCourse['id']){?> selected="selected" <?php }?>><?php echo $value->name;?></option>
	    			<?php }?>
	  			</select>
    			</div>
    		</form>
    	</div>
		<div class="queding3" id="queding3">
		<a href="#"><img src="/images/frame/im15.jpg" width="83" height="32" border="0" /></a>
		</div>
		</div>
	</div>
			
			
	<div class="cont_b">
   	<div class="tittle_b">章节目录
   	<?php if (!empty($currentCourse)){?>
   	<div class="kc_right1" id="add_content"><a href="/teacher/addcontent?courseid=<?php echo $currentCourse['id'];?>"><img src="/images/frame/im09.jpg" width="84" height="31" border="0" /></a></div>
   	<?php }?>
   	</div>
   	
   	<?php if (empty($currentCourse))
   		{ 
   			echo "请选择课程";
   		}
   		 else
   		 { 
   		 	if (empty($currentCourseContent)){echo "还没有任何内容，请先添加内容"; } else {
   		 	 foreach ($currentCourseContent as $key => $value){?>
   		 
    <div id="f2">
	    <div class="kecheng">
		<ul id="sidelist2">
			
			<li>
				<span>
				<a href="/teacher/addcontent?chapterid=<?php echo $value['id']?>&courseid=<?php echo $currentCourse['id'];?>">
				<img src="/images/frame/im21.jpg" width="36" height="24" border="0" />
				</a>
				<a href="#">
				<img src="/images/frame/im22.jpg" width="30" height="24" border="0" />
				</a></span><?php echo $value['title'];?>
			</li>
		</ul>
		</div>
	</div>
	<?php }}}?>
	<div style="height:50px"></div>
	<div class="clear"></div>
<!-- 页码开始-->
<!--  	<div class="meneame">
        <div align="right">
        <span class="disabled"></span>
        <span class="current">1</span>
        <a href="#?page=2">2</a>
        <a href="#?page=3">3</a>
        <a href="#?page=4">4</a>
        <span class="disabled_right"></span>
        </div>
	</div>-->
<!-- 页码结束-->
    </div>
	<div class="newz_k_foot"></div>
</div>

<script language="javascript">
$('#queding3').click(function(){
	$('#form').submit();
})
</script>