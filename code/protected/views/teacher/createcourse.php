<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>课程管理</span>
	<!--  <div class="right_top_sous">
	<form action="#">
    	<ul>
        	<li class="li"><span class="k">
       	  	<input name="name" type="text" size="21"/>
        	<a href="#"><img src="images/im11.jpg" width="71" height="31" border="0" class="right_top_anniu" /></a></span></li>
        </ul>
    </form> 
	</div>-->
	</div>
 	<div class="cont">
     	<div class="tittle_a">创建课程</div>
         <div class="form">
         	<form class='jqtr' action="/teacher/savecourse" method="post">
             	<ul>
                 	<li class="li"><span class="h">课程名称&nbsp;：<font color="#cb0000">*&nbsp;&nbsp;</font></span><span class="k">
                 	<input type="text" name="name" class="input" size="29"/></span>
                 	</li>
                 	<li class="o_none"><span class="h">所属科目&nbsp;：<font color="#cb0000">*&nbsp;&nbsp;</font></span>
                 		<span class="k_a">
                             <select name="classid" style="width:150px">
                                 <option value="0">选择你想要的科目&nbsp;</option>
                                 <?php foreach ($couseClass as $key => $value){?>
                                 <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?>&nbsp;</option>
                                 <?php }?>
                             </select>
                         </span>
           				<div class="right_tianjia">
                        <div align="left"><a href="javascript:void(0)" id="addcourseclass">+ 添加科目</a></div>
                    	</div>
                    </li>
                 	<li class="li"><span class="h">课程简介&nbsp;：<font color="#cb0000">*&nbsp;&nbsp;</font></span><span >
                 	<textarea name="desc" cols="49" rows="10" ></textarea>
                 	</span></li>
                 </ul>
             <div class="submit"><input type="submit" value="&nbsp;&nbsp;确&nbsp;&nbsp;定&nbsp;&nbsp;" /></div>
             </form>         	
         </div>
         <div id="editDiv" style="display:none;position: absolute;width:680px; height:100px; left: 30px;top: 140px;z-index:10"><p style="color:red">请输入科目：</p>
         <textarea name="content" style="width:680px;height:40px;"></textarea>
         <input id="inputButton" type="submit" style="width:84px; height:33px; background:url(/images/frame/submit_on.png) no-repeat; border:0;" value=""  />
         </div>
     </div>
</div>

<script charset="utf-8" src="/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/kindeditor/lang/zh_CN.js"></script>
<link rel="stylesheet" href="/kindeditor/themes/default/default.css" />
<script language="javascript">
$("#addcourseclass").click(function(){
 	var editDom = $('#editDiv');
	editDom.css('display','block');
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			allowFileManager : true
		});
	});
})
$("#inputButton").click(function(){
			var content = $('textarea[name="content"]').val();
			$.ajax({
				type : 'post',
				data : 'name=' + content,
				dataType : 'json',
				url : '/teacher/savecourseclass',
				success: function(data)
				{
					if(data.retCode == 0)
					{
						alert("添加成功");window.location.reload();
					}
				}
			});
		})
		
		
</script>
