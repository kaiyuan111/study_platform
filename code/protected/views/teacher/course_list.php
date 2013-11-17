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
								<a href="/teacher/createcourse?courseid=<?php echo $value['id'];?>"><img src="/images/frame/im21.jpg" width="36" height="24" border="0" /></a>
								<a href="javascript: void(0)" onclick="return deleteItem(<?php echo $value['id'];?>);"><img src="/images/frame/im22.jpg" width="30" height="24" border="0" /></a>
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
						<?php foreach ($assistCourse as $key => $value) {?>
						<?php if (!isset($priviCourseList[$value['id']])){?>
                        <li><span><a class='request_edit' data-id='<?php echo $value['id']?>'  href="javascript: void(0)">申请编辑</a></span><?php echo $value['name']?></li>
						<?php }else{?>
						<li><span><a class='' data-id='<?php echo $value['id']?>'  href="/teacher/managecourse?courseid=<?php echo $value['id'];?>">编辑</a></span><?php echo $value['name']?></li>
						<?php }?>
						<?php }?>
					</ul>
			</div>
		</div>
	</div>				
				
				
				
	<div style="height:30px"></div>				
<!-- 页码开始-->
 <!--   	<div class="meneame">
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
</div>

<script type="text/javascript">
function deleteItem(id)
{
    var data = 'id=' + id;
	$.ajax({
		type : 'post',
		data : data,
		dataType : 'json',
		url : '/teacher/deletecourse',
		success: function(retData)
		{
			if(retData.retCode == 0)
			{
    			alert(retData.msg);
    			window.location.reload();
			}
		}
	})
}

$(function() {
    $( "#tabs" ).tabs();
    $("a.request_edit").on('click',function() {
        courseid = $(this).data("id");
        $.post( '/teacher/requestedit',
                { 
                    "courseid" : courseid,
                },
                function(data) {
                    alert(data);
                }
        );
    });
});
</script>
