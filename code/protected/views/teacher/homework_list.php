<style type="text/css">
.Work_li {height:120px;}
</style>

<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>查看作业</span></div>
	<div class="search_classs">
        <p>选择查看</p>
        <form class="jqtr" action="/teacher/homeworkanswerlist">
            <select name="courseid" onchange="return chaptercontent()" id="courseselect">
            	<option value="0">请选择课程&nbsp;</option>
            	<?php foreach ($allCourse as $key => $value) {?>
            		<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?>&nbsp;</option>
            	<?php }?>
            </select>
            <select name="chapterid" onchange="return groupcontent()" id="chapterselect">
            	<option value="0">请选择章节&nbsp;</option>
            </select>
            <select name="groupid" id="groupselect">
            	<option value="0">请选择小组&nbsp;</option>
            </select>
            <input type="submit" value="&nbsp;确&nbsp;定&nbsp;" />
        </form>
    </div>
    <div class="cont2">
    	<div class="WORK_tittle">作业列表</div>
        <div class="Discuss_list" id="wrapper">
            <ul class="menu">
            	<?php foreach ($groupAnswer as $key => $value){?>
                <li class="item1" id="list_<?php echo $key;?>"><a href="#list_<?php echo $key;?>"><?php echo $userInfo[$key]['uname'];?> </a>
                   <ul>
                    <div class="list_top"></div>
                    <div class="list_cont">
                        <div class="Work_input">
                        	<?php $i = 0; foreach ($value as $eachKey => $eachAnswer){ $i++;?>
                        	<div class="Work_li"><?php echo $i;?>、<?php echo $homework[$eachKey]['title'];?><br />
                        	 <?php if ($homework[$eachKey]['type'] == 1 || $homework[$eachKey]['type'] == 2) {
                        	 	for ($k = 0; $k < 4; $k++ ) {echo $optionMap[$k] . '、';echo $homework[$eachKey]['option'][$k]; echo '&nbsp;';}}?> <br />
                            答：<?php echo $eachAnswer['answer'];?>
                        	<form action="" class="jqtr">
                        		<input type="hidden" value=<?php echo $eachAnswer['id'];?> />
                            	<span style="float:left">点评：</span>
                            	<input name="text" type="text" size="40"  value="" />
                            	<input type="button" value="&nbsp;发&nbsp;表&nbsp;" />
                            </form>
                            </div>
                            <?php }?>
                        </div>                                                                
                    </div>
                    <div class="list_bottom"></div>
                    </ul>
                </li>
                <?php }?>
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

<script type="text/javascript">
//处理联动
function chaptercontent()
{
	var courseId = $('#courseselect').val();
	//获取该课程的所有章节
	var data = 'cid=' + courseId;
	$.ajax({
		type : 'post',
		data : data,
		dataType : 'json',
		url : '/teacher/getcoursecontentbycid',
		success: function(retData)
		{
			//alert(retData.msg);
			if(retData.retCode == 0)
			{
				//在此处处理联动
				$('form.jqtr').children().eq(1).remove();
				var courseCatalogue = retData.info;
				//console.log(courseCatalogue);return ;
				var html = '<select name="chapterid" id="groupselect" onchange="return groupcontent()"><option value="0" selected="true">请选择章节</option>';
				
				if(courseId != 0)
				{
					for(var i=0; i < courseCatalogue.length; i++)
					{
						//$("#chapterselect").append("<option value='" + courseCatalogue[i].id + "'>" + courseCatalogue[i].title + "</option>"); 
						html += "<option value='" + courseCatalogue[i].id + "'>" + courseCatalogue[i].title + "</option>"
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
				$('form.jqtr').children().eq(2).remove();
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
				$('form.jqtr').children().eq(1).after(html);
				$('form.jqtr').attr('class', 'jqtr');
				$('form.jqtr').jqTransform({imgPath:'/images/frame/'});
			}
		}
	});
}

$(document).ready(function(){ 
	$('button[type="button"]').click(function(){
		//alert('hello,world');
		var id = $(this).parent().children().eq(0).val();
		var remark = $(this).parent().find('input[type="text"]').val();
		remark = $.trim(remark);
		
		if(remark == "")
		{
			alert("请填写点评");
			return false;
		}
		
		//保存点评
		var data = 'id=' + id + '&remark=' + remark;
		$.ajax({
			type : 'post',
			data : data,
			dataType : 'json',
			url : '/teacher/savehomeworkremark',
			success: function(data)
			{
				alert(data.msg);
			}
		});
	})
}); 

</script>