<div class="Add_Class_content">
  <div class="top">
    <img src="/images/frame/cont_home.png" align="absmiddle" class="home" />
    <span>用户管理</span>
    <div class="right_top_sous">
      <form class='jqtr' method='post' action='/main/user/list'>
        <ul>
          <li class="li">
            <span class="k">
              <input name="name" type="text" size="21"/>
                <input type="submit" style="font-size:14px;" value="&nbsp;查&nbsp;询&nbsp;"/>
            </span>
          </li>
        </ul>

      </form>

    </div>
  </div>

  <div class="cont" style="height:600px">
    <div class="tittle_c">编辑用户</div>
    <?php if($label=='has_usr') { ?>
    <div class='tip'>已经有此用户</div>
    <?php } ?>
    <div class="form">
      <form  class='jqtr' method='post' action='/main/user/edit'>
        <input type='hidden' name='id' value='<?php echo !empty($entity['uid']) ? $entity['uid']:''; ?> ' /> <br>
        <ul>
          <li class="li">
            <span class="k" style="height:42px">
              <input name="name" type="text" class="input" value="<?php echo !empty($entity['uname']) ? htmlspecialchars($entity['uname']):'用户名';?>" size="31"/></span>
          </li>
          <li class="li">
            <span class="k" style="height:42px">
              <input name="pwd" type="text" class="input" value="<?php echo !empty($entity['pwd']) ? htmlspecialchars($entity['pwd']):'密码';?>" size="31"/></span>
          </li>
          <li class="li">
            <span class="k" style="height:42px">
              <input name="email" type="text" class="input" value="<?php echo !empty($entity['email']) ? htmlspecialchars($entity['email']):'邮箱';?>" size="31"/></span>
          </li>
          <li class="o_none">
            <span class="k"  style="height:42px">
              <select id='role_select' name="rid" style="width:160px;">
                <?php foreach($roles as $role) {?>
                <option value ="<?php echo $role['rid'];?> "> <?php echo htmlspecialchars($role['rname']);?></option>
                <?php }?>
              </select>
            </span>
          </li>

        </ul>
        <div class="submit_a">
          <input type="submit" name='modify' value='&nbsp;&nbsp;确&nbsp;&nbsp;定&nbsp;&nbsp;' />
        </div>
      </form>

    </div>
    <!--form--> </div>
  <!--cont-->
  <div class="newz_k_foot"></div>
</div>
<!--Add_Class_content-->

<script type='text/javascript'>
(function($){
    roleid = '<?php echo !empty($entity['rid']) ? $entity['rid']:''; ?>';
    $("#role_select option[value='"+roleid+"']").attr('selected','selected');
})(jQuery)
</script>
