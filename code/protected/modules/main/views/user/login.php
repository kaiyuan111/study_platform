<div id="contentwrapper" class="contentwrapper">
    <div id="basicform" class="subcontent">

            <form class="stdform" action="" method="post">
                <input type='hidden' name='url' value='<?php echo $url;?>'/>

                <p>
                    <label>用户名：</label>
                    <span class="field"><input type="text" name="name"  /></span>
                    <small class="desc"></small>
                </p>

                <p>
                    <label>密码：</label>
                    <span class="field"><input type="password" name="pwd"  /></span>
                </p>

                <p>
                    <input type='submit' name='login_sub' value='登录'/>
                </p>
            </form>
    </div>
</div>

