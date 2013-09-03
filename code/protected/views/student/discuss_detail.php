<div class="Workreply_left">
   	<div class="tittle"><?php echo $discussInfo['title'];?></div>
       <div class="cont"><a href="/student/learndetail?chapterid=<?php echo $discussInfo['chapterid'];?>">单击查看原文详情</a></div>
       <div class="cont">
          <?php echo $discussInfo['content'];?> 
   		</div>
       <div class="message">
      		<div class="t"><a href=""><img src="/images/frame/yqls.png" align="bottom" /></a></div>
      		<?php if (!empty($discussReply)) {?>
           <ul>
           <?php foreach ($discussReply as $key => $value) {?>
           	<li><a ><?php echo $replyUserInfo[$value['uid']]['uname'];?></a> <?php echo date('Y-m-d G:i:s',$value['time']);?>
           	<p><?php echo $value['comment'];?></p></li>
           	<?php }?>
           </ul>
           <?php }?>
           <div class="infoform">
           	<!--  <form>-->
               	<div><textarea name="content"></textarea></div>
                   <input type="submit" class="submit_blue" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" />
            <!--  </form>-->
           </div>
       </div>
       
</div>
<div class="Workreply_right">
   	<div class="Discussion_members">
       	<div class="t">参与讨论人员</div>
       	<?php if (!empty($discussMemberInfo)){?>
           <ul>
           <?php foreach ($discussMemberInfo as $key => $value){?>
           	<li><?php echo $value['uname'];?></li>
           	<?php }?>
           </ul>
           <?php }?>
	</div>
  <!--    <div class="info_new_list">
    	<div class="t">近期讨论话题</div>
        <ul>
        	<li><a href="">高端网站 VI制作</a></li>
            <li><a href="">如何创网站专业相关做网站</a></li>
            <li><a href="">网页设计师的理解和精神</a></li>
            <li><a href="">如何对网站进行策划定位</a></li>
            <li><a href="">网站设计之信息的可视化的五个特征</a></li>
            <li><a href="">如何创网站专业相关做网站</a></li>
            <li><a href="">网页设计师的理解和精神</a></li>
            <li><a href="">如何对网站进行策划定位</a></li>
            <li><a href="">网站设计之信息的可视化的五个特征</a></li>
        </ul>
    </div>-->
      
</div>

<script type="text/javascript">
$(".submit_blue").click(function()
	    {
    		var discussid = <?php echo $discussInfo['id'];?>;
    		var content = $('textarea[name="content"]').val();
    		
    		$.ajax({
				type : 'post',
				data : 'content=' + content + '&id=' + discussid,
				dataType : 'json',
				url : '/student/adddiscussreply',
				success: function(data)
				{
					if(data.retCode == 0)
					{
						alert("添加成功");
						window.location.reload();
					}
					else
					{
						alert(data.msg);
					}
				}
			});;
    	})
</script>