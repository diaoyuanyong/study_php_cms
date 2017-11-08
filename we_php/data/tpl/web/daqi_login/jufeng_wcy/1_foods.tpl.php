<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
	<li <?php  if($operation == 'post' && empty($id)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('foods', array('op' => 'post'))?>">添加菜品</a></li>
	<li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('foods', array('op' => 'display'))?>">管理菜品</a></li>
    <?php  if($operation == 'post' && !empty($id)) { ?><li class="active"><a href="#">
    编辑菜品
    </a></li><?php  } ?>
</ul>

<?php  if($operation == 'post') { ?>

<div class="main">

    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        <div class="panel panel-default">

            <div class="panel-heading">
                菜品信息
            </div>

            <div class="panel-body">

  <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">店铺与菜系</label>
                    <div class="col-sm-4">
<select name="pcate" onchange="fetchChildCategory(this.options[this.selectedIndex].value)" class='form-control'>
							<option value="0">请选择店铺</option>
						<?php  if(is_array($category)) { foreach($category as $row) { ?>
						<?php  if($row['parentid'] == 0) { ?>
						<option value="<?php  echo $row['id'];?>" <?php  if($row['id'] == $item['pcate']) { ?> selected="selected"<?php  } ?>><?php  echo $row['name'];?></option>
						<?php  } ?>
						<?php  } } ?>
					</select>
                    </div>
                    <div class="col-sm-4">
                    <select id="cate_2" name="ccate" autocomplete="off" class='form-control'>
							<option value="0">请选择菜系</option>
						<?php  if(!empty($item['pcate']) && !empty($children[$item['pcate']])) { ?>
						<?php  if(is_array($children[$item['pcate']])) { foreach($children[$item['pcate']] as $row) { ?>
						<option value="<?php  echo $row['0'];?>" <?php  if($row['0'] == $item['ccate']) { ?> selected="selected"<?php  } ?>><?php  echo $row['1'];?></option>
						<?php  } } ?>
						<?php  } ?>
					</select>
                    </div>   </div>
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">菜品名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" value="<?php  echo $item['title'];?>" />
                    </div></div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">菜品单位</label>
                    <div class="col-sm-9">
                        <input type="text" name="unit" class="form-control" value="<?php  echo $item['unit'];?>" />
                    </div></div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否上架</label>
                    <div class="col-sm-9">
                    <label class='radio-inline'>
                             <input type='radio' name='status' value='1' <?php  if($item['status'] == 1 || empty($item['id'])) { ?>checked<?php  } ?> /> 是
                         </label>
                         <label class='radio-inline'>
                             <input type='radio' name='status' value='0' <?php  if($item['status'] == 0 && !empty($item['id'])) { ?>checked<?php  } ?> /> 否
                         </label>
                    </div></div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否推荐</label>
                    <div class="col-sm-9">
                    <label class='radio-inline'>
                             <input type='radio' name='ishot' value='1' <?php  if($item['ishot'] == 1) { ?>checked<?php  } ?> /> 是
                         </label>
                         <label class='radio-inline'>
                             <input type='radio' name='ishot' value='0' <?php  if($item['ishot'] == 0) { ?>checked<?php  } ?> /> 否
                         </label>
                    </div></div>
                 <div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">缩略图</label>

                    <div class="col-sm-9">

                        <?php  echo tpl_form_field_image('thumb', $item['thumb'])?>

                    </div>

                </div>
            
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">优惠价</label>
                    <div class="col-sm-9">
                    <div class="input-group">
                       <input type="text" class="form-control" name="preprice" value="<?php  echo $item['preprice'];?>" />
                       <span class="input-group-addon">元</span>
                       </div>
                    </div></div>
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">原价</label>
                    <div class="col-sm-9">
                    <div class="input-group">
                       <input type="text" class="form-control" name="oriprice" value="<?php  echo $item['oriprice'];?>" />
                       <span class="input-group-addon">元</span>
                       </div>
                    </div></div>
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">热度</label>
                    <div class="col-sm-9">
                    <div class="input-group">
                       <input type="text" class="form-control" name="hits" value="<?php  echo $item['hits'];?>" />
                       <span class="input-group-addon">次</span>
                       </div>
                       <span class="help-block">已被顾客选择次数</span>
                    </div></div>

            </div>

        </div>
		<div class="form-group col-sm-12">

			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />

			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />

		</div>

    </form>

</div>
<?php  } else if($operation == 'display') { ?>

<div class="main">
 <div class="panel panel-info">

	<div class="panel-heading">筛选</div>

	<div class="panel-body">

		<form action="./index.php" method="get" class="form-horizontal" role="form">

			<input type="hidden" name="c" value="site" />

			<input type="hidden" name="a" value="entry" />

        	<input type="hidden" name="m" value="jufeng_wcy" />

        	<input type="hidden" name="do" value="foods" />

			<div class="form-group">

				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>

				<div class="col-sm-8 col-lg-9">

					<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">

				</div>

			</div>

			<div class="form-group">

				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">状态</label>

				<div class="col-sm-8 col-lg-9">

					<select name="status" class='form-control'>
                            <option value="1" selected>上架</option>
							<option value="0">下架</option>
					</select>

				</div>

			</div>

            <div class="form-group">

				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">分类</label>

				<div class="col-sm-4">
<select name="cate_1" onchange="fetchChildCategory(this.options[this.selectedIndex].value)" class='form-control'>
							<option value="0">请选择店铺</option>
						<?php  if(is_array($category)) { foreach($category as $row) { ?>
						<?php  if($row['parentid'] == 0) { ?>
						<option value="<?php  echo $row['id'];?>" <?php  if($row['id'] == $_GPC['cate_1']) { ?> selected="selected"<?php  } ?>><?php  echo $row['name'];?></option>
						<?php  } ?>
						<?php  } } ?>
					</select>

				</div>

				<div class="col-sm-4">
 <select id="cate_2" name="cate_2" class='form-control input-medium'>
							<option value="0">请选择菜系</option>
						<?php  if(!empty($_GPC['cate_1']) && !empty($children[$_GPC['cate_1']])) { ?>
						<?php  if(is_array($children[$_GPC['cate_1']])) { foreach($children[$_GPC['cate_1']] as $row) { ?>
						<option value="<?php  echo $row['0'];?>" <?php  if($row['0'] == $_GPC['cate_2']) { ?> selected="selected"<?php  } ?>><?php  echo $row['1'];?></option>
						<?php  } } ?>
						<?php  } ?>
					</select>

                </div>

				<div class=" col-xs-12 col-sm-2 col-lg-2">

					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索菜品</button>

				</div>

			</div>

			<div class="form-group">

			</div>

		</form>

	</div>

</div>

<style>

.label{cursor:pointer;}

</style>

    <div class="category">

        <form action="" method="post" onsubmit="return formcheck(this)">

			<div class="panel panel-default">

				<div class="panel-body table-responsive">

					<table class="table table-hover">

						<thead>

							<tr>
					<th style="width:70px;">菜品ID</th>
					<th style="min-width:120px;">菜品标题</th>
					<th style="width:100px;">是否推荐</th>
					<th style="width:100px;">优惠价/原价</th>
					<th style="width:100px;">单位</th>
					<th style="width:100px;">状态</th>
					<th style="width:100px;">热度</th>
					<th style="text-align:right; min-width:60px;">操作</th>
				</tr>

						</thead>

					<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><?php  echo $item['id'];?></td>
					<td><?php  if(!empty($category[$item['pcate']])) { ?><span class="text-error">[<?php  echo $category[$item['pcate']]['name'];?>] </span><?php  } ?><?php  if(!empty($children[$item['pcate']])) { ?><span class="text-info">[<?php  echo $children[$item['pcate']][$item['ccate']]['1'];?>] </span><?php  } ?><?php  echo $item['title'];?></td>
					<td><?php  if($item['ishot']) { ?><span class="label label-success">是</span><?php  } else { ?><span class="label label-danger">否</span><?php  } ?></td>
					<td style="background:#f2dede;"><?php  echo $item['preprice'];?>元 / <?php  echo $item['oriprice'];?>元</td>
					<td><?php  echo $item['unit'];?></td>
					<td><?php  if($item['status']) { ?><span class="label label-success">上架</span><?php  } else { ?><span class="label label-danger">下架</span><?php  } ?></td>
					<td><?php  echo $item['hits'];?></td>
					<td style="text-align:right;">
						<a href="<?php  echo $this->createWebUrl('foods', array('id' => $item['id'], 'op' => 'post'))?>">编辑</a>&nbsp;&nbsp;<a href="<?php  echo $this->createWebUrl('foods', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;">删除</a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>

					</table>
<?php  echo $pager;?>
				</div>

           </div>

        </form>

    </div>

</div>
<?php  } ?>
<script type="text/javascript">
<!--
	var category = <?php  echo json_encode($children)?>;
//-->
</script>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

