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
            <LI id="tab2"><A onmouseover=javascript:slay(2) href="/student/studydetailpage?type=1&chapterid=<?php echo $courseContent['id'];?>" target="_blank">添加摘抄</A></LI>
            <LI id="tab3"><A onmouseover=javascript:slay(3) href="/student/studydetailpage?type=2&chapterid=<?php echo $courseContent['id'];?>" target="_blank">添加批注</A></LI>
            <LI id="tab4"><A onmouseover=javascript:slay(4) href="/student/studydetailpage?type=3&chapterid=<?php echo $courseContent['id'];?>" target="_blank">发起讨论</A></LI>
        </ul>
    </div>
    
    <div id="tabcont1" >
    <form>
    	<?php $i = 0;foreach ($homework as $key => $value){ $i++;?>
    		<?php if ($value['type'] == 1){  //单选题?>
    			<div class="practise_tittle">&nbsp;&nbsp;<?php echo $i . '.';?><?php echo $value['title'];?></div>
    			<div class="practise_answer">
	            <span>
	                <label for="radio-01" class="label_radio">      
	                    <input type="radio" checked="" value="1" id="radio-01" name="sample-radio" /> A、 <?php echo $value['option'][0];?>     
	                </label>  
	            </span>
	            <span>
	                <label for="radio-02" class="label_radio">      
	                    <input type="radio" checked="" value="2" id="radio-02" name="sample-radio" /> B、  <?php echo $value['option'][1];?>   
	                </label>  
	            </span>        
	            <span>
	                <label for="radio-03" class="label_radio">      
	                    <input type="radio" checked="" value="3" id="radio-03" name="sample-radio" /> C、  <?php echo $value['option'][2];?>        
	                </label>  
	            </span>
	            <span>
	                <label for="radio-04" class="label_radio">      
	                    <input type="radio" checked="" value="4" id="radio-04" name="sample-radio" /> D、  <?php echo $value['option'][3];?>  
	                </label>  
	            </span> 
        		</div>  
    		<?php } elseif ($value['type'] == 2){  //多选题?>	
    		<div class="practise_tittle">&nbsp;&nbsp;<?php echo $i . '.';?><?php echo $value['title'];?>（多选）</div>
    		<div class="practise_answer">
            <span>
                <label for="checkbox-01" class="label_check">       
                	<input type="checkbox" checked="" value="1" id="checkbox-01" name="sample-checkbox-01" />A、 <?php echo $value['option'][0];?>      
                </label>  
            </span>
            <span>
                <label for="checkbox-02" class="label_check">       
                	<input type="checkbox" value="2" id="checkbox-02" name="sample-checkbox-02" />B、  <?php echo $value['option'][1];?>     
                </label>     
            </span>        
            <span>
                <label for="checkbox-03" class="label_check">       
                	<input type="checkbox" value="3" id="checkbox-03" name="sample-checkbox-03" />C、  <?php echo $value['option'][2];?>
                </label>     
            </span>
            <span>
                <label for="checkbox-04" class="label_check">       
                	<input type="checkbox" value="4" id="checkbox-04" name="sample-checkbox-04" />D、  <?php echo $value['option'][3];?>
                </label>     
            </span> 
        </div> 
    		<?php }else {?>
    			<div class="practise_tittle">&nbsp;&nbsp;<?php echo $i . '.';?><?php echo $value['title'];?></div>
    			<div class="practise_answer"><textarea name="answer"></textarea></div>
    	<?php }}?>
          
        <div class="submit"><input type="submit" name="submit" class="submit1" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /></div>
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