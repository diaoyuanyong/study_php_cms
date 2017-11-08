<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">

	<li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('order', array('op' => 'display'))?>">管理订单</a></li>

</ul>

<?php  if($operation == 'display') { ?>

<div class="main">

	<div style="padding:15px;">

		<table class="table table-hover">

			<thead class="navbar-inner">

				<tr>

					<th style="width:40px;">所属店家</th>

					<th style="width:60px;">订单号</th>

					<th style="width:60px;">电话</th>
                    
					<th style="width:100px;">地址</th>

					<th style="width:50px;">付款方式</th>

					<th style="width:50px;">总价</th>

					<th style="width:40px;">状态</th>

					<th style="width:90px;">下单时间</th>

					<th style="width:40px; text-align:right;">操作</th>

				</tr>

			</thead>

			<tbody>

				<?php  if(is_array($list)) { foreach($list as $item) { ?>

				<tr>

					<td><?php  echo $item['pcatename'];?></td>

					<td><?php  echo $item['ordersn'];?></td>

					<td><?php  echo $item['mobile'];?></td>

					<td><?php  echo $item['address'];?></td>

					<td><?php  if($item['paytype'] == 1) { ?><span class="label label-success">在线支付</span><?php  } else if($item['paytype'] == 2) { ?><span class="label label-info">餐到付款</span><?php  } ?></td>

					<td><?php  echo $item['price'];?> 元</td>

					<td><?php  if($item['status'] == 0) { ?><span class="label label-info">已完成</span><?php  } ?>
                    <?php  if($item['status'] == 1) { ?><span class="label label-danger">等待支付</span><?php  } ?>
                    <?php  if($item['status'] == 2) { ?><span class="label label-success">已下单</span><?php  } ?>
                    <?php  if($item['status'] == 3) { ?><span class="label label-warning">已确认</span><?php  } ?>
                    <?php  if($item['status'] == -1) { ?><span class="label label-primary">已取消</span><?php  } ?>
                    <?php  if($item['status'] == -2) { ?><span class="label label-default">已删除</span><?php  } ?></td>

					<td><?php  echo date('Y-m-d H:i:s', $item['createtime'])?></td>

					<td style="text-align:right;"><a href="<?php  echo $this->createWebUrl('order', array('op' => 'detail', 'id' => $item['id']))?>">查看订单</a></td>

				</tr>

				<?php  } } ?>

			</tbody>

		</table>

		<?php  echo $pager;?>

	</div>

</div>

<?php  } else if($operation == 'detail') { ?>

<div class="main">
<div class="panel panel-default">

	<div class="panel-body table-responsive">
	<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data" onsubmit="return formcheck(this)">

		<input type="hidden" name="id" value="<?php  echo $item0['id'];?>">

		<h4>订单信息</h4>

		<table class="table table-hover">
<tbody>
<tr>
				<th style="width:100px;"><label for="">所属店家</label></th>
				<td>
					<?php  echo $pcate['name'];?>
				</td>
			</tr>
            
			<tr>
				<th style="width:100px;"><label for="">订单号</label></th>
				<td>
					<?php  echo $item0['ordersn'];?>
				</td>
			</tr>

			<tr>

				<th style="width:100px;"><label for="">总计</label></th>

				<td>

					<?php  echo $item0['price'];?> 元

				</td>

			</tr>

			<tr>

				<th style="width:100px;"><label for="">支付方式</label></th>

				<td>

					<?php  if($item0['paytype'] == 1) { ?>在线支付<?php  } ?>

					<?php  if($item0['paytype'] == 2) { ?>餐到付款<?php  } ?>

				</td>

			</tr>

			<tr>

				<th style="width:100px;"><label for="">订单状态</label></th>

				<td>
<?php  if($item0['status'] == 3) { ?><span class="label label-warning">已确认</span><?php  } ?>
<?php  if($item0['status'] == 2) { ?><span class="label label-success">已下单</span><?php  } ?>
					<?php  if($item0['status'] == 1) { ?><span class="label label-danger">等待支付</span><?php  } ?>
                    <?php  if($item0['status'] == 0) { ?><span class="label label-info">已完成</span><?php  } ?>
                    <?php  if($item0['status'] == -1) { ?><span class="label label-primary">已取消</span><?php  } ?>
                    <?php  if($item0['status'] == -2) { ?><span class="label label-default">已删除</span><?php  } ?>

				</td>

			</tr>

			<tr>

				<th style="width:100px;"><label for="">下单日期</label></th>

				<td>

					<?php  echo date('Y-m-d H:i:s', $item0['createtime'])?>

				</td>

			</tr>
<?php  if($item0['other']) { ?>
			<tr>
				<th style="width:100px;"><label for="">备注</label></th>
				<td>
					<?php  echo $item0['other'];?>
				</td>
			</tr>
<?php  } ?>
</tbody>
		</table>

		<h4>用户信息</h4>

		<table class="table table-hover">

			<tr>

				<th style="width:100px;"><label for="">手机</label></th>

				<td>

					<?php  echo $item0['mobile'];?>

				</td>

			</tr>


			<tr>
				<th style="width:100px;"><label for="">地址</label></th>
				<td>
					<?php  echo $item0['address'];?>
				</td>
			</tr>
            <tr>
				<th style="width:100px;"><label for="">送餐时间</label></th>
				<td>
					<?php  echo $item0['time'];?>
				</td>
			</tr>
            
		</table>

		<h4>菜品信息</h4>

		<table class="table table-hover">

			<thead class="navbar-inner">

				<tr>

					<th style="width:30px;">ID</th>

					<th style="min-width:150px;">菜品名称</th>

					<th style="width:100px;">优惠价/原价</th>

					<th style="width:100px;">单位</th>

					<th style="width:100px;">状态</th>

					<th style="width:100px;">数量</th>
				</tr>

			</thead>

			<?php  if(is_array($item['foods'])) { foreach($item['foods'] as $item) { ?>

			<tr>

				<td><?php  echo $item['id'];?></td>

				<td><?php  if($category[$item['pcate']]['name']) { ?><span class="text-error">[<?php  echo $category[$item['pcate']]['name'];?>] </span><?php  } ?><?php  if($children[$item['pcate']][$item['ccate']]['1']) { ?><span class="text-info">[<?php  echo $children[$item['pcate']][$item['ccate']]['1'];?>] </span><?php  } ?><?php  echo $item['title'];?></td>

				<!--td><?php  echo $category[$item['pcate']]['name'];?> - <?php  echo $children[$item['pcate']][$item['ccate']]['1'];?></td-->

				<td style="background:#f2dede;"><?php  echo $item['preprice'];?>元 / <?php  echo $item['oriprice'];?>元</td>

				<td><?php  echo $item['unit'];?></td>

				<td><?php  if($item['status']) { ?><span class="label label-success">上架</span><?php  } else { ?><span class="label label-danger">下架</span><?php  } ?></td>

				<td><?php  echo $foodsid[$item['id']]['total'];?></td>
			</tr>

			<?php  } } ?>

		</table>

		<table class="">

			<tr>

				<th></th>

				<td>

					<?php  if($item0['status'] == -2) { ?>

					 <button type="submit" class="btn btn-primary span2" name="delete" value="delete" onclick="return confirm('确认彻底删除订单吗？'); return false;">彻底删除</button>
					<?php  } ?>
                    <?php  if($item0['status'] == -1) { ?>
					 <button type="submit" class="btn btn-primary span2" name="delete" value="delete" onclick="return confirm('确认彻底删除订单吗？'); return false;">彻底删除</button>
					<?php  } ?>
					<?php  if($item0['status'] == 0) { ?>
					 <button type="submit" class="btn btn-primary span2" name="delete" value="delete" onclick="return confirm('确认彻底删除订单吗？'); return false;">彻底删除</button>
					<?php  } ?>
					<?php  if($item0['status'] == 1) { ?>
                     <button type="submit" class="btn btn-primary span2" name="quxiao" value="quxiao" onclick="return confirm('确认取消此订单吗？'); return false;">取消订单</button>
                    <button type="submit" class="btn btn-primary span2" name="wancheng" value="wancheng" onclick="return confirm('确认转为已完成吗？'); return false;">转为已完成</button>
                    <button type="submit" class="btn btn-primary span2" name="yixia" value="yixia" onclick="return confirm('确认转为已下单吗？'); return false;">转为已下单</button>
                    <button type="submit" class="btn btn-primary span2" name="jieshou" value="jieshou" onclick="return confirm('确认接受此订单吗？'); return false;">接受订单</button>
					<?php  } ?>
                    <?php  if($item0['status'] == 2) { ?>
                     <button type="submit" class="btn btn-primary span2" name="quxiao" value="quxiao" onclick="return confirm('确认取消此订单吗？'); return false;">取消订单</button>
                    <button type="submit" class="btn btn-primary span2" name="wancheng" value="wancheng" onclick="return confirm('确认转为已完成吗？'); return false;">转为已完成</button>
                    <button type="submit" class="btn btn-primary span2" name="jieshou" value="jieshou" onclick="return confirm('确认接受此订单吗？'); return false;">接受订单</button>
					<?php  } ?>
                    <?php  if($item0['status'] == 3) { ?>
                     <button type="submit" class="btn btn-primary span2" name="quxiao" value="quxiao" onclick="return confirm('确认取消此订单吗？'); return false;">取消订单</button>
                    <button type="submit" class="btn btn-primary span2" name="wancheng" value="wancheng" onclick="return confirm('确认转为已完成吗？'); return false;">转为已完成</button>
					<?php  } ?>

					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />

				</td>

			</tr>

		</table>

	</form>
</div></div>
</div>

<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

