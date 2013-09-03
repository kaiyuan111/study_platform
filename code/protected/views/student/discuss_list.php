<div class="Add_Class_content">
        	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>我的讨论</span></div>
            <div class="cont">
            	<div class="Discuss_tittle">讨论主题</div>
            	<?php if (!empty($originalDis)) {?>
                <div class="Mydiscuss_list">
                <h2>我发起的讨论</h2>
                    <ul>
                        <?php foreach ($originalDis as $key => $value) {?>
                        	<li ><a href="/student/discussdetail?id=<?php echo $value['id'];?>"><?php echo $value['title'];?> </a></li>
                        <?php }?>
                    </ul>
                </div>
                <?php }?>
                <?php if (!empty($joindDis)) {?>
                <div class="Mydiscuss_list">
                <h2>我参与的讨论</h2>
                    <ul>
                        <?php foreach ($joindDis as $key => $value) {?>
                        	<li ><a href="/student/discussdetail?id=<?php echo $value['id'];?>"><?php echo $value['title'];?> </a></li>
                        <?php }?>
                    </ul>
                </div>
                <?php }?>
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