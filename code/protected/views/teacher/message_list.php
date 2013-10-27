<div class="Add_Class_content">
	<div class="top">
		<img src="/images/frame/cont_home.png" align="absmiddle" class="home" />
		<span>查看消息</span>
	</div>
	<div class="cont">
		<div class="Info_tittle">消息列表</div>
		<div class="info_list" id="wrapper">
			<div class="info_list_top">
				<ul>
					<li class="info_li_1">状态</li>
					<li class="info_li_2">发件人</li>
					<li class="info_li_3">主题</li>
					<li class="info_li_4">时间</li>
					<li class="info_li_5">操作</li>
				</ul>
			</div>
			<ul class="info_list_cont">
				<?php foreach($infos as $c) {?>
				<li id="list<?php echo $c['id']?>">
                    <div>
                        <span class="info_li_1">
                            <?php if(!$c["is_read"]) {?>
                            <img src="/images/frame/email_no_ico.png" align="absmiddle" />
                            <?php } else { ?>
                            <img src="/images/frame/email_ico.png" align="absmiddle" />
                            <?php } ?>
                        </span>
                        <span class="info_li_2" ><?php echo htmlspecialchars($c['uname_from'])?></span>
                        <span class="info_li_3" data-messid="<?php echo $c['id']?>">
                            <a href="#list<?php echo $c['id']?>"><?php echo $c['title']?></a>
                        </span>
                        <span class="info_li_4"><?php echo $c['request_time']?></span>
                        <span class="info_li_5">
                            <img src="/images/frame/del_ico.png" align="absmiddle" />
                        </span>
                    </div>
                    <!--老师申请编辑-->
                    <?php if($c['type']=='request_edit_class') {?>
                    <ul>
                        <div class="info_cont"> <b><?php echo htmlspecialchars($c['uname_from'])?></b>
                            向您申请编辑《<?php echo htmlspecialchars($c['coursename'])?>》，是否同意？
                            <br />
                            <a data-cid="<?php echo htmlspecialchars($c['courseid'])?>" data-fromid="<?php echo htmlspecialchars($c['uid_from'])?>" data-infoid="<?php echo htmlspecialchars($c['id'])?>" class="bt_ok" href="javascript: void(0)">
                                <img src="/images/frame/info_ok.png" />
                            </a>
                            <a data-cid="<?php echo htmlspecialchars($c['courseid'])?>" data-fromid="<?php echo htmlspecialchars($c['uid_from'])?>" data-infoid="<?php echo htmlspecialchars($c['id'])?>" class="bt_no" href="javascript: void(0)">
                                <img src="/images/frame/info_no.png" />
                            </a>
                        </div>
                    </ul>
                    <!--通知消息-->
                    <?php } elseif($c['type']=='notify') { ?>
                    <ul>
                        <div class="info_cont"> <b><?php echo htmlspecialchars($c['uname_from'])?></b>
                            <?php echo htmlspecialchars($c['content'])?>
                            <br />
                        </div>
                    </ul>
                    <?php } ?>
                </li>
				<?php } ?>
				<!--
				<li id="list7">
					<div>
						<span class="info_li_1">
							<img src="/images/frame/email_ico.png" align="absmiddle" />
						</span>
						<span class="info_li_2">李四</span>
						<span class="info_li_3">
							<a href="#list7">申请编辑课程</a>
						</span>
						<span class="info_li_4">6月18日</span>
						<span class="info_li_5">
							<img src="/images/frame/del_ico.png" align="absmiddle" />
						</span>
					</div>
					<ul>
						<div class="info_cont">
							<b>李四</b>
							向您申请编辑《网页设计》，是否同意？
							<br />
							<a href="">
								<img src="/images/frame/info_ok.png" />
							</a>
							<a href="">
								<img src="/images/frame/info_no.png" />
							</a>
						</div>
					</ul>
				</li>
				-->
			</ul>
		</div>
		<div class="page">
			<ul>
				<li class="up">
					<a href="#">&nbsp;</a>
				</li>
				<li>
					<a href="">1</a>
				</li>
				<li>
					<a href="">2</a>
				</li>
				<li>
					<a href="">3</a>
				</li>
				<li>
					<a href="">4</a>
				</li>
				<li class="down">
					<a href="#">&nbsp;</a>
				</li>

			</ul>
		</div>
	</div>
</div>
<script>
	(function($){
        $(".info_li_3").on("click",function(e) {
            // 替换为已读符号
            $(this).prevAll(".info_li_1").find("img").replaceWith("<img src='/images/frame/email_ico.png' align='absmiddle' />");
            $.post(
                "/teacher/messmarkread",
                {
                    'mid':$(this).data("messid")
                },
                function(data) {
                    console.log(data);
                }
            );
        });
		$(".bt_ok").on("click",function(e) {
			$.post(
				"/teacher/returnmessage",
				{
					'infoid':$(this).data("infoid"),
					'fromid':$(this).data("fromid"),
					'courseid':$(this).data("cid"),
					'responce':1
				},
				function(data) {
					//console.log(data);
					window.location.reload();
				}
			);
		});
		$(".bt_no").on("click",function(e) {
			$.post(
				"/teacher/returnmessage",
				{
					'infoid':$(this).data("infoid"),
					'fromid':$(this).data("fromid"),
					'courseid':$(this).data("cid"),
					'responce':0
				},
				function(data) {
					//console.log(data);
					window.location.reload();
				}
			);
		});
	})(jQuery)
</script>
