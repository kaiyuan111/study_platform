<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录页</title>
<link href="/css/css.css" rel="stylesheet" media="screen" type="text/css" />.
<link rel="stylesheet" href="/css/jqtransform.css" type="text/css" media="all" />
<script >
function slay2(num)
{
	for(var id = 1;id<=2;id++)
	{
		var ss="logintabcont"+id; 
	
		if(id==num)
			document.getElementById(ss).style.display="block";
		else
			document.getElementById(ss).style.display="none";
	}  

	for(var id = 1;id<=2;id++)
	{
	
		var bb="logintab"+id;
	
		if(id==num)
			document.getElementById(bb).className="active";
		else
			document.getElementById(bb).className="";
	}
}

</script>

</head>

<body class="register_bg">
<div class="content">
	<div class="register_logo"><img src="/images/frame/register_logo.png" /></div>
    <DIV class="register">
        <UL>
            <LI class="active" id="logintab1"><A onmouseover=javascript:slay2(1) href="javascript:slay2(1)"><img src="/images/frame/register_logo_1.png" /></A></LI>
            <LI id="logintab2"><A onmouseover=javascript:slay2(2) href="javascript:slay2(2)"><img src="/images/frame/register_logo_2.png" /></A></LI>
        </UL>
    </DIV>
    <DIV id="logintabcont1">
    	<div class="ml300">
        	<form action="/main/user/login" method="post">
                 <p><input name="name" type="text" size="33"  class="input1"/></p>
                 <p><input name="pwd" type="password" size="33"  class="input2"/></p>
                 <input name="login_sub" type="hidden"/>
                 <input name="url" type="hidden" value="<?php echo $url;?>"/>
                 <p><input type="submit"  class="submit2" value="&nbsp;&nbsp;" /></p>
            </form>
        </div>
    </DIV>
    <DIV id="logintabcont2" style="DISPLAY: none;">
    	<div class="ml300">
        	<form action="/main/user/register" method="post">
                 <p><input name="name" type="text" size="33"  class="input1"/><span>*</span></p>
                 <p><input name="pwd" type="password" size="33"  class="input3"/><span>*</span></p>
                 <p><input name="pwdconfirm" type="password" size="33"  class="input4"/><span>*</span></p>
                 <p><input name="email" type="text" size="33"  class="input5"/><span>*</span></p>
                 <p><input type="submit"  class="submit1" value="&nbsp;&nbsp;" /></p>
            </form>
        </div>
    </DIV>
    
    </DIV>
    <div class="Copyright">Copyright© 2012 Open Vision. 版权所有</div>

    
</div>
</body>
</html>
