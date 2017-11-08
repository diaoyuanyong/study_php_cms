<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li  class="active"><a href="<?php  echo create_url('site/entry', array('do' => 'charge', 'op' => 'list','m' => 'eso_sale','uniacid'=>$_W['uniacid']))?>">会员信息</a></li>

</ul>
<div class="main">
    <div class="stat">
        <form action="index.php" method="get">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="eso_sale" />
            <input type="hidden" name="do" value="charge" />
            <input type="hidden" name="op" value="list" />
            <table class="table sub-search">
                <tbody>
                <td style="width:80px;text-align: right;">手机</td>
                <td>
                    <input type="text"  name="mobile" />
                    <input type="submit" name="submit" value="搜索" class="btn btn-primary">
                </td>
                </tr>
                </tbody>
            </table>
        </form>
        <div class="stat-div">

            <div class="sub-item" id="table-list">
                <h4 class="sub-title" style="float:right;color:red;">总数：<?php  echo $total;?> <a href="">刷新</a> </h4>
                <h4 class="sub-title">名单</h4>

                <div class="sub-content">
                    <table class="table table-hover">
                        <thead class="navbar-inner">
                        <tr>
                            <th class="row-hover">姓名</th>
                            <th class="row-hover">电话</th>
                            <th class="row-hover"> 账户余额</th>
                            <th class="row-hover">积分</th>
                            <th class="row-hover" style="width:100px">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php  if(is_array($list)) { foreach($list as $v) { ?>

                        <tr>
                            <td>
                                <?php  echo $v['realname'];?>
                            </td>
                            <td>
                                <?php  echo $v['mobile'];?>
                            </td>
                            <td>
                                <?php  echo $v['credit2'];?>
                            </td>
                            <td>
                                <?php  echo $v['credit1'];?>
                            </td>
                            <td>
                                <a href="<?php  echo create_url('site/entry', array('do' => 'charge', 'op' => 'post','m' => 'eso_sale','uniacid'=>$_W['uniacid'],'uid'=>$v['uid']))?>" class="btn btn-primary">详情</a>
                            </td>
                        </tr>

                        <?php  } } ?>
                        </tbody>
                    </table>
                </div>

                <?php  echo $pager;?>
            </div>
        </div>
    </div>
</div>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>