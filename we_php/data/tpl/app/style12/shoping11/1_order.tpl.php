<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<div id="express">
       <div  class="express_1">
           <div class="express_1_shopp">
                <ul>
                   <li class ="express_1_shopp-1">
                      <div class="express_1_shopp-1-img">
                       <img src="../addons/shoping11/style/img/wei1.png" style ="height: 2.5em">
                       <h4>我的订单</h4>
                      </div>
                   </li>
                </ul>
           </div>
           <div class="order_1">
               <ul>
                   <li><a href="">待支付</a></li>
                   <li><a href="">已支付</a></li>
                   <li><a href="">已完成</a></li>
               </ul>
           </div>
           <div class="order_2">
               <a href="<?php  echo $this->createMobileUrl('address')?>">管理收获地址</a>
           </div>
           <!--等待支付-->
           <div class="order_3">
               <ul>
                   <li  class="order_3-li1">
                        <a  href="###">
                           <h5>小米手机</h5>    
                            <img  src="../addons/shoping11/style/img/shouji.jpg"  alt="小米手机新款" style="height:5em; widht:5em;">
                       </a>
                   </li>
                   <li  class="order_3-li2">
                            <h5>单价</h5>
                            <p>
                                <img class="aa" src="../addons/shoping11/style/img/qian.png" style="heigth:3em; width:1em">1000元
                            </p>
                   </li>
                   <li  class="order_3-li3">
                            <h5>数量</h5>
                            <p>1</p>
                   </li>
                   <li  class="order_3-li4">
                            <h5>总和</h5>
                              <p>
                                <img class="aa" src="../addons/shoping11/style/img/qian.png" style="heigth:3em; width:1em">1000元
                            </p>
                   </li>
               </ul>
           </div>
       </div>
</div>
<script type="text/javascript">
    
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>