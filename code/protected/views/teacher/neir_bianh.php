<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>内容管理</span></div>
        <div class="cont_e">
          <div class="tittle_e">编辑内容</div>
          <div class="form_a">
            <div class="biaoti16">课题名称：<?php echo $currentCourse['name'];?></div>
            <form id="coursecontent" method="post" action="/teacher/savecontent">
            <div class="biaoti15">
              <div class="w">编辑内容:</div>
              <div class="r">
                <div id="r_top">
                  <div style="width:96%" class="bianji">
                  <input name="chapterid" value="<?php if ($chapterId) {echo $chapterId;}else{echo 0;}?>" type="hidden" />
				  <input name="title" type="text" id="bianji" value="<?php if ($courseContent){echo $courseContent['title'];}?>" />
				  <input name="courseid" type="hidden" value="<?php echo $courseId;?>"/> 
				</div>
                </div>
               <!--  <textarea name="content" id="editorContent"><?php if ($courseContent){echo $courseContent['content'];}?></textarea>-->
               <div id="editDiv"><textarea name="content"><?php if ($courseContent){echo $courseContent['content'];}?></textarea>
              </div>
              </div>
            </div>
            </form>
            <div class="biaoti17" id="submitcontent"><a href="javascript:void(0)"><img src="/images/frame/im39.jpg" width="81" height="31" border="0" /></a></div>
            <form class="jqtr" action="#">
              <ul>
                <div class="blue3_bjxt"><span style="color:#666666">编辑习题：</span></div>
                <li class="o_none"><span class="blue4_bjxt">
                  <select name="questiontype" style="width:150px" id="questiontype" onchange="toggleXuanzeti()">
                    <option value="1" selected="selected"> 单选题</option>
                    <option value="2">多选题</option>
                    <option value="3">问答题</option>
                  </select>
                </span><span class="l">&nbsp;&nbsp;&nbsp;</span></li>
              </ul>
              <?php $i = 0; if (!empty($homework)) {?>
              <div style="width:90%" id="xuanxiang_xx">
                <?php foreach ($homework as $key => $value) { $i++;?>
                <!-- 问题1 开始-->
                <div id="xuanxiang_x">
                  <div class="xuanxiang"><span><?php echo $i;?></span> <span id="homeindex_<?php echo $value['id'];?>"><?php echo  '. ' . $value['title'];?></span></div>
                  <div class="xuanxiang_im edit" homeworkid="<?php echo $value['id'];?>"><a href="javascript:void(0)"><img src="/images/frame/im40.jpg" width="18" height="18" /></a></div>
                  <div class="xuanxiang_im delete" homeworkid="<?php echo $value['id'];?>"><a href="javascript:void(0)"><img src="/images/frame/im41.jpg" width="18" height="18" /></a></div>
                </div>
                <?php if ($value['type'] == 1 || $value['type'] == 2){?>
                <div id="xuanxiang_y">
				<div class="xuanxiang" id="optionindex_<?php echo $value['id'];?>">A.<?php echo $value['option'][0]?>&nbsp;B.<?php echo $value['option'][1]?>&nbsp; C.<?php echo $value['option'][2]?>&nbsp; D.<?php echo $value['option'][3]?></div>
				</div>
                <?php }}?>
                <!-- 问题1 结束-->
              </div>
              <?php }else{?>
              <div id="xuanxiang_xx"><div id="xuanxiang_x"></div></div>
              <?php }?>
              <div class="xuanxiang">
                <ul>
                	<div class="blue3_bjxt">  <span>题目:</span></div>
                  <li class="li"><span class="r">
                    	<input name="questiontitle" type="text" value="" size="31"/>
                    	<input name="homeworkid" type="hidden" value="0"/> 
                  </span></li>
                  <div id="xuanzeti" >
                  <li class="li" >
				  <div class="zimu">
				  <div class="zimu_left">A</div>
				  <div class="zimu_right"><span ><input name="optiona" type="text" class="input" size="31"/></span></div>
				  </div>
				  </li>
				   <li class="li">
				  <div class="zimu">
				  <div class="zimu_left">B</div>
				  <div class="zimu_right"><span ><input name="optionb" type="text" class="input" size="31"/></span></div>
				  </div>
				  </li>
				   <li class="li">
				  <div class="zimu">
				  <div class="zimu_left">C</div>
				  <div class="zimu_right"><span ><input name="optionc" type="text" class="input" size="31"/></span></div>
				  </div>
				  </li>
				   <li class="li">
				  <div class="zimu">
				  <div class="zimu_left">D</div>
				  <div class="zimu_right"><span ><input name="optiond" type="text" class="input" size="31"/></span></div>
				  </div>
				  </li>
				  </div>
                </ul>
              </div>
              
            </form>
            <!-- 页码开始-->
            <!-- 页码结束-->
          </div>
          <div class="biaoti19" id="submithomework"><a href="javascript:void(0)"><img src="/images/frame/im39.jpg" width="81" height="31" border="0" /></a></div>
          <div class="clear"></div>
          
        </div>
		<!--  <div class="newz_k_foot"></div>-->
      </div>
      <!-- 返回按钮 开始-->
        <div class="fanhui"><img src="/images/frame/im42.jpg" width="96" height="33" border="0" onclick="javascript:history.back();"/></div>
      
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<SCRIPT type="text/javascript" src="/ueditor/ueditor.all.js"></SCRIPT> 
<script charset="utf-8" type="text/javascript" src="/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" type="text/javascript" src="/kindeditor/lang/zh_CN.js"></script>
<link rel="stylesheet" href="/kindeditor/themes/default/default.css" />
<SCRIPT type=text/javascript>  
    //var editor = new UE.ui.Editor();  
    //editor.render("editorContent");  
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		allowFileManager : true
	});

	//$('textarea[name="content"]').css('width','700px');
	$('div.ke-container.ke-container-default').css('width','600px');
	$('div.ke-edit').css('height','500px');
	$('iframe').css('height','500px');
});

    var start = <?php echo $i;?>;
    start++;
    $("#submitcontent").click(function()
    	    {
    			editor.sync();
	    		var title = $('input[name="title"]').val();
	    		var courseid = $('input[name="courseid"]').val();
	    		var content = $('textarea[name="content"]').val();
	    		var chapterid = $('input[name="chapterid"]').val();
	    		$.ajax({
					type : 'post',
					data : 'content=' + content + '&courseid=' + courseid + '&title=' + title + "&chapterid=" + chapterid,
					dataType : 'json',
					url : '/teacher/savecontent',
					success: function(data)
					{
						if(data.retCode == 0)
						{
							if(data.info.id)
							{
								$('input[name="chapterid"]').attr('value', data.info.id);
							}
							alert("添加成功,返回添加新的章节或者继续编辑当前章节");
						}
						else
						{
							alert(data.msg);
						}
					}
				});;
	    	})
	
	$("#submithomework").click(function()
    	    {
	    		
	    		var chapterid = $('input[name="chapterid"]').val();
	    		if(chapterid == 0)
	    		{
		    		alert("请先填写并保存内容再编辑作业，谢谢");
		    		return;
	    		}

				var homeworkid = $('input[name="homeworkid"]').val();
	    		
	    		var title = $('input[name="questiontitle"]').val();
	    		var type=$('#questiontype').val();
	    		if(type == 1 || type == 2)
	    		{
		    		var optiona = $('input[name="optiona"]').val();
		    		var optionb = $('input[name="optionb"]').val();
		    		var optionc = $('input[name="optionc"]').val();
		    		var optiond = $('input[name="optiond"]').val();

		    		var option = optiona + ",||" + optionb + ",||" + optionc + ",||" + optiond;
		    		var data = 'chapterid=' + chapterid + "&title=" + title + "&option=" + option + "&type=" + type + "&homeworkid=" + homeworkid;

		    	}
	    		else
	    		{
	    			var data = 'chapterid=' + chapterid + "&title=" + title + "&type=" + type + "&homeworkid=" + homeworkid;
	    		}
	    		
	    		$.ajax({
					type : 'post',
					data : data,
					dataType : 'json',
					url : '/teacher/savehomework',
					success: function(data)
					{
						if(data.retCode == 0)
						{
							if(data.info.id)  //添加内容
							{
								//$('input[name="homeworkid"]').attr('value', data.info.id);
								//将添加的内容放置到前面
								$('input[name="homeworkid"]').attr('value', 0);
								if(type == 1 || type == 2)
								{
									var domTmp = '<div id="xuanxiang_x"><div class="xuanxiang"><span>' + start + '</span> . <span id="homeindex_' + data.info.id + '">' + title + '</span></div><div class="xuanxiang_im edit" homeworkid=' + data.info.id + '><a href="javascript:void(0)"><img src="/images/frame/im40.jpg" width="18" height="18" /></a></div><div class="xuanxiang_im delete" homeworkid=' + data.info.id + '><a href="javascript:void(0)"><img src="/images/frame/im41.jpg" width="18" height="18" /></a></div></div>';
									domTmp += '<div id="xuanxiang_y"><div class="xuanxiang" id="optionindex_' + data.info.id + '">A.' + optiona + ' B.' + optionb + ' C.' + optionc + ' D.' + optiond + '</div></div>';
								}
								else
								{
									var domTmp = '<div id="xuanxiang_x"><div class="xuanxiang"><span>' + start + '</span> . <span id="homeindex_' + data.info.id + '">' + title + '</span></div><div class="xuanxiang_im edit" homeworkid=' + data.info.id + '><a href="javascript:void(0)"><img src="/images/frame/im40.jpg" width="18" height="18" /></a></div><div class="xuanxiang_im delete" homeworkid=' + data.info.id + '><a href="javascript:void(0)"><img src="/images/frame/im41.jpg" width="18" height="18" /></a></div></div>';
								}
								$('#xuanxiang_xx').append(domTmp);
								start++;
							}
							else  //更新内容
							{
								$('#homeindex_' + homeworkid).text(title);
								var tempOption = 'A.' + optiona + ' B.' + optionb + ' C.' + optionc + ' D.' + optiond;
								$('#optionindex_' + homeworkid).text(tempOption);
							}

							$('.xuanxiang_im.edit').click(edit);
							$('.xuanxiang_im.delete').click(dele);	
							
							$('input[name="questiontitle"]').attr('value', '');
							$('input[name="optiona"]').attr('value', '');
							$('input[name="optionb"]').attr('value', '');
							$('input[name="optionc"]').attr('value', '');
							$('input[name="optiond"]').attr('value', '');
							alert("添加成功,返回添加新的章节或者继续编辑当前章节");
						}
						else
						{
							alert(data.msg);
						}
					}
				});
	    	})
	    	
	    function edit()
	    {
			var homeworkid = $(this).attr('homeworkid');
			if(homeworkid == 0)
			{
				alert("作业id不能为空");
			}
			//$(this).remove();
			$.ajax({
				type : 'post',
				data : 'homeworkid=' + homeworkid,
				dataType : 'json',
				url : '/teacher/gethomework',
				success: function(data)
				{
					$('input[name="questiontitle"]').attr('value', data.info.title);
					$('input[name="optiona"]').attr('value', data.info.option[0]);
					$('input[name="optionb"]').attr('value', data.info.option[1]);
					$('input[name="optionc"]').attr('value', data.info.option[2]);
					$('input[name="optiond"]').attr('value', data.info.option[3]);
					$('input[name="homeworkid"]').attr('value', homeworkid);
				}
			}); 
		}
	
		$('.xuanxiang_im.edit').click(edit);

		
		function dele()
		{
			var inthis= this;
			if(!confirm("确定删除？"))
			{
				return ;
			}
			var homeworkid = $(this).attr('homeworkid');
			if(homeworkid == 0)
			{
				alert("作业id不能为空");
			}
			$.ajax({
				type : 'post',
				data : 'homeworkid=' + homeworkid,
				dataType : 'json',
				url : '/teacher/deletehomework',
				success: function(data)
				{
					var inparent = $(inthis).parent();
					var next = inparent.next();
					inparent.remove();
					if(next.attr('id') == 'xuanxiang_y')
					{
						next.remove();
					}
					$('input[name="questiontitle"]').attr('value', '');
					$('input[name="optiona"]').attr('value', '');
					$('input[name="optionb"]').attr('value', '');
					$('input[name="optionc"]').attr('value', '');
					$('input[name="optiond"]').attr('value', '');
				}
			}); 
		}
		
		$('.xuanxiang_im.delete').click(dele);	
				
	function toggleXuanzeti()
    {
    	var checkValue=$('#questiontype').val();
		
		if(checkValue == 3)
		{
			$('#xuanzeti').css('display', 'none');
		}
		else
		{
			$('#xuanzeti').css('display','block');
		}
    }
    
	
</SCRIPT> 
