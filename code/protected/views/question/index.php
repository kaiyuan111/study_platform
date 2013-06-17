<div id="index">

<form action="/question/try" method="post">
    <input type="radio" checked="checked" name="lang" value="eng"/>English<br/>
    <input type="radio" name="lang" value="chi"/>中文<br/>
    <input type="hidden" name="expid" value="" />
    <input type="hidden" name="debug" value="<?php echo htmlspecialchars($debug);?>" />
    <button value="experiment_1">1Control group</button>
    <button value="experiment_2">2time pressure group</button>
    <button value="experiment_3">3fuzzy information group</button>
    <button value="experiment_4">4positive emotion intervention group</button>
    <button value="experiment_5">5negative emotion intervention group</button>
    <button value="experiment_6">6time pressure+fuzzy information group</button>
</form>

</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(function(){
    $("#index button").on("click",function(){
        $exp = new String($(this).val());
        $id = $exp.replace(/experiment_/,"");
        $("form input[name=expid]").val($id)
        // location.href="/question/try?expid="+$id;
        $("form").submit();
    });
});
</script>
