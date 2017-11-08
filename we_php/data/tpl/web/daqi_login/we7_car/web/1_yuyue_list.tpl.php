<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
    <li><a href="<?php  echo $this->createWebUrl('yuyue',array('op'=>'post'));?>">添加预约</a></li>	
    <li class="active"><a href="<?php  echo $this->createWebUrl('yuyue',array('op'=>'list'));?>">预约管理</a></li>
</ul>

<div class="main panel panel-default">
    <div class="category panel-body table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width:150px;">预约类型</th>
                    <th style="width:150px ">预约标题</th>
                    <th style="width:120px;">开始时间</th>
                    <th style="width:120px ">结束时间</th>
                    <th style="width:100px;">设为显示</th>
                    <th style="width:200px;">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $v) { ?> 
                <tr>
                    <td><?php  if($v['yytype']==1) { ?> <span class="label label-success">预约试驾</span> <?php  } else { ?><span class="label label-primary">预约保养</span><?php  } ?></td>						
                    <td><?php  echo $v['title'];?></td>
                    <td><?php  echo date('Y-m-d',$v['start_time'])?></td>
                    <td><?php  echo date('Y-m-d',$v['end_time'])?></td>
                    <td><?php  if($v['isshow']=='1') { ?><span class="label label-success">显示</span><?php  } else { ?><span class="label label-danger">不显示</span><?php  } ?></td>
                    <td>
						<a href="<?php  echo $this->createWebUrl('yuyue',array('op'=>'post', 'weid'=>$weid,'id'=>$v['id']));?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="编辑"><i class="fa fa-edit"></i></a>
                        <a href="<?php  echo $this->createWebUrl('yuyue',array('op'=>'yuyuedel','weid'=>$weid,'id'=>$v['id']));?>" onclick="return confirm('删除预约将删除本条预约的所有订单，确认删除本条预约吗？');
                                return false;" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="删除"><i class="fa fa-times"></i></a>
                        <a href="<?php  echo $this->createWebUrl('yuyue',array('op'=>'show', 'id'=>$v['id'],'weid'=>$weid,'type'=>$v['yytype']));?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="查看订单"><i class="fa fa-eye"></i></a>
					</td>
                </tr>
                <?php  } } ?> 
                <tr>
                    <td colspan="6">
                        <a class="btn btn-default" href="<?php  echo $this->createWebUrl('yuyue',array('op'=>'post'));?>"><i class="fa fa-arrows"></i> 添加预约类型</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
