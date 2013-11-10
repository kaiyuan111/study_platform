<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>创建小组</span></div>
    <div class="cont">
    <div class="tittle">新建小组</div>
    <div id="errorinfo">
    <span class='tip'>  </span>
    </div>
        <div class="form">
        	<form class="jqtr" action="/teacher/creategroup" method='post' enctype="multipart/form-data" >
            	<ul>
                	<li class="li"><span class="l">小组名称&nbsp;:&nbsp;&nbsp;&nbsp;<font color="#cb0000">*</font></span><span class="r"><input type="text" name="name" class="input" size="31"/></span></li>
                	<li class="o_none"><span class="l">选择课程&nbsp;:&nbsp;&nbsp;&nbsp;<font color="#cb0000">*</font></span><span class="r">
                            <select name="courseid">
                                <?php foreach($course_list as $c) { ?>
                                <option value="<?php echo $c['id'] ?>"><?php echo $c['name'] ?>&nbsp;</option>
                                <?php } ?>
                            </select>
                        </span>
                    </li>
                	<li class="li"><span class="l">小组简介&nbsp;:&nbsp;&nbsp;&nbsp;<font color="#cb0000">*</font></span><span class="r"><textarea name="description" cols="49" rows="10" ></textarea></span></li>
                	<!--  <li class="li mt190"><span class="l">上传图标&nbsp;:&nbsp;&nbsp;&nbsp;<font color="#FFF">*</font></span><span class="r"><input type="text" name="logo" class="input" size="21" /><img src="/images/frame/file.png" /><input type="file" name="file" id="f"  name="f" style="position:absolute; filter:alpha(opacity=0); opacity:0; margin-left:-70px; width:70px; height:30px; "/></span></li>-->
                	<li class="li"><span class="l">小组人数&nbsp;:&nbsp;&nbsp;&nbsp;<font color="#FFF">*</font></span><span class="r f18">12人/组</span></li>
                	<li class="li"><span class="l">加入方式&nbsp;:&nbsp;&nbsp;&nbsp;<font color="#cb0000">*</font></span><span class="r f14">
                    <label for="radio-01" class="label_radio">      
                        <input type="radio" checked="" value="1" id="radio-01" name="jointype" />自由加入      
                    </label>  
                    <label for="radio-02" class="label_radio">      
                        <input type="radio" checked="" value="2" id="radio-02" name="jointype" />审核加入      
                    </label>                              
                    </span></li>
                </ul>
            	<div class="submit">
            	<button class="create_submit" id="create"  name='create' type="button" />&nbsp;&nbsp;创&nbsp;&nbsp;建&nbsp;&nbsp;</button>
            	</div>
            </form>
	</div>
    </div>
</div>

<script>
(function($) {
	tip = '<?php if(!empty($tip)) echo $tip;?>';
	if(tip != '') {
		alert(tip)
	}
    $("#create").on('click',function() {
        $("#errorinfo").children().empty();
        if($("input[name=name]").val().length==0) {
            $("#errorinfo").append("<span class='tip'>请填写小组名称<span>");
        } else if($("textarea[name=description]").val().length==0) {
            $("#errorinfo").append("<span class='tip'>请填写小组简介<span>");
        } else {
            $('form').submit();
        }
    });
    $('#f').change(function() {
        $v = $(this).val();
        $('input[name=logo]').val($v);
    });
})(jQuery);
</script>
