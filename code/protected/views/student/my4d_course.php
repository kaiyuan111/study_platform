<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span> 我的4D</span></div>
	<div class="cont">
		<div class="My4D_tittle">课程目录</div>
		<div class="My4D_cont">
			<div class="View_tittle"><?php echo $courseInfo['name'];?></div>
			<div class="View_writer">作者：<?php echo $courseCreator['uname'];?><!--  <br />出版社：人民邮电出版社--></div>
			<div class="View_summary"><b>内容简介：</b>
				<p><?php echo $courseInfo['desc'];?></p>
			</div>
			<div class="View_catalogue">目录：</div>
			<div class="View_catalogue_list">
				<ul>
					<?php foreach ($courseCatalogue as $key => $value) {?>
						<li><a href="/student/learndetail?chapterid=<?php echo $value['id'];?>"><?php echo $value['title'];?></a></li>
					<?php }?>
				</ul>
 			</div>
		</div>
	</div>
</div>