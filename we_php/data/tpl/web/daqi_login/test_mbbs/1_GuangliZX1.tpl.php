<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<form class="form-horizontal" method="POST" action="">
    <h2 class="text-center">活动</h2>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">活动名称</label>
            <div class="col-sm-10">
              <input type="text" name="gongzhongid" value =""  class="form-control" id="inputEmail3" placeholder="活动名称" >
            </div>
         </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">用户名称</label>
            <div class="col-sm-10">
              <input type="text" name="yonghuming" value="" class="form-control" id="inputEmail3" placeholder="用户名称">
            </div>
      </div>
    <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">活动时间</label>
          <div class="col-sm-10">
            <input type="text" name="huodongshijiang" value="" class="form-control" id="inputPassword3" placeholder="开始活动时间自动生成，可以选择不填">
          </div>
    </div>
    <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-default" name="submit" value="提  交"/>
            <input type ="hidden" name ="token" value="<?php  echo $_W['token'];?>" />
          </div>
    </div>
</form>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
