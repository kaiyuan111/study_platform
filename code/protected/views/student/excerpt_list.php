<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>我的摘抄</span></div>
	<div class="search_classs">
		<p>选择查看</p>
			<form class="jqtr" action="#">
            <select name="courseid" id="courseselect">
            	<option value="0" <?php if ($courseId == 0){?> selected="true" <?php }?>>请选择课程</option>
            	<?php foreach ($courseList as $key => $value) {?>
                <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?>&nbsp;</option>
                <?php }?>
            </select>
            <input type="submit" value="&nbsp;确&nbsp;定&nbsp;" />
        </form>
    </div>
	<div class="cont2">
		<div class="My_tittle">摘抄列表</div>
		<div class="Discuss_list" id="wrapper">
			<ul class="menu">
        		<?php $i = 1;foreach ($excerptList as $key => $value){?>
            	<li class="item1" id="list<?php echo $i;?>"><a href="#list<?php echo $i;?>"><?php echo $value['title'];?> </a>
                	<ul>
                    	<div class="Mypostil_cont">
                          	<div class="Mypostil_cont_li">
                          	  <?php foreach ($value['content'] as $eachContent) {?>
                              <b>摘抄：<?php echo $eachContent;?></b><br />
                              <?php }?>
	                              <div class="link">
	                              <a target="_blank" href="/student/learndetail?chapterid=<?php echo $key;?>">详情请见原文<i></i></a>
	                              </div>
                            </div>
                         </div>                                                                
                    </ul>
                </li>
                <?php $i++;}?>
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
