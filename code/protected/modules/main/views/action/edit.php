<?php if($label=='has_action') { ?>
<div class='tip'>已经有此角色</div>
<?php } ?>
<form method='post' action='/main/action/edit'>
路由id:<?php echo !empty($entity['aid']) ? $entity['aid']:''; ?>
<input type='hidden' name='id' value='<?php echo !empty($entity['aid']) ? $entity['aid']:''; ?>' /><br>
路由名:<input type='text' name='name' value='<?php echo !empty($entity['aname']) ? htmlspecialchars($entity['aname']):''; ?>'/><br>
路由信息:<input type='text' name='route' value='<?php echo !empty($entity['route']) ? htmlspecialchars($entity['route']):''; ?>'/><br>
是否菜单:<input type='checkbox' name='is_menu'  <?php echo !empty($entity['is_menu']) ? 'checked' : ''; ?>/><br>

<input type='submit' name='modify' value="提交">
</form>
