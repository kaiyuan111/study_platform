<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>我的小组</span></div>
	<div class="cont">
 		<div class="myclass_tittle">小组信息</div>
 		<div class="myclass_list_view">    
			<span class="l">
            <div class="t"><img src="/images/frame/myclasss1.png" width="50" height="50" align="absmiddle" /><?php echo $groupinfo['name']?></div>
				<div class="c"><!--<div class="out_class"><a href=""><img src="/images/frame/out_class.png" /></a></div>-->
                        	创建于2008-05-06     <br />
                            组长： <a href=""><?php echo $leaderinfo['uname']?></a> <br />
                            助教： 
                            <?php foreach($assists as $a) {?>
                            <a href=""><?php echo $a['uname']?> </a>    
                            <?php } ?><br />
                            <p><?php echo $groupinfo['description']?></p>
                </div>
                <!--
				<div class="move">
                	<div class="move_tittle">学习课程</div>
                    <ul>
                    	<li><a href="">高端网站 VI制作</a></li>
                        <li><a href="">如何创网站专业相关做网站</a></li>
                    	<li><a href="">高端网站 VI制作</a></li>
                        <li><a href="">如何创网站专业相关做网站</a></li>
                        <li><a href="">如何创网站专业相关做网站</a></li>
                    </ul>
                 </div>
                 -->
             </span>
             <span class="r">
             	<div class="t">小组成员</div>
                 <ul>
                 <?php foreach($groupusers as $a) {?>
                 <li><a><?php echo $a['uname'];?></a></li>
                <?php }?>
                 </ul>
             </span>
                    
		</div>
	</div>
</div>
