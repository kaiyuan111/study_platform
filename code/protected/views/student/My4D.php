<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span> 我的4D</span></div>
         <div class="cont">
         	<div class="My4D_tittle">课程列表</div>
             <!-- <div class="Class_tittle">计算机科学类</div> -->
             <div class="my4D_list">
             	<ul>
             		<?php foreach ($courseList as $key => $value) {?>
                 	<li><a href="/student/cataloguelist?courseid=<?php echo $value['id'];?>"><?php echo $value['name'];?></a></li>
                 	<?php }?>
                 </ul>
             </div>
		<div class="page">
         	<ul>
             	<li class="up"><a href="#">&nbsp;</a></li>
             	<li><a href="">1</a></li>
             	<li><a href="">2</a></li>
             	<li><a href="">3</a></li>
             	<li><a href="">4</a></li>
             	<li class="down"><a href="#">&nbsp;</a></li>
                 
             </ul>
		</div>
	</div>
</div>