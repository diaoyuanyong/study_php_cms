<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('stores', array('op' => 'post'))?>">添加门店</a></li>
    <li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('stores', array('op' => 'display'))?>">门店管理</a></li>
</ul>
<?php  if($operation == 'display') { ?>
<style>
    .form-control-excel {
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
</style>
<div class="main">
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="./index.php" method="post" class="form-horizontal form" enctype="multipart/form-data">
                <input type="hidden" name="leadExcel" value="true">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="weisrc_dish" />
                <input type="hidden" name="do" value="UploadExcel" />
                <input type="hidden" name="ac" value="store" />
                &nbsp;<a class="btn btn-primary" href="javascript:location.reload()"><i class="fa fa-refresh"></i> 刷新</a>
                <input name="viewfile" id="viewfile" type="text" value="" style="margin-left: 40px;" class="form-control-excel" readonly>
                <a class="btn btn-primary"><label for="unload" style="margin: 0px;padding: 0px;">上传...</label></a>
                <input type="file" class="pull-left btn-primary span3" name="inputExcel" id="unload" style="display: none;"
                       onchange="document.getElementById('viewfile').value=this.value;this.style.display='none';">
                <input type="submit" class="btn btn-primary " value="导入数据">
                <a class="btn btn-primary" href="../addons/weisrc_dish/example/example_store.xls">下载导入模板</a>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="table-responsive panel-body">
            <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                    <tr>
                        <th style="width:10%;">顺序</th>
                        <th style="width:18%;">名称</th>
                        <th style="width:14%;">电话</th>
                        <th style="width:25%;">地址</th>
                        <th style="width:13%;">订餐类型</th>
                        <th style="width:8%;">状态</th>
                        <th style="width:12%;text-align: right;">管理/编辑/删除</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if(is_array($storeslist)) { foreach($storeslist as $item) { ?>
                    <tr>
                        <td><input type="text" class="form-control" name="displayorder[<?php  echo $item['id'];?>]" value="<?php  echo $item['displayorder'];?>"></td>
                        <td><a href="<?php  echo $this->createWebUrl('stores', array('id' => $item['id'], 'storeid' =>  $item['id'], 'op' => 'post'))?>" title="管理">
                            <img src="<?php  if(strstr($item['logo'], 'http') || strstr($item['logo'], './source/modules/')) { ?><?php  echo $item['logo'];?><?php  } else { ?><?php  echo $_W['attachurl'];?><?php  echo $item['logo'];?><?php  } ?>" onerror="this.src='./resource/images/nopic.jpg';" width="60px;" style="border-radius: 3px;">
                            <br/><?php  echo $item['title'];?></a>
                        </td>
                        <td><?php  echo $item['tel'];?></td>
                        <td><?php  echo $item['address'];?></td>
                        <td>
                            <?php  if(!empty($item['is_meal'])) { ?><span class="label" style="background:#ff6a00;">店内</span><?php  } ?>
                            <?php  if(!empty($item['is_delivery'])) { ?><span class="label" style="background:#ff6a00;">外卖</span><?php  } ?>
                        </td>
                        <td style="width:60px;">
                            <?php  if($item['is_show']==1) { ?>
                            <span class="label" style="background:#56af45;">启用</span>
                            <?php  } else { ?>
                            <span class="label" style="background:#f00;">禁用</span>
                            <?php  } ?>
                        </td>
                        <td style="max-width:60px;text-align: right;">
                            <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('order', array('id' => $item['id'], 'storeid' =>  $item['id']))?>" title="管理"><i class="fa fa-cog"></i></a>
                            <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('stores', array('id' => $item['id'], 'storeid' =>  $item['id'], 'op' => 'post'))?>" title="编辑"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-default btn-sm" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo $this->createWebUrl('stores', array('id' => $item['id'], 'storeid' =>  $item['id'], 'op' => 'delete'))?>" title="删除"><i class="fa fa-times"></i></a>
                            <!--$this->createMobileUrl('waplist', array('storeid' => $item['id']), true)-->
                        </td>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="7">
                            <input name="submit" type="submit" class="btn btn-primary" value="批量修改排序">
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
    <?php  echo $pager;?>
</div>
<script>
    function drop_confirm(msg, url){
        if(confirm(msg)){
            window.location = url;
        }
    }
</script>
<?php  } else if($operation == 'post') { ?>
<link rel="stylesheet" type="text/css" href="../addons/weisrc_dish/plugin/clockpicker/clockpicker.css" media="all">
<script type="text/javascript" src="../addons/weisrc_dish/plugin/clockpicker/clockpicker.js"></script>
<link rel="stylesheet" type="text/css" href="../addons/weisrc_dish/plugin/clockpicker/standalone.css" media="all">
<link rel="stylesheet" type="text/css" href="../addons/weisrc_dish/template/css/uploadify_t.css?v=2" media="all" />
<style>
    .item_box img{
        width: 100%;
        height: 100%;
    }
</style>
<script>
    $(function(){
        $('.clockpicker').clockpicker();
    })
</script>
<div class="main">
    <form action="" method="post" onsubmit="return check();" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                基本信息
            </div>
            <div class="panel-body">
                <?php  if(!empty($reply)) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">链接网址</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">
                            <font color="#428bca"><?php echo $_W['siteroot'] . 'app/index.php?i=' . $reply['weid'] . '&c=entry&storeid=' . $reply['id'] . '&do=waplist&m=weisrc_dish'?></font>
                        </p>
                    </div>
                </div>
                <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">门店名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="<?php  echo $reply['title'];?>" id="title" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">门店Logo</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('logo', $reply['logo'])?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">公告</label>
                    <div class="col-sm-9">
                        <input type="text" name="announce" value="<?php  echo $reply['announce'];?>" id="announce" class="form-control" />
                        <div class="help-block">在门店详细页显示</div>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">门店简介</label>
                    <div class="col-sm-9">
                        <input type="text" name="info" value="<?php  echo $reply['info'];?>" id="info" class="form-control" />
                        <div class="help-block">在门店列表显示</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">门店类型</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="type" id="type">
                            <option value="0">请选择</option>
                            <?php  if(is_array($shoptype)) { foreach($shoptype as $item) { ?>
                            <option value="<?php  echo $item['id'];?>" <?php  if($reply['typeid']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">所属区域</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="area" id="area">
                            <option value="0">请选择</option>
                            <?php  if(is_array($area)) { foreach($area as $item) { ?>
                            <option value="<?php  echo $item['id'];?>" <?php  if($reply['areaid']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">门店级别</label>
                    <div class="col-sm-9">
                        <select name="level" id="level" class="form-control">
                            <option value="1"<?php  if($reply['level']==1) { ?> selected<?php  } ?>>★</option>
                            <option value="2"<?php  if($reply['level']==2) { ?> selected<?php  } ?>>★★</option>
                            <option value="3"<?php  if(empty($reply) || $reply['level']==3) { ?> selected<?php  } ?>>★★★</option>
                            <option value="4"<?php  if($reply['level']==4) { ?> selected<?php  } ?>>★★★★</option>
                            <option value="5"<?php  if($reply['level']==5) { ?> selected<?php  } ?>>★★★★★</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">人均消费</label>
                    <div class="col-sm-9">
                        <input type="text" name="consume" class="form-control" value="<?php  if(empty($reply)) { ?>20.0<?php  } else { ?><?php  echo $reply['consume'];?><?php  } ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">营业时间</label>
                    <div class="col-sm-3">
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" value="<?php  echo $reply['begintime'];?>" name="begintime">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                                </span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" value="<?php  echo $reply['endtime'];?>" name="endtime">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提供服务</label>
                    <div class="col-sm-9">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="enable_wifi" name="enable_wifi" value=1 <?php  if($reply['enable_wifi']==1) { ?>checked<?php  } ?>/>wifi
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="enable_card" name="enable_card" value=1 <?php  if($reply['enable_card']==1) { ?>checked<?php  } ?>/>刷卡
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="enable_room" name="enable_room" value=1 <?php  if($reply['enable_room']==1) { ?>checked<?php  } ?>/>包厢
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="enable_park" name="enable_park" value=1 <?php  if($reply['enable_park']==1) { ?>checked<?php  } ?>/>停车
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">门店介绍</label>
                    <div class="col-sm-9">
                        <textarea style="height:200px; width:535px;" class="form-control richtext" name="content" cols="70" id="reply-add-text"><?php  echo $reply['content'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">电话</label>
                    <div class="col-sm-9">
                        <input type="text" name="tel" id="tel" value="<?php  echo $reply['tel'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">地址</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" id="address" value="<?php  echo $reply['address'];?>" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">坐标</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_coordinate('baidumap', $reply)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">启用门店</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_show" value="1" <?php  if($reply['is_show']==1 || empty($reply)) { ?>checked<?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_show" value="0" <?php  if(isset($reply['is_show']) && empty($reply['is_show'])) { ?>checked<?php  } ?>>否
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否推荐</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_hot" value="1" <?php  if($reply['is_hot']==1 || empty($reply)) { ?>checked<?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_hot" value="0" <?php  if(isset($reply['is_hot']) && empty($reply['is_hot'])) { ?>checked<?php  } ?>>否
                        </label>
                        <div class="help-block">
                            在搜索页显示
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="displayorder" value="<?php  echo $reply['displayorder'];?>" id="displayorder" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="panel-heading">
                点餐设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">店内消费</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_meal" value="1" <?php  if($reply['is_meal']==1 || empty($reply)) { ?>checked<?php  } ?>>启用
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_meal" value="0" <?php  if(isset($reply['is_meal']) && empty($reply['is_meal'])) { ?>checked<?php  } ?>>关闭
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">外卖订餐</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_delivery" value="1" <?php  if($reply['is_delivery']==1 || empty($reply)) { ?>checked<?php  } ?>>启用
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_delivery" value="0" <?php  if(isset($reply['is_delivery']) && empty($reply['is_delivery'])) { ?>checked<?php  } ?>>关闭
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">外卖配送费用</label>
                    <div class="col-sm-9">
                        <input type="text" name="dispatchprice" class="form-control" value="<?php  echo $reply['dispatchprice'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">消费满多少元免配送费</label>
                    <div class="col-sm-9">
                        <input type="text" name="freeprice" class="form-control" value="<?php  echo $reply['freeprice'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">外卖起送价格</label>
                    <div class="col-sm-9">
                        <input type="text" name="sendingprice" class="form-control" value="<?php  echo $reply['sendingprice'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首次下单短信验证</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_sms" value="1" <?php  if($reply['is_sms']==1) { ?>checked<?php  } ?>>启用
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_sms" value="0" <?php  if(empty($reply['is_sms'])) { ?>checked<?php  } ?>>关闭
                        </label>
                        <?php  if(!empty($reply)) { ?>
                        <div class="help-block"><a href="<?php  echo $this->createWebUrl('smssetting', array('storeid' => $reply['id']))?>">短信配置</a></div>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>
</div>
<script language='javascript'>
    require(['jquery', 'util'], function ($, u) {
        $(function () {
            u.editor($('.richtext')[0]);
        });
    });
</script>
<script type="text/javascript">
    function check() {
        if($.trim($('#title').val()) == '') {
            message('没有输入门店名称.', '', 'error');
            return false;
        }
        return true;
    }
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
