
<div id="direction">
<h3>请观看视频短片并回答以下问题。</h3>
<div>
<?php if(in_array($expid,array(1,2,3,6))):?>
<iframe style="position:relative;left:20%;" height=548 width=560 frameborder=0 src="http://player.youku.com/embed/XNTE5NTUwNDg4" allowfullscreen></iframe>
<?php elseif($expid==4):?>
<iframe style="position:relative;left:20%;" height=498 width=510 src="http://player.youku.com/embed/XNTE5NTQzNjg4" frameborder=0 allowfullscreen></iframe>
<?php elseif($expid==5):?>
<iframe style="position:relative;left:20%;" height=498 width=510 src="http://player.youku.com/embed/XNTE5NTU3NDQw" frameborder=0 allowfullscreen></iframe>
<?php endif;?>
</div>

<hr>
<p>强台风过后，现有某一区域有<strong>四个单位</strong>的室外配电设备损坏造成停电，目前<strong>只有一条通路</strong>到这四个单位。假设你是应急抢险队队长，<strong>你的任务</strong>是在台风后的大暴雨来临之前（根据预报大暴雨将在24至48小时内到来）<strong>用尽可能少的时间抢修尽可能多的受损单位</strong>。目前您只有一支抢险队和配套设备，无法两个单位同时抢修，<strong>只能抢修完一个单位再去另一个单位</strong>。由于下大暴雨会导致抢修队无法作业，并且该区域有山体滑坡的隐患，所以当抢修完毕，或暴雨过大时，抢修队需马上撤离，并且<strong>越临近出入口，越安全</strong>。已知四个单位之间是<strong>等距路程</strong>，基本位置如下图表所示。（点击“开始答题”后显现）</p>
</div>


<hr>
<button type="button" class="start_answer">开始答题</button>
<div id="question_start">

<div id="info">
<div class="timer">
<p><span class="time_title">计时器<span> <span class="time_show"></span></p>
</div>
<div class="img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/q11.jpg"/></div>

<div id="panel1" class="info_panel">
    <table>
    <tr> <th></th> <th>等距地点</th> <th>设备受损单位</th> <th>备用电源情况</th> <th>预计抢修时间</th> </tr>
	<tr> <th>A</th> <td data-x="1" data-y="1"><p>距出入口3小时</p></td> <td data-x="2" data-y="1"><p>电视台</p></td> <td data-x="3" data-y="1"><p><?php if($expid==3):?>有，能支持一段时间<?php else:?>有，能支持8小时<?php endif;?></p></td> <td data-x="4" data-y="1"><p>3小时</p></td> </tr>
    <tr> <th>B</th> <td data-x="1" data-y="2"><p>距出入口2小时</p></td> <td data-x="2" data-y="2"><p>小学</p></td> <td data-x="3" data-y="2"><p>无</p></td> <td data-x="4" data-y="2"><p>5小时</p></td> </tr>
    <tr> <th>C</th> <td data-x="1" data-y="3"><p>距出入口1小时</p></td> <td data-x="2" data-y="3"><p>医院</p></td> <td data-x="3" data-y="3"><p><?php if($expid==3):?>有，能支持较长时间<?php else:?>有，能支持16小时<?php endif;?></p></td> <td data-x="4" data-y="3"><p>5小时</p></td> </tr>
    <tr> <th>D</th> <td data-x="1" data-y="4"><p>在出入口处</p></td> <td data-x="2" data-y="4"><p>高层住宅</p></td> <td data-x="3" data-y="4"><p>无</p></td> <td data-x="4" data-y="4"><p>10小时</p></td> </tr>
    </table>
</div>

<div id="panel2_choose">
<div>根据目前的已知信息，如果您可以进行抢修顺序决策，请选择“是”，进行决策；如果您需要更多关于备用电源的信息，请选择“否”，但这会花您一点时间等待来获取更多关于备用电源的确切信息。</div>
<button type="button" id="panel2_yes">是</button><button type="button" id="panel2_no">否</button>
</div>

<div class="timer2">
<p><span class="time_title"><span> <span class="time_show"></span>秒后显示备用电源信息</p>
</div>

<div id="panel2" class="info_panel">
    <table>
    <tr> <th></th> <th>备用电源使用单位</th> <th>初始蓄电量</th> <th>设备老化程度</th> <th>已使用年限</th> </tr>
    <tr> <th>A</th> <td data-x="1" data-y="1"><p>电视台</p></td> <td data-x="2" data-y="1"><p>可供电12小时</p></td> <td data-x="3" data-y="1"><p>每年减少供电1小时</p></td> <td data-x="4" data-y="1"><p>4年</p></td> </tr>
    <tr> <th>C</th> <td data-x="1" data-y="2"><p>医院</p></td> <td data-x="2" data-y="2"><p>可供电24小时</p></td> <td data-x="3" data-y="2"><p>每年减少供电2小时</p></td> <td data-x="4" data-y="2"><p>4年</p></td> </tr>
    </table>
</div>
</div><!--info-->

<hr>
<div id="question_panel">
<h2>问题</h2>
<form action="/question/<?php echo $next;?>" method="post">
    <?php include "questions_1.php";?>
    <input type="hidden" name="naireid" value="<?php echo htmlspecialchars($naireid);?>"/>
    <input type="hidden" name="expid" value="<?php echo htmlspecialchars($expid);?>"/>
    <input type="hidden" name="savetype" value="<?php echo htmlspecialchars($savetype);?>"/>
    <input type="hidden" name="lang" value="<?php echo htmlspecialchars($lang);?>"/>
    <input type="hidden" name="debug" value="<?php echo htmlspecialchars($debug);?>" />
    <input type="button" value="下一步" class="nextpage"/>
