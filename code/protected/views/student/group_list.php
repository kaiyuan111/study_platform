<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>我的小组</span></div>
	<div class="cont">
		<div class="myclass_tittle">小组列表</div>
		<div class="myclass_list">    
 			<ul>
 				<?php foreach ($groupList as $key => $value) {?>
				<li>
				<span class="l">
					<a href="MyClass_view.html">
					<img src="/images/frame/myclass2.png" /></a>
				</span>
				<span class="r">
					<div class="t"><a href="MyClass_view.html"><?php echo $value['name'];?></a></div>
					<?php echo $value['description'];?>
				</span>
				</li>
				<?php }?>
            </ul>
        </div>
		<!--  <div class="page">
          	<ul>
              	<li class="up"><a href="#">&nbsp;</a></li>
              	<li><a href="">1</a></li>
              	<li><a href="">2</a></li>
              	<li><a href="">3</a></li>
              	<li><a href="">4</a></li>
              	<li class="down"><a href="#">&nbsp;</a></li>
                  
              </ul>
		 </div>-->
	</div>
</div>