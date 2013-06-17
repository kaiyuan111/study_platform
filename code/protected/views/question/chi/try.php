<div id="direction">
<p>感谢您参与应急情境下应对决策能力的研究。该研究为哈尔滨工业大学应急决策研究项目中的一部分，本研究为不记名形式，保证您的个人信息安全。</p>
<p>本研究需要每位参与者独立完成，包括信息板试用，视频观看，鼠标操作查看信息，问题作答和调查问卷等内容，大概需要5~10分钟来完成，其中问题作答部分会有简单的计算，如需要，请准备纸笔或计算器。</p>
<p>所有信息只为本项目学术研究之用，谢谢您的配合与对本研究的支持，在此向您表示真诚的感谢！</p>
<hr>
<h2>信息板操作说明:</h2>
<p>信息隐藏在信息板下面的方框中，要获取该信息，请将鼠标移动到该信息所在方框，按下鼠标，信息就会显现，保持鼠标一直按下，方框就一直处于打开状态。一旦松开鼠标或者移动到其他方框，方框就会关闭信息将被隐藏。</p>
</div>

<div id="info">
<div id="panel1" class="info_panel">
<div>假设您最近想要买一款手机，市面上有以下四款可供参考， 具体信息如下：</div>
    <table>
    <tr> <th></th> <th>品牌</th> <th>型号</th> <th>价格</th> <th>是否智能机</th> </tr>
    <tr> <th>A</th> <td><p>苹果</p></td> <td><p>Iphone4</p></td> <td><p>3000元</p></td> <td><p>是</p></td> </tr>
    <tr> <th>B</th> <td><p>HTC</p></td> <td><p>A810e</p></td> <td><p>800元</p></td> <td><p>是</p></td> </tr>
    <tr> <th>C</th> <td><p>三星</p></td> <td><p>Galaxy SIII</p></td> <td><p>3700元</p></td> <td><p>是</p></td> </tr>
    <tr> <th>D</th> <td><p>诺基亚</p></td> <td><p>1010</p></td> <td><p>180元</p></td> <td><p>否</p></td> </tr>
    </table>
</div>
<!--info-->

<hr>
<div id="question_panel">
<form action="/question/naire1" method="post">
    <h4><a name="q1">1.您选择购买的手机是:</a></h4>
    <div class="answer"> <p>
    <input type="radio" name="q1" value="1"/>A
    <input type="radio" name="q1" value="2"/>B
    <input type="radio" name="q1" value="3"/>C
    <input type="radio" name="q1" value="4"/>D
    </p> </div>

    <h4><a name="q2">2. 您认为用信息板来做决策的难易程度是:</a></h4>
    <div class="answer"> 
    <p>
    <input type="radio" name="q2" value="1" />1
    <input type="radio" name="q2" value="2"/>2
    <input type="radio" name="q2" value="3"/>3
    <input type="radio" name="q2" value="4"/>4
    <input type="radio" name="q2" value="5"/>5
    </p> 
    <p><span>一点也不难</span><span style="padding-left:60px">非常难</span></p>
    </div>
    <input type="hidden" name="naireid" value="<?php echo htmlspecialchars($naireid);?>"/>
    <input type="hidden" name="expid" value="<?php echo htmlspecialchars($expid);?>"/>
    <input type="hidden" name="savetype" value="<?php echo htmlspecialchars($savetype);?>"/>
    <input type="hidden" name="lang" value="<?php echo htmlspecialchars($lang);?>"/>
    <input type="hidden" name="debug" value="<?php echo htmlspecialchars($debug);?>" />
    <input type="button" value="下一步" class="nextpage"/>
</form>
</div>

<script  src="<?php echo Yii::app()->request->baseUrl; ?>/js/require.min.js"></script>
<script type="text/javascript">
require.config({
    paths:{
        "jquery" : "<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min",
        "info_panel" : "<?php echo Yii::app()->request->baseUrl; ?>/js/question/info_panel",
        "info_panel_content" : "<?php echo Yii::app()->request->baseUrl; ?>/js/question/info_panel_content",
    },
});

require(["jquery","info_panel"],function($,INFO_PANEL) {
    // 信息版初始化
    var infoPanelInst1 = INFO_PANEL("#info #panel1");
    infoPanelInst1.init("<?php echo htmlspecialchars($naireid);?>");
    infoPanelInst1.disablePostData();

    // 提交答案
    $("#question_panel input[type=button]").on("click",function(){
        // 核实没填写的题目
        lastnum = String($("#question_panel input:radio:last").attr("name"));
        num = lastnum.replace("q","");
        for(i=1;i<=num;i++) {
            val = $("#question_panel input:radio[name=q"+i+"]:checked");
            if(val.length==0) {
                location.hash="q"+i;
                return;
            }
        }
        $("#question_panel form").submit();
    });

});
</script>
