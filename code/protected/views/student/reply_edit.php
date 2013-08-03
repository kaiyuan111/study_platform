<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>批注摘抄编辑框</title>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
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
	<body style=" width:680px; margin:0 auto; padding-top:200px;">
		<form>
			<textarea name="content" style="width:680px;height:290px;visibility:hidden;">KindEditor</textarea>
            
            <input type="submit"  style="width:84px; height:33px; background:url(images/submit_on.png) no-repeat; border:0;" value=""  />
		</form>
	</body>
</html>
