<div id="direction">
<p>Thank you for being a participant in our research on decision making capability under emergency situation. This research is a part of key project on emergency management funded by National Natural Science Foundation of China and conducted by Harbin Institute of Technology. As an anonymous research, we ensure the security of your personal information. </p>
<p>This research will take 10-15 minutes, including Information Display Board trial, watching video episode, checking information with mouse click, as well as answering questionnaires. Each participant will answer the questions independently, and if needed, you can get a pen with paper or a calculator at hand to do some simple mathematical questions in this research.</p>
<p>All the information indicated on the research will only be used for scientific studies. We appreciate sincerely for your participation and support to this research. </p>
<hr>
<h2>How to use Information Display Board?</h2>
<p>Information in the board is hidden behind boxes. To access the information, you need to move  the mouse and press down the box on the screen. As long as the press is down the box, it will display the information. Whenever the press is released, the box closes and the information is hidden again. </p>
</div>

<div id="info">
<div id="panel1" class="info_panel">
<div>Suppose you want to buy a mobile phone recently, there are four choices below:</div>
    <table>
    <tr> <th></th> <th>Brand</th> <th>Model Type</th> <th>Price</th> <th>Smartphone or not</th> </tr>
    <tr> <th>A</th> <td><p>Apple</p></td> <td><p>iphone4</p></td> <td><p>$450</p></td> <td><p>Yes</p></td> </tr>
    <tr> <th>B</th> <td><p>HTC</p></td> <td><p>A810e</p></td> <td><p>$130</p></td> <td><p>Yes</p></td> </tr>
    <tr> <th>C</th> <td><p>Samsung</p></td> <td><p>Galaxy SIII</p></td> <td><p>$626</p></td> <td><p>Yes</p></td> </tr>
    <tr> <th>D</th> <td><p>Nokia</p></td> <td><p>1010</p></td> <td><p>$29.9</p></td> <td><p>No</p></td> </tr>
    </table>
</div>
<!--info-->

<hr>
<div id="question_panel">
<form action="/question/naire1" method="post">
    <h4><a name="q1">1.Your choice of mobile phone purchasing is:</a></h4>
    <div class="answer"> <p>
    <input type="radio" name="q1" value="1"/>A
    <input type="radio" name="q1" value="2"/>B
    <input type="radio" name="q1" value="3"/>C
    <input type="radio" name="q1" value="4"/>D
    </p> </div>

    <h4><a name="q2">2.How difficult would you rate the decision you just made?</a></h4>
    <div class="answer"> 
    <p>
    <input type="radio" name="q2" value="1" />1
    <input type="radio" name="q2" value="2"/>2
    <input type="radio" name="q2" value="3"/>3
    <input type="radio" name="q2" value="4"/>4
    <input type="radio" name="q2" value="5"/>5
    </p> 
    <p><span>not at all difficult</span><span style="padding-left:60px">very difficult</span></p>
    </div>
    <input type="hidden" name="naireid" value="<?php echo htmlspecialchars($naireid);?>"/>
    <input type="hidden" name="expid" value="<?php echo htmlspecialchars($expid);?>"/>
    <input type="hidden" name="savetype" value="<?php echo htmlspecialchars($savetype);?>"/>
    <input type="hidden" name="lang" value="<?php echo htmlspecialchars($lang);?>"/>
    <input type="hidden" name="debug" value="<?php echo htmlspecialchars($debug);?>" />
    <input type="button" value="Next Page" class="nextpage"/>
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
