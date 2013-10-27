<div class="Workcont_left">
	<div class="tittle"><?php echo $courseContent['title'];?></div>
	<div class="writer">作者：<span><?php echo $courseCreator['uname']?></span></div>
	<div class="cont">
        <?php echo $courseContent['content'];?>        
    </div>
            
    <div class="workcont_page">
   		<ul>
	       	<?php if (!empty($preChapter)) {?><li><a href="/student/learndetail?chapterid=<?php echo $preChapter['id'];?>">[上一页]</a></li><?php }?>
	       	<li><a href="/student/cataloguelist?courseid=<?php echo $courseContent['courseid'];?>">[回目录]</a></li>
	       	<?php if (!empty($nextChapter)) {?><li><a href="/student/learndetail?chapterid=<?php echo $nextChapter['id'];?>">[下一页]</a></li><?php }?>
        </ul>
    </div>
</div>

<div class="Workcont_right">
	<div class="leftTitle">
        <ul>
            <LI class="active" id="tab1"><A onmouseover=javascript:slay(1) href="javascript:slay(1)">&nbsp;练&nbsp;&nbsp;&nbsp;&nbsp;习&nbsp;</A></LI>
            <LI id="tab2"><A id='add_zhaiyao' onmouseover=javascript:slay(2) href="/student/studydetailpage?type=1&chapterid=<?php echo $courseContent['id'];?>" >添加摘抄</A></LI>
            <LI id="tab3"><A id='add_pizhu' onmouseover=javascript:slay(3) href="/student/studydetailpage?type=2&chapterid=<?php echo $courseContent['id'];?>">添加批注</A></LI>
            <LI id="tab4"><A id='add_taolun' onmouseover=javascript:slay(4) href="/student/studydetailpage?type=3&chapterid=<?php echo $courseContent['id'];?>" >发起讨论</A></LI>
        </ul>
    </div>
    
    <div id="tabcont1" >
    <form >
    	<input type="hidden" value="<?php echo count($homework);?>" name="homeworknum"/>
    	<?php $i = 0;foreach ($homework as $key => $value){ $i++;?>
    		<input type="hidden" value="<?php echo $value['id'];?>" name="homeworkid_<?php echo $i;?>"/>
    		<input type="hidden" value="<?php echo $value['type'];?>" name="type_<?php echo $i;?>"/>
    		<?php if ($value['type'] == 1){  //单选题?>
    			<div class="practise_tittle">&nbsp;&nbsp;<?php echo $i . '.';?><?php echo $value['title'];?></div>
    			<div class="practise_answer">
	            <span>
	                <label for="radio-01" class="label_radio">      
	                    <input type="radio" <?php if (isset($answer[$value['id']]) && $answer[$value['id']]['answer'] == 'A'){?> checked="true" <?php }?> value="A" id="radio-01" name="answer_<?php echo $i;?>" /> A、 <?php echo $value['option'][0];?>     
	                </label>  
	            </span>
	            <span>
	                <label for="radio-02" class="label_radio">      
	                    <input type="radio" <?php if (isset($answer[$value['id']]) && $answer[$value['id']]['answer'] == 'B'){?> checked="true" <?php }?> value="B" id="radio-02" name="answer_<?php echo $i;?>" /> B、  <?php echo $value['option'][1];?>   
	                </label>  
	            </span>        
	            <span>
	                <label for="radio-03" class="label_radio">      
	                    <input type="radio" <?php if (isset($answer[$value['id']]) && $answer[$value['id']]['answer'] == 'C'){?> checked="true" <?php }?> value="C" id="radio-03" name="answer_<?php echo $i;?>" /> C、  <?php echo $value['option'][2];?>        
	                </label>  
	            </span>
	            <span>
	                <label for="radio-04" class="label_radio">      
	                    <input type="radio" <?php if (isset($answer[$value['id']]) && $answer[$value['id']]['answer'] == 'D'){?> checked="true" <?php }?> value="D" id="radio-04" name="answer_<?php echo $i;?>" /> D、  <?php echo $value['option'][3];?>  
	                </label>  
	            </span> 
        		</div>  
    		<?php } elseif ($value['type'] == 2){  //多选题?>	
    		<div class="practise_tittle">&nbsp;&nbsp;<?php echo $i . '.';?><?php echo $value['title'];?>（多选）</div>
    		<div class="practise_answer">
            <span>
                <label for="checkbox-01" class="label_check">       
                	<input type="checkbox" <?php if (isset($answer[$value['id']]) && strpos($answer[$value['id']]['answer'], 'A') !== false){?> checked="true" <?php }?> value="A" id="checkbox-01" name="answer_<?php echo $i;?>" />A、 <?php echo $value['option'][0];?>      
                </label>  
            </span>
            <span>
                <label for="checkbox-02" class="label_check">       
                	<input type="checkbox" <?php if (isset($answer[$value['id']]) && strpos($answer[$value['id']]['answer'], 'B') !== false){?> checked="true" <?php }?> value="B" id="checkbox-02" name="answer_<?php echo $i;?>" />B、  <?php echo $value['option'][1];?>     
                </label>     
            </span>        
            <span>
                <label for="checkbox-03" class="label_check">       
                	<input type="checkbox" <?php if (isset($answer[$value['id']]) && strpos($answer[$value['id']]['answer'], 'C') !== false){?> checked="true" <?php }?> value="C" id="checkbox-03" name="answer_<?php echo $i;?>" />C、  <?php echo $value['option'][2];?>
                </label>     
            </span>
            <span>
                <label for="checkbox-04" class="label_check">       
                	<input type="checkbox" <?php if (isset($answer[$value['id']]) && strpos($answer[$value['id']]['answer'], 'D') !== false){?> checked="true" <?php }?> value="D" id="checkbox-04" name="answer_<?php echo $i;?>" />D、  <?php echo $value['option'][3];?>
                </label>     
            </span> 
        </div> 
    		<?php }else {?>
    			<div class="practise_tittle">&nbsp;&nbsp;<?php echo $i . '.';?><?php echo $value['title'];?></div>
    			<div class="practise_answer"><textarea name="answer_<?php echo $i;?>"><?php if (isset($answer[$value['id']])){echo $answer[$value['id']]['answer'];}?></textarea></div>
    	<?php }}?>
          
        <div class="submit"><input id="homeworksubmit" type="button" name="submit" class="submit1" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /></div>
    </form>
    </div>				
   
    <DIV id="tabcont2" style="DISPLAY: none;">
        <div class="extract">
        	<ul>
        		<?php foreach ($excerptList as $key => $value) {?>
            	<li><span class="l"><摘抄></span><span class="r"><?php echo $value['content'];?></span></li>
            	<?php }?>
            </ul>
        </div> 
        

    </DIV>			
  
    <div id="tabcont3" style="DISPLAY: none;">
        <div class="extract">
        	<ul>
        		<?php foreach ($annotationList as $key => $value) {?>
            	<li><span class="l"><批注></span><span class="r"><?php echo $value['content'];?></span></li>
            	<?php }?>
            </ul>
        </div> 
    </div>
    <div id="tabcont4" style="DISPLAY: none;">
    </div>
        
        
        </div>
        
