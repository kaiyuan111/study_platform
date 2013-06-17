

<div id="direction">
<h3>Please watch the movie episode and then answer the questions.</h3>
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
<p>After a strong typhoon, it is found that the outdoor power supply devices of <strong>4 units </strong>are damaged separately in an area, but there is <strong>only one access </strong>to the 4 units.  Suppose you are the captain of the emergency repair team, <strong>your mission is getting the damaged devices fixed as more as possible </strong>before the storm (usually following a typhoon, and the weather forecast says it would happened in the following 24 to 48 hours this time). Now you only have one team with one set of tools and ancillary devices, that means your team cannot work on more than one unit simultaneously; <strong>you have to finish one unit then get start on another.</strong>The heavy storm would force your team to stop repair work; also a danger of landslide is hidden in the area, it is better to leave this area once your team finish repairing or the storm is too heavy, <strong>the nearer to the entrance/exit, the safer of your team. </strong>We know <strong>the distance among the 4 units is even,</strong>their locations and other necessary information are as below ( displayed after your pressing the “start” button):</p>
</div>


<hr>
<button type="button" class="start_answer">Start</button>
<div id="question_start">

<div id="info">
<div class="timer">
<p><span class="time_title">Countdown Timer<span> <span class="time_show"></span></p>
</div>
<div class="img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/q22.jpg"/></div>

<div id="panel1" class="info_panel">
    <table>
    <tr> <th></th> <th>Equidistant Location</th> <th>Unit with Devices Damaged</th> <th>Spare Power Supply</th> <th>Estimated Repair Time</th> </tr>
    <tr> <th>A</th> <td data-x="1" data-y="1"><p>3 hours to Entrance/Exit</p></td> <td data-x="2" data-y="1"><p>Television Station </p></td> <td data-x="3" data-y="1"><p><?php if($expid==3):?>Yes,  extra supply for couples of hours<?php else:?>Yes,  extra supply for 8 hours<?php endif;?></p></td> <td data-x="4" data-y="1"><p>3 hours</p></td> </tr>
    <tr> <th>B</th> <td data-x="1" data-y="2"><p>2 hours to Entrance/Exit</p></td> <td data-x="2" data-y="2"><p>Elementary School</p></td> <td data-x="3" data-y="2"><p>No</p></td> <td data-x="4" data-y="2"><p>5 hours</p></td> </tr>
    <tr> <th>C</th> <td data-x="1" data-y="3"><p>1 hour to Entrance/Exit</p></td> <td data-x="2" data-y="3"><p>Hospital</p></td> <td data-x="3" data-y="3"><p><?php if($expid==3):?>Yes, extra supply for some hours<?php else:?>Yes,  extra supply for 16 hours<?php endif;?></p></td> <td data-x="4" data-y="3"><p>5 hours</p></td> </tr>
    <tr> <th>D</th> <td data-x="1" data-y="4"><p>At Entrance/Exit</p></td> <td data-x="2" data-y="4"><p>High –rise Residential Building</p></td> <td data-x="3" data-y="4"><p>No</p></td> <td data-x="4" data-y="4"><p>10 hours</p></td> </tr>
     </table>
</div>

<div id="panel2_choose">
<div>According to the information got in the Information Display Board, if you want to make decision right now, please press the “Yes” button, and you can answer the questions at once; if you need more information about the “Spare Power Supply”, please press the “No” button, then the exact information will appear in another Information Display Board, but it will take you 10 seconds to wait for its appearance.</div>
<button type="button" id="panel2_yes">Yes</button><button type="button" id="panel2_no">No</button>
</div>

<div class="timer2">
<p><span class="time_title"><span> Information of Spare Power Supply will appear in <span class="time_show" style="font-size:150%"></span> seconds</p>
</div>

<div id="panel2" class="info_panel">
    <table>
    <tr> <th></th> <th>Unit with Spare Power Supply</th> <th>Initial Charge Capacity</th> <th>Equipment Aging</th> <th>Years been in Use</th> </tr>
    <tr> <th>A</th> <td data-x="1" data-y="1"><p>Television Station</p></td> <td data-x="2" data-y="1"><p>12 hours of power supply</p></td> <td data-x="3" data-y="1"><p>1 hour annual reduction in power supply</p></td> <td data-x="4" data-y="1"><p>4 years</p></td> </tr>
    <tr> <th>C</th> <td data-x="1" data-y="2"><p>Hospital</p></td> <td data-x="2" data-y="2"><p>24hours of power supply</p></td> <td data-x="3" data-y="2"><p>2 hours annual reduction in power supply</p></td> <td data-x="4" data-y="2"><p>4 years</p></td> </tr>
    </table>
</div>
</div><!--info-->

<hr>
<div id="question_panel">
<h2>Questions</h2>
<form action="/question/<?php echo $next;?>" method="post">
    <?php include "questions_1.php";?>
    <input type="hidden" name="naireid" value="<?php echo htmlspecialchars($naireid);?>"/>
    <input type="hidden" name="expid" value="<?php echo htmlspecialchars($expid);?>"/>
    <input type="hidden" name="savetype" value="<?php echo htmlspecialchars($savetype);?>"/>
    <input type="hidden" name="lang" value="<?php echo htmlspecialchars($lang);?>"/>
    <input type="hidden" name="debug" value="<?php echo htmlspecialchars($debug);?>" />
    <input type="button" value="Next Page" class="nextpage"/>
</form>
</div><!--question_panel-->


<?php if(isset($debug)&&$debug==1):?>
<button id="test">Random Answer</button>
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
    });
    $("#panel2_no").on("click",function() {
        // 倒计时后展现信息版2
        $(".timer2").show();
        timer2();
        $("#panel2_choose").hide();
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
