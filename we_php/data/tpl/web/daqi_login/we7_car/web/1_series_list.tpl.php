<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li><a href="<?php  echo $this->createWebUrl('series',array('op'=>'post'));?>">添加品牌车系</a></li>	
    <li  class="active"><a href="<?php  echo $this->createWebUrl('series', array('op'=>'list'))?>">品牌车系管理</a></li>	
</ul>

<div class="main panel panel-default">
    <div class="category panel-body table-responsive">
        <form action="" method="post">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>显示顺序</th>
                        <th>品牌</th>
                        <th>车系名称</th>
                        <th>车系简称</th>
                        <th>设为显示</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  if(is_array($list)) { foreach($list as $v) { ?> 
                    <tr>
                        <td>
                          	<div class='col-sm-7'>
                            	<input type="text" class="form-control" name="listorder[<?php  echo $v['id'];?>]" value="<?php  echo $v['listorder'];?>">
                        	</div>
                        </td>
                        <td><?php  echo $seriesArr[$v['bid']];?></td>
                        <td><div class="type-parent"><?php  echo $v['title'];?>&nbsp;&nbsp;</div></td>
                        <td><?php  echo $v['subtitle'];?></td>
                        <td><?php  if($v['status']=='1') { ?><span class="label label-success">显示</span><?php  } else { ?><span class="label label-danger">不显示</span><?php  } ?></td>
                        <td>
							<a href="<?php  echo $this->createWebUrl('series', array('op'=>'post','id'=>$v['id']));?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-default btn-sm " title="编辑"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                            <a href="<?php  echo $this->createWebUrl('series', array('op'=>'del','id'=>$v['id']));?>" onclick="return confirm('删除车系将删除该车系下的所有车型，确认吗？');
                                                        return false;" data-toggle="tooltip" data-placement="bottom" class="btn btn-default btn-sm " title="删除"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <?php  } } ?>
                </tbody>
            </table>
            <table>
                <tr>
                    <td>
                        <a  class='btn btn-default'  href="<?php  echo $this->createWebUrl('series', array('op'=>'post','id'=>0));?>"><i class="fa fa-arrows"></i> 添加汽车品牌车系</a>
                        <button type="submit" class="btn btn-primary" name="submit" value="提交">提交排序</button>
                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script>
	require(['bootstrap'],function($){
		$('.btn').tooltip();
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