<script >
(function($) {
    closeColorbox = function() {
        // 关闭弹窗刷新当前页面来获取最新内容,后续应该换成ajax来提升体验
        window.location.reload();
    }
    // 弹出添加摘要,添加批注，发起讨论
    $("#add_zhaiyao").colorbox({iframe:true, innerWidth:732, innerHeight:483, onClosed:closeColorbox, scrolling:false});
    $("#add_pizhu").colorbox({iframe:true, innerWidth:732, innerHeight:483, onClosed:closeColorbox, scrolling:false});
    $("#add_taolun").colorbox({iframe:true, innerWidth:732, innerHeight:626, onClosed:closeColorbox, scrolling:false});
})(jQuery);

$('#homeworksubmit').click(function(){

	var homeworknum = "<?php echo count($homework);?>";
	homeworknum = Number(homeworknum);
	var data='homeworknum=' + homeworknum;
	
	for(var i=1; i<=homeworknum; i++)
	{
		var type = $('input[name=type_' + i + ']').val();
		var homeworkid = $('input[name=homeworkid_' + i + ']').val();
		if(type == 1)  //单选题
		{
			var answer = $('input[name=answer_' + i + ']:checked').val();
			if(answer == false || answer == undefined || answer == "")
			{
				alert('请回答第' + i + '个题');
				return ;
			}
			data += '&type_' + i + '=' + type + '&homeworkid_' + i + '='+ homeworkid + '&answer_' + i + '=' + answer;
		}
		else if(type == 2)  //多选题
		{
			var answer = [];
			 
			  $('input[name=answer_' + i + ']:checked').each(function(){    
				  answer.push($(this).val());    
			  });    
			  if(answer.length == 0)
			  {
				  alert('请回答第' + i + '个题');
				  return ;
			  }
			  answer = answer.join('-');
			  data += '&type_' + i + '=' + type + '&homeworkid_' + i + '='+ homeworkid + '&answer_' + i + '=' + answer;
		}
		else   //问答题
		{
			var answer = $('textarea[name=answer_' + i + ']').val();
			if(answer == "")
			{
				alert('请回答第' + i + '个题');
				return ;
			}
			data += '&type_' + i + '=' + type + '&homeworkid_' + i + '='+ homeworkid + '&answer_' + i + '=' + answer;
		}
	}
	
	$.ajax({
		type : 'post',
		data : data,
		dataType : 'json',
		url : '/student/saveanswer',
		success: function(data)
		{
			alert(data.msg);
		}
	});
});

function slay(num)
{
	for(var id = 1;id<=4;id++)
	{
		var ss="tabcont"+id; 
	
		if(id==num)
			document.getElementById(ss).style.display="block";
		else
			document.getElementById(ss).style.display="none";
	}  

	for(var id = 1;id<=4;id++)
	{
	
		var bb="tab"+id;
	
		if(id==num)
			document.getElementById(bb).className="active";
		else
			document.getElementById(bb).className="";
	}
}

function setupLabel(){      
	if($('.label_check input').length) {
		$('.label_check').each(function(){
			$(this).removeClass('c_on');       
		});       
		$('.label_check input:checked').each(function(){        
			$(this).parent('label').addClass('c_on');       
		});      
		};      
		if($('.label_radio input').length) {
			$('.label_radio').each(function(){        
				$(this).removeClass('r_on');       
			});       
			$('.label_radio input:checked').each(function(){        
				$(this).parent('label').addClass('r_on');       
			});      
		};     
		}          
	$(function(){      $('body').addClass('has-js');
	$('.label_check,.label_radio').click(function(){       
	setupLabel();      
	});     
	setupLabel();     
	});

	
</script> 
