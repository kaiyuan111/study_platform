<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>我的批注</span></div>
	<div class="search_classs">
        <p>选择查看</p>
        <form class="jqtr" action="#">
            <select name="courseid" id="courseselect">
            	<option value="0" <?php if ($courseId == 0){?> selected="true" <?php }?>>请选择课程</option>
            	<?php foreach ($courseList as $key => $value) {?>
                <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?>&nbsp;</option>
                <?php }?>
            </select>
           
            <input type="submit" value="&nbsp;确&nbsp;定&nbsp;" />
        </form>
    </div>
    <div class="cont2">
      	<div class="My_tittle">批注列表</div>
        <div class="Discuss_list" id="wrapper">
        	<ul class="menu">
        		<?php $i = 1;foreach ($annotationList as $key => $value){?>
            	<li class="item1" id="list<?php echo $i;?>"><a href="#list<?php echo $i;?>"><?php echo $value['title'];?> </a>
                	<ul>
                    	<div class="Mypostil_cont">
                          	<div class="Mypostil_cont_li">
                          	  <?php foreach ($value['content'] as $eachContent) {?>
                              <b>批注：<?php echo $eachContent;?></b><br />
                              <?php }?>
	                              <div class="link">
	                              <a href="/student/learndetail?chapterid=<?php echo $key;?>">详情请见原文<i></i></a>
	                              </div>
                            </div>
                         </div>                                                                
                    </ul>
                </li>
                <?php $i++;}?>
          </ul>
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
	     </div> -->
	     
	</div>
</div>

<script type="text/javascript">
//var courseCatalogues =  <?php //echo json_encode($courseCatalogues);?>;
/*function chaptercontent()
{
	var courseId = $('#courseselect').val();
	$('form.jqtr').children().eq(1).remove();
	var courseCatalogue = courseCatalogues[courseId];
	//console.log(courseCatalogue);return ;
	var html = '<select name="select2" id="chapterselect"><option value="0" selected="true">请选择章节</option>';
	//$('#chapterselect').empty();
	//$("#chapterselect").append("<option value='0' selected='true'>请选择章节</option>");
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
};*/
</script>