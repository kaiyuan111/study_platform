<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>成员回复</title>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link href="css/css.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="stylesheet" href="jqtransformplugin/jqtransform.css" type="text/css" media="all" />

	<script type="text/javascript" src="requiered/jquery.js" ></script>
	<script type="text/javascript" src="jqtransformplugin/jquery.jqtransform.js" ></script>
	<script language="javascript">
		$(function(){
			$('form').jqTransform({imgPath:'images/'});
		});
	</script>

		<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
		<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
		<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true
				});
			});
		</script>

	</head>
	<body>
    <div class="content3">
    <div class="Add_Disuss_cont">
    	
		<form>
            <div class="del"><a href=""><img src="images/del_ico2.png" /></a><input name="text" type="text" size="25" onfocus="if (value =='主题名称'){value =''}" onblur="if (value ==''){value='主题名称'}" value="主题名称"/></div>
			<div class="cont">讨论背景：<br /><b>本文选摘自《网页设计》一书第四部分。</b><br /><a href="">详情请见原文：<i>http://www.mifengtd.cn/articles/procrastination-bill.html</i></a></div>
            <div class="content">
            <textarea name="content" style="width:670px;height:290px;visibility:hidden;">KindEditor</textarea>
            </div>
            <div class="checkbox">
            	<div class="t">选择讨论组的成员</div>
                <div class="all"><label for="checkbox-01">
                        全选<input type="checkbox"  value="1" id="checkbox-01" name="sample-checkbox-01" /></label></div>        
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
            <div class="submit"><input type="submit" value="&nbsp;确&nbsp;定&nbsp;"  /></div>
		</form>
     </div>  
     </div> 
	</body>
</html>
