<?php if($label=='has_role') { ?>
<div class='tip'>已经有此角色</div>
<?php } ?>
<form method='post' action='/main/role/edit'>
角色id:<?php echo !empty($entity['rid']) ? $entity['rid']:''; ?>
<input type='hidden' name='id' value='<?php echo !empty($entity['rid']) ? $entity['rid']:''; ?>' /><br>
角色名:<input type='text' name='name' value='<?php echo !empty($entity['rname']) ? htmlspecialchars($entity['rname']):''; ?>'/><br>
<p>权限列表：</p>
<?php foreach($action_list as $key=>$action) { ?>
<?php $check = !empty($entity['actions'])&&in_array($action['aid'],$entity['actions']) ? 'checked' : '';?>
<input type='checkbox' name='actions[<?php echo $key;?>]' value='<?php echo $action['aid']; ?>' <?php echo $check;?> '/><?php echo $action['aname']; ?><br>
<?php } ?>
<input type='submit' name='modify' value="提交">
</form>

<script type='text/javascript'>
(function($) {
})(jQuery)
</script>
