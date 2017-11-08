<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
	<li <?php  if($operation == 'post' && empty($id) && empty($parentid)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('category', array('op' => 'post'))?>">
    添加店铺
    </a></li>
	<li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('category', array('op' => 'display'))?>">管理店铺与菜系</a></li>
    <?php  if(!empty($parentid) && empty($id)) { ?><li class="active"><a href="#">
    添加菜系
    </a></li><?php  } ?>
    <?php  if($operation == 'post' && !empty($id) && $category['parentid'] <1) { ?><li class="active"><a href="#">
    编辑店铺
    </a></li><?php  } ?>
    <?php  if($category['parentid'] >0 && !empty($id)) { ?><li class="active"><a href="#">
    编辑菜系
    </a></li><?php  } ?>
</ul>

<?php  if($operation == 'post') { ?>

<div class="main">

    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />
        <div class="panel panel-default">

            <div class="panel-heading">

                编辑店铺

            </div>

            <div class="panel-body">

                <?php  if(!empty($parentid)) { ?>

                <div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">所属店铺</label>

                    <div class="col-sm-9"><?php  echo $parent['name'];?></div>

                </div>

                <?php  } ?>

                <div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>

                    <div class="col-sm-9">

                        <input type="text" name="displayorder" class="form-control" value="<?php  echo $category['displayorder'];?>" />

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>名称</label>

                    <div class="col-sm-9">

                        <input type="text" name="catename" class="form-control" value="<?php  echo $category['name'];?>" />

                    </div>

                </div>
                
<?php  if($category['parentid']==0 && empty($parentid) ) { ?>
<div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">店铺分类</label>

                    <div class="col-sm-9">
<select name="typeid" class='form-control'>
<option value=""></option>
<?php  if(is_array($shoptype)) { foreach($shoptype as $row) { ?>
							<option value="<?php  echo $row['id'];?>" <?php  if($row['id'] == $category['typeid']) { ?>selected="selected"<?php  } ?>><?php  echo $row['name'];?></option>
<?php  } } ?>

					</select>

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">缩略图</label>

                    <div class="col-sm-9">

                        <?php  echo tpl_form_field_image('thumb', $category['thumb'])?>

                    </div>

                </div>
<div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">设置店铺状态</label>

                    <div class="col-sm-9">
<select name="enabled" class='form-control'>

							<option value="1" <?php  if($category['enabled'] == 1 || !$category['enabled']) { ?>selected="selected"<?php  } ?>>营业中</option>
                            <option value="0" <?php  if($category['enabled'] == 0 && $category['name']) { ?>selected="selected"<?php  } ?>>休息中</option>

					</select>

                    </div>

                </div>
                 <div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">热度</label>

                    <div class="col-sm-9">

                        <input type="text" class="form-control" name="total" value="<?php  echo $category['total'];?>" />

                    </div>
                    </div>
                     <div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">起送价</label>

                    <div class="col-sm-9">

                       <input type="text" class="form-control" name="sendprice" value="<?php  echo $category['sendprice'];?>" />

                    </div></div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">手机号码</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control shouji" name="shouji" value="<?php  echo $category['shouji'];?>" />
                    </div></div>
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">店铺邮箱</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" name="email" value="<?php  echo $category['email'];?>" />
                    </div></div>
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">上午营业时间</label>
                    <div class="col-sm-3">
                       <input type="text" class="form-control" data-field="time" name="time1" value="<?php  echo $ptime1;?>" />
                    </div>
                    <div class="col-sm-1">
                       至
                    </div>
                    <div class="col-sm-3">
					<input type="text" class="form-control" data-field="time" name="time2" value="<?php  echo $ptime2;?>" />
                    </div></div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">下午营业时间</label>
                    <div class="col-sm-3">
                       <input type="text" class="form-control" data-field="time" name="time3" value="<?php  echo $ptime3;?>" />
                    </div>
                     <div class="col-sm-1">
                       至
                    </div>
                    <div class="col-sm-3">
					<input type="text" class="form-control" data-field="time" name="time4" value="<?php  echo $ptime4;?>" />
                    </div></div>
                    
                <div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">店铺介绍</label>

                    <div class="col-sm-9">

                        <textarea name="description" class="form-control" cols="70"><?php  echo $category['description'];?></textarea>

                    </div>          </div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">店铺地址</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" value="<?php  echo $category['address'];?>" />
                    </div> </div>
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">可控制的会员分组</label>
                    <div class="col-sm-9">
<select name="mbgroup" class='form-control'>
<option value=""></option>
<?php  if(is_array($groups)) { foreach($groups as $row) { ?>
<option value="<?php  echo $row['groupid'];?>" <?php  if($row['groupid'] == $category['mbgroup']) { ?>selected="selected"<?php  } ?>><?php  echo $row['title'];?></option>
<?php  } } ?>
</select>
                    </div></div>
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">坐标：</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="loc_x" id="loc_x" value="<?php  echo $category['loc_x'];?>" />
                    </div> 
                    <div class="col-sm-1">——</div> 
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="loc_y" id="loc_y" value="<?php  echo $category['loc_y'];?>" />
                    </div> 
                    </div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9">
                        <div style="width:700px;height:400px" id="container"></div>
                    </div> </div>

            </div>

        </div>
<?php  } ?>
		<div class="form-group col-sm-12">

			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />

			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />

		</div>

    </form>

</div>
<div id="dtBox"></div>
<script type="text/javascript" src="../web/resource/components/colorpicker/spectrum.js"></script>
<link type="text/css" rel="stylesheet" href="../web/resource/components/colorpicker/spectrum.css" />
<link rel="stylesheet" type="text/css" href="../addons/jufeng_wcy/images/DateTimePicker.css" />
<script type="text/javascript" src="../addons/jufeng_wcy/images/DateTimePicker.js"></script>

<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="../addons/jufeng_wcy/images/DateTimePicker-ltie92.css" />
			<script type="text/javascript" src="../addons/jufeng_wcy/images/DateTimePicker-ltie92.js"></script>
		<![endif]-->
<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&key=GVPBZ-MARR3-KV53S-3UZ7A-VYF3Z-PDBHH"></script>
<script type="text/javascript">
$("#dtBox").DateTimePicker(
				{
					dateFormat: "yyyy-MM-dd"
				});
	$(function(){
		colorpicker();
	});
var citylocation,map,marker = null;
var init = function() {
    var center = new qq.maps.LatLng($("#loc_x").val(),$("#loc_y").val());
    var map = new qq.maps.Map(document.getElementById('container'),{
        center: center,
        zoom: 13
    });
if($("#loc_x").val() =='' || $("#loc_y").val() ==''){
 citylocation = new qq.maps.CityService({
        complete : function(result){
            map.setCenter(result.detail.latLng);
        }
    });
    citylocation.searchLocalCity();
	}
qq.maps.event.addListener(map, 'click', function(event) {
	$("#loc_x").val(event.latLng.getLat());
	$("#loc_y").val(event.latLng.getLng());
    });
    var anchor = new qq.maps.Point(10, 30);
    var size = new qq.maps.Size(32, 30);
    var origin = new qq.maps.Point(0, 0);
    var icon = new qq.maps.MarkerImage('../addons/jufeng_wcy/images/locate.png', size, origin, anchor);
    size = new qq.maps.Size(52, 30);
    var originShadow = new qq.maps.Point(32, 0);
    var shadow =new qq.maps.MarkerImage(
        '../addons/jufeng_wcy/images/locate.png', 
        size, 
        originShadow,
        anchor 
    );

    var marker = new qq.maps.Marker({
        icon: icon,
        shadow: shadow,
        map: map,
        position:center,
    });

    var jump = function(event) {
        marker.setPosition(event.latLng);
    };

    qq.maps.event.addListener(map, 'click', jump);
}
</script>


<?php  } else if($operation == 'display') { ?>

<div class="main">

    <div class="category">

        <form action="" method="post" onsubmit="return formcheck(this)">

			<div class="panel panel-default">

				<div class="panel-body table-responsive">

					<table class="table table-hover">

						<thead>

							<tr>

								<th style="width:10px;"></th>

								<th style="width:80px;">排列顺序</th>

								<th style="width:150px;">名称</th>
                                <th style="width:80px;">起送价</th>

								<th style="width:80px;">营业状态</th>
                                <th style="width:80px;">操作</th>
							</tr>

						</thead>

						<tbody>
			<?php  if(is_array($category)) { foreach($category as $row) { ?>
				<tr>
					<td><?php  if(count($children[$row['id']]) > 0) { ?><a href="javascript:;"><i class="icon-chevron-down"></i></a><?php  } ?></td>
					<td><span class="label label-warning"><?php  echo $row['displayorder'];?></span></td>
					<td><div class="type-parent"><?php  echo $row['name'];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php  if(empty($row['parentid'])) { ?><a href="<?php  echo $this->createWebUrl('category', array('parentid' => $row['id'], 'op' => 'post'))?>"><i class="fa fa-plus-circle"></i> 添加菜系</a><?php  } ?></div></td>
                    <td><span><?php  echo $row['sendprice'];?>元</span></td>
                   <?php  if($row['enabled'] == "1") { ?><td><span class="label label-info">营业中</span></td>
                   <?php  } else { ?><td><span class="label label-default">休息中</span></td><?php  } ?>
					<td><a href="<?php  echo $this->createWebUrl('category', array('op' => 'post', 'id' => $row['id']))?>">编辑</a>&nbsp;&nbsp;<a href="<?php  echo $this->createWebUrl('category', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此店铺吗？');return false;">删除</a></td>
				</tr>
				<?php  if(is_array($children[$row['id']])) { foreach($children[$row['id']] as $row) { ?>
				<tr>
					<td></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $row['displayorder'];?></td>
					<td><div class="type-child">————<?php  echo $row['name'];?>&nbsp;&nbsp;</div></td>
                    <td></td>
                      <td></td>
					<td><a href="<?php  echo $this->createWebUrl('category', array('op' => 'post', 'id' => $row['id']))?>">编辑</a>&nbsp;&nbsp;<a href="<?php  echo $this->createWebUrl('category', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此菜系吗？');return false;">删除</a></td>
				</tr>
				<?php  } } ?>
			<?php  } } ?>
				<tr>
					<td></td>
					<td colspan="4">
						<a href="<?php  echo $this->createWebUrl('category', array('op' => 'post'))?>"><i class="fa fa-plus-circle"></i> 添加新店铺</a>
					</td>
				</tr>
			</tbody>

					</table>

				</div>

           </div>

        </form>

    </div>

</div>
<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

