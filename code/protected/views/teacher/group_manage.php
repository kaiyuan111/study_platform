<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>小组管理</span></div>
	<div class="search_classs">
		<p>选择小组</p>
	       <form class="jqtr" action="/teacher/managegroup">
	           <select id='coursechoose' name="course" >
                   <?php foreach($courses as $c) { ?>
                   <option value="<?php echo $c['id'];?>"><?php echo $c['name'];?>&nbsp;</option>
                   <?php } ?>
	           </select>
	           <select id='groupchoose' name="group">
	           </select>
	           <input type="submit" value="&nbsp;确&nbsp;定&nbsp;" />
	       </form>
      </div>
      <div class="cont2">
      	<div class="search_tittle">人员列表</div>
        <div class="staff_list">
            <div class="t">学员（未分组）</div>
            <ul id='wait_student_list'>
            <?php foreach($students as $s) { ?>
            <li class='student' data-id="<?php echo $s['uid'];?>"><?php echo $s['uname'];?></li>
            <?php } ?>
            </ul>
        </div>
        <div class="staff_list">
            <div class="t">学员（已分组）</div>
            <div class="team"><span id='leader'>
                <li class="groupleader" data-id="<?php echo isset($groupleader['uid'])?$groupleader['uid']:'';?>" style='display:inline'>
                    <?php echo isset($groupleader['uname'])?$groupleader['uname']:'';?>
                </li></span>-组长</div>
            <ul id='choosed_student_list' style="height:156px;">
                <?php foreach($groupmembers as  $s) { ?>
                <li class='student' data-id="<?php echo $s['uid'];?>"><?php echo $s['uname'];?></li>
                <?php } ?>
            </ul>
        </div>
          <div class="staff_list">
          	<div class="t">助教（未分组）</div>
          	<ul id="wait_teacher_list">
                <?php foreach($teachers as  $s) { ?>
                <?php if($s['ingroup']==0) { ?>
                <li class='teacher' data-id="<?php echo $s['uid'];?>"><?php echo $s['uname'];?></li>
                <?php } ?>
                <?php } ?>
            </ul>
          </div>
          <div class="staff_list">
            <div class="t">助教（已分组）</div>
            <ul id="choosed_teacher_list">
                <?php foreach($teachers as  $s) { ?>
                <?php if($s['ingroup']==1) {?>
                <li class='teacher' data-id="<?php echo $s['uid'];?>"><?php echo $s['uname'];?></li>
                <?php } ?>
                <?php } ?>
            </ul>                	
          </div>    
      <div class="referring">         
          <form class="jqtr">   
              <input id="savemember" type="button" value="&nbsp;确&nbsp;定&nbsp;" />
          </form>       
      </div>    
    </div>
</div>

<script>
(function($){
    $(document).bind('contextmenu',function(e){ 
        return false; 
    }); 
    // 设置学生
    $(".student").on('mousedown',function(e) {
        // 左键点击，设定组员
        if(1==e.which) {
            $(this).removeClass("groupleader");
            $(this).addClass("student");
            if($(this).parent("ul").attr("id")=="choosed_student_list") {
                $(this).appendTo("#wait_student_list");
            } else {
                $(this).appendTo("#choosed_student_list");
            }
        } else {
            $("#leader li").appendTo("#wait_student_list");
            $(this).css({"display":"inline"});
            $(this).removeClass("student");
            $(this).addClass("groupleader");
            $(this).appendTo("#leader");
        }
    });
    // 设置助教
    $(".teacher").on('mousedown',function(e) {
        // 左键点击，设定组员
        if(1==e.which) {
            if($(this).parent("ul").attr("id")=="choosed_teacher_list") {
                $(this).appendTo("#wait_teacher_list");
            } else {
                $(this).appendTo("#choosed_teacher_list");
            }
        }
    });

    // 获取某课程下的小组列表并展示
    $("#coursechoose").on('change',function(e){
        val = $(this).find("option:selected").val();
        $.getJSON(
            '/teacher/getgroups',
            { "courseid":val },
            function(data) {
                lis = "";
                for(d in data) {
                    lis += "<option value='"+data[d]['id']+"'>"+data[d]['name']+"</option>";
                }

                // 填充内容
                $("#groupchoose").html(lis);
                // 初始化小组select
                $("#groupchoose").jqTransSelectInit("<?php echo $curgroup?>");
            }
        );
    });

    // 初始化课程select
    $("#coursechoose").jqTransSelectInit("<?php echo $curcourse?>");

    // 提交结果
    $(document).delegate("#savemember", 'click',function() {
        uids = "";
        $("#choosed_teacher_list li.teacher,#choosed_student_list li.student").each(function(index) {
            uids += $(this).data("id")+",";
        });
        leaderid = $("#leader li.groupleader").data("id");
        //console.log(leaderid);
        uids += leaderid;
        groupid = "<?php echo $curgroup?>";
        $.post( '/teacher/savegroupmember',
                { 
                    "groupid" : groupid,
                    "leaderid" : leaderid,
                    "uids" : uids
                },
                function(data) {
                    alert(data);
                }
        );
    });


})(jQuery)
</script>