</form>
</div><!--question_panel-->


<?php if(isset($debug)&&$debug==1):?>
<button id="test">随机填写</button>
<?php endif;?>
</div><!--question_start-->

<script  src="<?php echo Yii::app()->request->baseUrl; ?>/js/require.min.js"></script>
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/question/info_panel.js"></script>;-->

<script type="text/javascript">
require.config({
    paths:{
        "jquery" : "<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min",
        "info_panel" : "<?php echo Yii::app()->request->baseUrl; ?>/js/question/info_panel",
        "info_panel_content" : "<?php echo Yii::app()->request->baseUrl; ?>/js/question/info_panel_content",
    },
});

require(["jquery","info_panel"],function($,INFO_PANEL) {

    // 各个试验的区别
    var ltimer1 = true; // 倒计时1开关
    var expid = <?php echo $expid;?>;
    switch(expid) {
    case 1:
    case 4:
    case 5:
        $("#info .timer").css("display","none");
        ltimer1 = false;
        $("#panel2_choose").css("display","none");
        break;
    case 2:
        $("#panel2_choose").css("display","none");
        break;
    case 3:
        $("#info .timer").css("display","none");
        ltimer1 = false;
        $("#question_panel").hide();
        break;
    case 6:
        // 选择是否有信息版2后再答题
        $("#question_panel").hide();
        break;
    default:
        break;
    }

    $("#question_start").hide();
    // 信息版1初始化
    //INFO_PANEL.init("<?php echo htmlspecialchars($naireid);?>");
    var infoPanelInst1 = INFO_PANEL("#info #panel1");
    infoPanelInst1.init("<?php echo htmlspecialchars($naireid);?>");

    // 信息版2初始化
    var infoPanelInst2 = INFO_PANEL("#info #panel2");
    infoPanelInst2.init("<?php echo htmlspecialchars($naireid);?>");
    infoPanelInst2.disablePostData();
    infoPanelInst2.hide();

    // 测试数据填写
    $("#test").on('click',function() {
        var lastnum = String($("#question_panel input:radio:last").attr("name"));
        var num = lastnum.replace("q","");
        for(i=1;i<=num;i++) {
            var val = $("#question_panel input:radio[name=q"+i+"]:checked");
            if(val.length==0) {
                $("#question_panel input:radio[name=q"+i+"]")[1].checked=true;
            }
        }
    });

    // 开始答题
    $(".start_answer").on("click",function() {
        $("#question_start").show(1000);
        $(this).hide();
        // 开始计时
        if(ltimer1) {
            timer();
        }
        //记录开始答题时间
        $.post( '/Stat/PointStat',
            {
                type : "start_answer",
                qid : "<?php echo htmlspecialchars($naireid);?>"
            },
            function(data) {
                console.log(data);
            }
        );
    });

    // 信息版2按钮
    $("#panel2_yes").on("click",function() {
        // 立即展现信息版2
        $("#panel2_choose").hide();
        $("#question_panel").show();
        $inputYesOrNo = $("<input type='hidden' name='q0' value='1'/>");
        $("form").append($inputYesOrNo)
    });
    $("#panel2_no").on("click",function() {
        // 倒计时后展现信息版2
        $(".timer2").show();
        timer2();
        $("#panel2_choose").hide();
        $inputYesOrNo = $("<input type='hidden' name='q0' value='2'/>");
        $("form").append($inputYesOrNo)
    });

    // 信息版倒计时 
    $(".timer .time_show").text(30); 
    function timer() { 
        var nowTime = 30; 
        var timer = setInterval(showTime,1000); 
        function showTime() { 
            if(nowTime<=0) { 
                clearInterval(timer);
                infoPanelInst1.disableEvent();
                return
            }
            nowTime--;
            $(".timer .time_show").text(nowTime);
        }
    }

    // 信息版2倒计时
    $(".timer2").hide();
    $(".timer2 .time_show").text(10); 
    function timer2() {
        var nowTime = 10;
        var timer = setInterval(showTime,1000);
        function showTime() {
            if(nowTime<=0) {
                clearInterval(timer);
                infoPanelInst2.show();
                $(".timer2").hide();
                // 开始答题
                $("#question_panel").show();
                return
            }
            nowTime--;
            $(".timer2 .time_show").text(nowTime);
        }
    }

    // 排序题
    $(".question_sort .waiting_item").on("click",".item",function() {
        $(this).parent(".waiting_item").siblings(".choosed_item").append($(this));
    });
    $(".question_sort .choosed_item").on("click",".item",function() {
        $(this).parent(".choosed_item").siblings(".waiting_item").append($(this));
    });


    // 提交答案
    $("#question_panel input[type=button]").on("click",function(){
        // 整理排序题答案
        var $sortq= $("#question_panel .question_sort");
        $.each($sortq,function(index1,value) {
            var answersort = [];
            $(value).find(".item").each(function(index2,value) {
                var qindex = index1+1;
                var aindex = index2+1;
                $answerinput = $('<input type="hidden" name="q'+qindex+'_'+aindex+'" value="'+$(value).attr('value')+'"/>');
                $("#question_panel form").append($answerinput);
            });
            //console.log(index,value,sortanswer);
        });

        // 核实没填写的题目
        lsubmit = true;
        // 排序题核实
        var $questionsort = $("#question_panel .question_sort");
        $questionsort.each(function(index,value) {
            $temp = $(value).find(".waiting_item .item");
            if($(value).find(".waiting_item .item").length!=0) {
                index = index+1;
                location.hash="q"+index;
                lsubmit = false;
                return false;
            }
        });

        // 选择题核实
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
        // 提交
        if(lsubmit) {
            $("#question_panel form").submit();
        }
    });
});
</script>
