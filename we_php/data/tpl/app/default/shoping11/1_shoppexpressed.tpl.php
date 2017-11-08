<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<div id="express">
       <div  class="express_1">
           <div class="express_1_shopp">
                <ul>
                   <li class ="express_1_shopp-1">
                      <div class="express_1_shopp-1-img">
                       <img src="../addons/shoping11/style/img/wei1.png" style ="height: 2.5em">
                       <h4>快递信息</h4>
                       
                      </div>
                   </li>
                </ul>
           </div>
           <div class="express_2_shopp">
                <ul>
                   <li  class ="express_2_shopp-2">
                       
                       <a  href="###">
                           <h5>小米手机</h5>
                                <div  class="express_2_shopp-2-img">
                                    <img src="../addons/shoping11/style/img/shouji.jpg"  alt="小米手机新款">
                                </div>
                           <p>
                               <img src="../addons/shoping11/style/img/qian.png">1000元
                           </p>
                       </a>
                   </li>
                </ul>
           </div>
           <div class="express_3_shopp">
           
           <form>
               <ul>
                    <li> 
                        <label >收获人:</label>
                        <input type="text" name="expressnmber1" readonly="readonly" value="刁元勇">
                   </li>
                   <li> 
                        <label>收获电话:</label>
                        <input type="text" name="expressnmber2" readonly="readonly" value="18996391108">
                   </li>
                   <li> 
                        <label>收获地址:</label>
                        <input type="text" name="expressnmber3" readonly="readonly" value="重庆">
                   </li>
                   <li> 
                        <label>快递单号:</label>
                        <input type="text" name="expressnmber4"   readonly="readonly" value="189995642135"  >
                   </li>
                   <li> 
                        <label>快递状态:</label>
                        <input type="text" name="expressnmber5" readonly="readonly"  value="已放送">
                   </li>
                   <li> 
                        <label>快递已到达:</label>
                        <input type="text" name="expressnmber6" readonly="readonly" value="重庆">
                   </li>
                   <li> 
                        <label>快递发往地:</label>
                        <input type="text" name="expressnmber7" readonly="readonly" value="重庆">
                   </li>
               </ul>
               </form>
           </div>
       </div>
    
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>