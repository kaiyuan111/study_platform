<?php if($label=='has_action') { ?>
<div class='tip'>已经有此角色</div>
<?php } ?>
<form method='post' action='/main/action/edit'>
路由id:<?php echo !empty($entity['aid']) ? $entity['aid']:''; ?>
<input type='hidden' name='id' value='<?php echo !empty($entity['aid']) ? $entity['aid']:''; ?>' /><br>
路由名:<input type='text' name='name' value='<?php echo !empty($entity['aname']) ? htmlspecialchars($entity['aname']):''; ?>'/><br>
路由信息:<input type='text' name='route' value='<?php echo !empty($entity['route']) ? htmlspecialchars($entity['route']):''; ?>'/><br>
是否菜单:<input type='checkbox' name='is_menu'  <?php echo !empty($entity['is_menu']) ? 'checked' : ''; ?>/><br>
<br>
<div class="logo_paths_choose">
<div>logo：</div>
<?php foreach($logopaths as $path) { ?>
<ul class='normal_table'>
<li><input type='checkbox' name='logopath' value='<?php echo $path['unionpath'];?>' <?php echo $path['path']==$entity['logo'] ? 'checked' : ''; ?>/><img src='<?php echo $path['path'];?>'/><img src='<?php echo $path['clickpath'];?>'/></li>
</ul>
<?php } ?>
</div>


<input type='submit' name='modify' value="提交">
</form>
