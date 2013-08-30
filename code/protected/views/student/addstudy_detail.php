<div class="Add_Disuss_cont">
	<form action="/student/addstudydetail" method="post">
		<input type="hidden" name="type" value="<?php echo $type;?>" />
		<input type="hidden" name="chapterid" value="<?php echo $chapterid;?>" />
        <!--  <div class="del"><a href=""><img src="/images/frame/del_ico2.png" /></a>-->
        <?php if ($type == 3){?><div class="del"><span>讨论主题：</span><input name="text" type="text" size="25"  value=""/></div><?php }?>
        <?php if ($type == 1){?><div class="del"><span style="font-size:20px">摘抄内容：</span></div><?php }?>
        <?php if ($type == 2){?><div class="del"><span style="font-size:20px">批注内容：</span></div><?php }?>
		<div class="cont"><a href="/student/learndetail?chapterid=<?php echo $chapterid;?>">单击查看原文详情</a></div>
        <div class="content">
           <textarea name="content" style="width:670px;height:290px;visibility:hidden;"></textarea>
        </div>
        <?php if ($type == 3){?>
        <div class="checkbox">
           	<div class="t">选择讨论组的成员</div>
            <div class="all"><label for="checkbox-01">
                                             全选<input type="checkbox"  value="1" id="checkbox-01" name="sample-checkbox-01" /></label>
            </div>        
           	<ul>
               	<li>
                       <label for="checkbox-01" class="label_check">       
                       <input type="checkbox" checked="" value="1" id="checkbox-01" name="sample-checkbox-01" />多选1      </label>  
                </li>
               	<li>
                       <label for="checkbox-02" class="label_check">       
                       <input type="checkbox" value="2" id="checkbox-02" name="sample-checkbox-02" />多选2      </label>  
                </li>
               	<li>
                       <label for="checkbox-01" class="label_check">       
                       <input type="checkbox" value="1" id="checkbox-01" name="sample-checkbox-01" />多选1      </label>  
                </li>
               	<li>
                       <label for="checkbox-01" class="label_check">       
                       <input type="checkbox" value="1" id="checkbox-01" name="sample-checkbox-01" />多选1      </label>  
                </li>
               	<li>
                       <label for="checkbox-01" class="label_check">       
                       <input type="checkbox" value="1" id="checkbox-01" name="sample-checkbox-01" />多选1      </label>  
                </li>
               	<li>
                       <label for="checkbox-01" class="label_check">       
                       <input type="checkbox" value="1" id="checkbox-01" name="sample-checkbox-01" />多选1      </label>  
                </li>
               	<li>
                       <label for="checkbox-01" class="label_check">       
                       <input type="checkbox" value="1" id="checkbox-01" name="sample-checkbox-01" />多选1      </label>  
                </li>
               	<li>
                       <label for="checkbox-01" class="label_check">       
                       <input type="checkbox" value="1" id="checkbox-01" name="sample-checkbox-01" />多选1      </label>  
                </li>
               	<li>
                       <label for="checkbox-01" class="label_check">       
                       <input type="checkbox" value="1" id="checkbox-01" name="sample-checkbox-01" />多选1      </label>  
                </li>
               	<li>
                       <label for="checkbox-01" class="label_check">       
                       <input type="checkbox" value="1" id="checkbox-01" name="sample-checkbox-01" />多选1      </label>  
                </li>
               	<li>
                       <label for="checkbox-01" class="label_check">       
                       <input type="checkbox" value="1" id="checkbox-01" name="sample-checkbox-01" />多选1      </label>  
                </li>
               	<li>
                       <label for="checkbox-01" class="label_check">       
                       <input type="checkbox" value="1" id="checkbox-01" name="sample-checkbox-01" />多选1      </label>  
                </li>
            </ul>
        </div>
        <?php }?>
        <div class="submit"><input type="submit" value="&nbsp;确&nbsp;定&nbsp;"  /></div>
	</form>
</div>  

<script charset="utf-8" src="/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/kindeditor/lang/zh_CN.js"></script>
<link rel="stylesheet" href="/kindeditor/themes/default/default.css" />
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
		allowFileManager : true
	});
});
</script>