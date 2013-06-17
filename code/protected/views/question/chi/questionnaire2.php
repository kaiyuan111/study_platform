<hr>
<div id="question_panel">
    <form action="/question/<?php echo $next;?>" method="post">

    <?php include "questions_2.php";?>

    <input type="hidden" name="naireid" value="<?php echo htmlspecialchars($naireid);?>"/>
    <input type="hidden" name="expid" value="<?php echo htmlspecialchars($expid);?>"/>
    <input type="hidden" name="savetype" value="<?php echo htmlspecialchars($savetype);?>"/>
    <input type="hidden" name="lang" value="<?php echo htmlspecialchars($lang);?>"/>
    <input type="hidden" name="debug" value="<?php echo htmlspecialchars($debug);?>" />
    <input type="button" value="下一步" class="nextpage"/>
	</form>
<div>

<br>

<?php if(isset($debug)&&$debug==1):?>
<button id="test">随机填写</button>
<?php endif;?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    // 测试数据填写
    $("#test").on('click',function() {
        lastnum = String($("#question_panel input:radio:last").attr("name"));
        num = lastnum.replace("q","");
        for(i=1;i<=num;i++) {
            val = $("#question_panel input:radio[name=q"+i+"]:checked");
            if(val.length==0) {
                $("#question_panel input:radio[name=q"+i+"]:nth(0)").attr("checked",true);
            }
        }
    });

    $("#question_panel input[type=button]").on("click",function(){
        // 选择题核实
        lsubmit = true;
        var firstnum = String($("#question_panel input:radio:first").attr("name"));
        var lastnum = String($("#question_panel input:radio:last").attr("name"));
        var fnum = firstnum.replace("q","");
        var lnum = lastnum.replace("q","");
        for(i=fnum;i<=lnum;i++) {
            var val = $("#question_panel input:radio[name=q"+i+"]:checked");
            if(val.length==0) {
                lsubmit = false;
                location.hash="q"+i;
                break
            }
        }
        //提交
        if(lsubmit) {
            $("#question_panel form").submit();
        }
    });
});
</script>
