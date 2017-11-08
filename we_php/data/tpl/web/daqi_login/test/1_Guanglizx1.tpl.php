<?php defined('IN_IA') or exit('Access Denied');?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<form class="form-horizontal" method="POST" action="">
    <h2 class="text-center">活动</h2>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">用户名称</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" placeholder="用户名称">
            </div>
      </div>
    <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">活动时间</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3" placeholder="活动时间">
          </div>
    </div>
    <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">提  交</button>
          </div>
    </div>
</form>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
