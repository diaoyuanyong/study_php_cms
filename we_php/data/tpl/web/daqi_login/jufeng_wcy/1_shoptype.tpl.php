<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
	<li <?php  if($operation == 'post' && empty($id)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('shoptype', array('op' => 'post'))?>">添加分类</a></li>
	<li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('shoptype', array('op' => 'display'))?>">管理分类</a></li>
    <?php  if($operation == 'post' && !empty($id)) { ?><li class="active"><a href="#">
    编辑分类
    </a></li><?php  } ?>
</ul>

<?php  if($operation == 'post') { ?>

<div class="main">

    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
        <div class="panel panel-default">

            <div class="panel-heading">
                分类详细设置
            </div>

            <div class="panel-body">

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="displayorder" class="form-control" value="<?php  echo $category['displayorder'];?>" />
                    </div></div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分类名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="typename" class="form-control" value="<?php  echo $category['name'];?>" />
                    </div></div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分类描述</label>
                    <div class="col-sm-9">
                        <input type="text" name="description" class="form-control" value="<?php  echo $category['description'];?>" />
                    </div></div>

                
		<div class="form-group col-sm-12">

			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />

			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />

		</div>

    </form>

</div>
<script type="text/javascript" src="../web/resource/components/colorpicker/spectrum.js"></script>
<link type="text/css" rel="stylesheet" href="../web/resource/components/colorpicker/spectrum.css" />
<script type="text/javascript">
<!--
	$(function(){
		colorpicker();
	});
//-->
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

								<th style="width:80px;">排序</th>

								<th style="width:150px;">分类名称</th>
<th style="width:150px;">分类描述</th>
								<th style="width:150px;">操作</th>

							</tr>

						</thead>

						<tbody>
			<?php  if(is_array($category)) { foreach($category as $row) { ?>
				<tr>
					<td><?php  if(count($children[$row['id']]) > 0) { ?><a href="javascript:;"><i class="icon-chevron-down"></i></a><?php  } ?></td>
					<td><?php  echo $row['displayorder'];?></td>
					<td><div class="type-parent"><?php  echo $row['name'];?></b></div></td>
                    <td><div class="type-parent"><?php  echo $row['description'];?></b></div></td>
					<td><a href="<?php  echo $this->createWebUrl('shoptype', array('op' => 'post', 'id' => $row['id']))?>">编辑</a>&nbsp;&nbsp;<a href="<?php  echo $this->createWebUrl('shoptype', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此分类吗？');return false;">删除</a></td>
				</tr>
				
			<?php  } } ?>
				<tr>
					<td></td>
					<td colspan="4">
						<a href="<?php  echo $this->createWebUrl('shoptype', array('op' => 'post'))?>"><i class="fa fa-plus-circle"></i> 添加新分类</a>
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

