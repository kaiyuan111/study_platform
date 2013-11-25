<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>查看讨论</span></div>
	<div class="search_classs">
        <p>选择讨论</p>
        <form class="jqtr" action="/teacher/discusslist">
            <select name="courseid" onchange="return groupcontent()" id="courseselect">
            	<option value="0">请选择课程&nbsp;</option>
            	<?php foreach ($allCourse as $key => $value) {?>
            		<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?>&nbsp;</option>
            	<?php }?>
            </select>
            <select name="groupid" id="groupselect">
            	<option value="0">请选择小组&nbsp;</option>
            </select>
            <input type="submit" value="&nbsp;确&nbsp;定&nbsp;" />
        </form>
    </div>
    <div class="cont2">
    	<div class="Discuss_tittle">讨论列表</div>
        <div class="Discuss_list" id="wrapper">
        	<ul class="menu">
        		<?php foreach ($discussList as $key => $value) {?>
				<li class="item1" id="list<?php echo $key;?>"><a href="#list<?php echo $key;?>"><?php echo $value['title'];?> </a>
					     <ul>
						<div class="list_top"></div>
			            <div class="list_cont">
						<div class="t">关于<i><a target="_blank" href="/student/discussdetail?id=<?php echo $value['id'];?>"><?php echo $value['title'];?></a></i>这个主题（20130619）<p>由<i><?php echo $createUserInfo[$value['uid']]['uname'];?></i>发表</p><p>主题内容：<?php echo $value['content'];?></p></div>
						<?php if(!empty($discussReplys[$value['id']])) {?>
							<ul>
								<?php foreach($discussReplys[$value['id']] as $eachReplys) {?>
								<li><a ><?php echo $replyUserInfo[$eachReplys['uid']]['uname'];?></a><span> <?php echo date('Y-m-d G:i:s',$eachReplys['time']);?></span><br /><?php echo $eachReplys['comment'];?></li>
								<?php }?>
							</ul>
                            <?php }?>
			                <div class="Discuss_input">
								<form action="" class="jqtr">
									<input type="hidden" value="<?php echo $value['id'];?>" />
			                    	<input name="text" type="text" size="48" onfocus="if (value =='写下你的评论'){value =''}" onblur="if (value ==''){value='写下你的评论'}" value="写下你的评论"/><input type="button" value="&nbsp;发&nbsp;表&nbsp;" />
			                    </form>
			                </div>
			           </div>
					   <div class="list_bottom"></div>
				   </ul>
                </li>
                <?php }?>
           </ul>
       </div>
	<!--  	<div class="page">
          	<ul>
              	<li class="up"><a href="#">&nbsp;</a></li>
              	<li><a href="">1</a></li>
              	<li><a href="">2</a></li>
              	<li><a href="">3</a></li>
              	<li><a href="">4</a></li>
              	<li class="down"><a href="#">&nbsp;</a></li>
                  
              </ul>
	   </div>-->
    </div>
 </div>
 <script type="text/javascript">
 function groupcontent()
{
	var courseId = $('#courseselect').val();
	//获取该课程的小组
	var data = 'cid=' + courseId;
	$.ajax({
		type : 'post',
		data : data,
		dataType : 'json',
		url : '/teacher/getgroupbycid',
		success: function(retData)
		{
			//alert(retData.msg);
			if(retData.retCode == 0)
			{
				//在此处处理联动
				$('form.jqtr').children().eq(1).remove();
				var groupList = retData.info;
				//console.log(courseCatalogue);return ;
				var html = '<select name="groupid" id="groupselect"><option value="0" selected="true">请选择小组</option>';
				
				if(courseId != 0)
				{
					for(var i=0; i < groupList.length; i++)
					{
						//$("#chapterselect").append("<option value='" + courseCatalogue[i].id + "'>" + courseCatalogue[i].title + "</option>"); 
						html += "<option value='" + groupList[i].id + "'>" + groupList[i].name + "</option>"
					}
				}
				html += '</select>';
				$('form.jqtr').children().eq(0).after(html);
				$('form.jqtr').attr('class', 'jqtr');
				$('form.jqtr').jqTransform({imgPath:'/images/frame/'});
			}
		}
	});
}

$(document).ready(function(){ 
	$('button[type="button"]').click(function(){
		var id = $(this).parent().children().eq(0).val();
		var remark = $(this).parent().find('input[type="text"]').val();
		remark = $.trim(remark);

		if(remark == "")
		{       
			alert("请填写点评"); 
			return false;
		}       

		var data = 'id=' + id + '&content=' + remark; 
		$.ajax({
			type : 'post', 
				data : data, 
				dataType : 'json', 
				url : '/teacher/adddiscussreply',
				success: function(data)
		{       
			if(data.retCode == 0)
			{
				window.location.reload();
			}
			else
			{
				alert(data.msg);
			}
		}       
		});     
	})      
}); 
</script>
