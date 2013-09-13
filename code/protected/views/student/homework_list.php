<div class="Add_Class_content">
  	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>我的作业</span></div>
	<div class="search_classs">
        <p>选择查看</p>
        <form class="jqtr" action="/student/homeworklist">
            <select name="courseid" onchange="return chaptercontent()" id="courseselect">
            	<option value="0">请选择课程&nbsp;</option>
            	<?php foreach ($courseList as $key => $value) {?>
            		<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?>&nbsp;</option>
            	<?php }?>
            </select>
            <select name="chapterid" id="chapterselect">
            	<option value="0">请选择章节&nbsp;</option>
            </select>
            <input type="submit" value="&nbsp;确&nbsp;定&nbsp;" />
        </form>
    </div>
    <div class="cont2">
    	<div class="My_tittle">作业列表</div>
        <div class="Discuss_list" id="wrapper">
        	&nbsp;&nbsp;&nbsp;&nbsp;<a href="/student/learndetail?chapterid=<?php echo $chapterId;?>" target="_blank" style="font-size:200%">重新学习作答</a><br /><br />
	        <div class="">
                <div class="Work_input">
                	<?php $i = 0;foreach ($homework as $key => $value) { $i++;?>
                	<div class="Work_li"><?php echo $i;?>、<?php echo $value['title'];?><br />
                	<?php if ($value['type'] == 1 || $value['type'] == 2) {
                        	 	for ($k = 0; $k < 4; $k++ ) {echo $optionMap[$k] . '、';echo $value['option'][$k]; echo '&nbsp;';}}?> <br />
                            	答：<?php echo $answer[$key]['answer'];?>
                        <div class="Myreview">点评：<?php echo $answer[$key]['remark'];?></div>
                    </div>
                	<?php }?>
                </div>                                                                
	        </div>
        </div>
		<!--  <div class="page">
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
				var html = '<select name="chapterid" id="groupselect" ><option value="0" selected="true">请选择章节</option>';
				
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
</script>