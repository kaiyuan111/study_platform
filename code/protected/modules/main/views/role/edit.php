<?php if($label=='has_role') { ?>
<div class='tip'>已经有此角色</div>
<?php } ?>
<form method='post' action='/main/role/edit'>
角色id:<?php echo !empty($entity['rid']) ? $entity['rid']:''; ?>
<input type='hidden' name='id' value='<?php echo !empty($entity['rid']) ? $entity['rid']:''; ?>' /><br>
角色名:<input type='text' name='name' value='<?php echo !empty($entity['rname']) ? htmlspecialchars($entity['rname']):''; ?>'/><br>
<p>权限列表：</p>
<?php foreach($action_list as $key=>$action) { ?>
    <?php $check = !empty($entity['actions'])&&isset($entity['actions'][$action['aid']]) ? 'checked' : '';?>
    <input type='checkbox' name='actions[<?php echo $key;?>]' value='<?php echo $action['aid']; ?>' <?php echo $check;?> /><?php echo $action['aname']; ?>
    <?php if($action['is_menu']) {?>
        <?php if(isset($entity['actions'][$action['aid']])) {?>
        <div id="position_<?php echo $action['aid']; ?>">
        --菜单位置：<input type='text' name='positions[<?php echo $action['aid'];?>]' value='<?php echo $entity['actions'][$action['aid']]; ?>'  />
        </div>
        <?php } else {?>
        <div id="position_<?php echo $action['aid']; ?>" style="display:none;">
        --菜单位置：<input type='text' name='positions[<?php echo $action['aid'];?>]' value='0'  />
        </div>
        <?php } ?>
    <?php } ?>
    <br>
<?php } ?>
<input type='submit' name='modify' value="提交">
</form>

<script type='text/javascript'>
(function($) {
    $("input[type=checkbox]").on('click',function() {
        name = "#position_"+$(this).val();
        if($(this).attr('checked')) {
            $(name).css('display','');
        } else {
            $(name).css('display','none');
        }
    });
})(jQuery)
</script>
