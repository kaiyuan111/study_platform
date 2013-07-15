
<?php foreach($actions as $k=>$v) { ?>
<?php if($v['is_menu']) ?>
<a href='<?php echo $v['route']?>'><?php echo $v['aname']?></a>
<?php } ?>
