<div class="Add_Class_content">
	<div class="top"><img src="/images/frame/cont_home.png" align="absmiddle" class="home" /><span>内容管理</span></div>
        <div class="cont_e">
          <div class="tittle_e">编辑内容</div>
          <div class="form_a">
            <div class="biaoti16">课题名称：网页设计<?php //echo $currentCourse['name'];?></div>
            <div class="biaoti15">
              <div class="w">编辑内容:</div>
              <div class="r">
                <div id="r_top">
                  <div style="width:96%" class="bianji">
				  <input name="textfield" type="text" id="bianji" value="第一章地质学研学研究对象" />
				</div>
                </div>
                <textarea name="content" id="editorContent"></textarea>
              </div>
            </div>
            <div class="biaoti17"><img src="/images/frame/im39.jpg" width="81" height="31" border="0" /></div>
            <form class="jqtr" action="#">
              <ul>
                <div class="blue3_bjxt"><span style="color:#666666">编辑习题：</span></div>
                <li class="o_none"><span class="blue4_bjxt">
                  <select name="select" style="width:150px">
                    <option value="0">问答题&nbsp;</option>
                    <option value="1">1&nbsp;</option>
                    <option value="1">2&nbsp;</option>
                    <option value="1">3&nbsp;</option>
                  </select>
                </span><span class="l">&nbsp;&nbsp;&nbsp;</span></li>
              </ul>
              <div style="width:90%">
                <!-- 问题1 开始-->
                <div id="xuanxiang_x">
                  <div class="xuanxiang">1.什么是网页设计？</div>
                  <div class="xuanxiang_im"><img src="/images/frame/im40.jpg" width="18" height="18" /></div>
                  <div class="xuanxiang_im"><img src="/images/frame/im41.jpg" width="18" height="18" /></div>
                </div>
                <!-- 问题1 结束-->
                <!-- 问题2 开始-->
                <div id="xuanxiang_x">
                  <div class="xuanxiang">2.一公斤铁盒一公斤棉花哪个轻？</div>
                  <div class="xuanxiang_im"><img src="/images/frame/im40.jpg" width="18" height="18" /></div>
                  <div class="xuanxiang_im"><img src="/images/frame/im41.jpg" width="18" height="18" /></div>
                </div>
                <!-- 问题2 结束-->
                <!-- 问题3 开始-->
                <div id="xuanxiang_x">
                  <div class="xuanxiang">3.现在的世界杯冠军奖杯定名为？</div>
                  <div class="xuanxiang_im"><img src="/images/frame/im40.jpg" width="18" height="18" /></div>
                  <div class="xuanxiang_im"><img src="/images/frame/im41.jpg" width="18" height="18" /></div>
                </div>
                <!-- 问题3 结束-->
              </div>
              <div class="xuanxiang">
                <ul>
                  <li class="li"><span class="r">
                    <input name="name" type="text" value="题目" size="31"/>
                  </span></li>
                </ul>
              </div>
            </form>
            <!-- 页码开始-->
            <!-- 页码结束-->
          </div>
          <div class="biaoti19"><img src="/images/frame/im39.jpg" width="81" height="31" border="0" /></div>
          <div class="clear"></div>
          
        </div>
		<div class="newz_k_foot"></div>
      </div>
      <!-- 返回按钮 开始-->
      <div class="fanhui"><img src="/images/frame/im42.jpg" width="96" height="33" border="0" /></div>
      
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<SCRIPT type="text/javascript" src="/ueditor/ueditor.all.js"></SCRIPT> 

<SCRIPT type=text/javascript>  
    var editor = new UE.ui.Editor();  
    editor.render("editorContent");  
    //1.2.4以后可以使用一下代码实例化编辑器 
    //UE.getEditor('myEditor') 
</SCRIPT> 