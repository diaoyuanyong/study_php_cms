<?php defined('IN_IA') or exit('Access Denied');?>
  <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
  
  
<!--<script type="text/javascript">
        function getInfo(){
var s = "";
s += " 网页可见区域宽："+ document.body.clientWidth;
s += " 网页可见区域高："+ document.body.clientHeight;
alert (s);
}
getInfo(); 
</script>-->

<div id="center">
    
    <ul>
        <li class="center_a">
            <div class="center_1" style="text-align: center;">
                <a href="<?php  echo $this->createMobileUrl('allshopping')?>" style="text-align: center;">
                    <img src="../addons/shoping11/style/img/icon_indexn_06.png" style="width: 5em;height: 5em;">
                </a>
            </div>
        </li>
         <li class="center_a">
             <div class="center_1">
                   <a href="<?php  echo $this->createMobileUrl('hotshopping')?>">
                        <img src="../addons/shoping11/style/img/icon_indexn_05.png" style="width: 5em;height: 5em;">
                    </a>
            </div>
        </li>
         <li class="center_a">
            <div class="center_1">
                <a href="<?php  echo $this->createMobileUrl('brandclass')?>">
                    <img src="../addons/shoping11/style/img/icon_indexn_08.png" style="width: 5em;height: 5em;">
                </a>
            </div>
        </li>
         <li class="center_a">
            <div class="center_1">
                <a href="<?php  echo $this->createMobileUrl('zhekou')?>">
                    <img src="../addons/shoping11/style/img/icon_indexn_02.png" style="width: 5em;height: 5em;">
                </a>
            </div>
        </li>
    </ul>
  
</div>
  
<div id ="hotshopp_a"> 
<div>
    <div class="hotshopp_show">
        <div  class="hotshopp_show-1">
            <h4>新款上市</h4>
            <img  src="../addons/shoping11/style/img/img1/allshoppshow.png">
        </div>
        
        <div  class="hotshopp_show-2">
            <ul>
                <li>
                    <a href="<?php  echo $this->createMobileUrl('shopp')?>">
                        <div class ="hotshopp_show_2a">
                            <img  src="../addons/shoping11/style/img/img1/1.jpg" style="width: 8em;height:8em;">
                        </div>
                        <p>连衣群</p>
                         <p>销量：120件</p>
                        <p> 
                            <img src="../addons/shoping11/style/img/qian.png">1000元
                        </p>
                    </a>
                </li>
                <li>
                    <a href="<?php  echo $this->createMobileUrl('shopp')?>">
                        <div class ="hotshopp_show_2a">
                                <img  src="../addons/shoping11/style/img/img1/2.jpg">
                        </div>
                         <p>xxxxxxx连衣群</p>
                         <p>销量：120件</p>
                        <p> 
                            <img src="../addons/shoping11/style/img/qian.png">1000元
                        </p>
                    </a>
                </li>
                <li>
                    <a href="###">
                      <div class ="hotshopp_show_2a">
                            <img  src="../addons/shoping11/style/img/img1/3.jpg">
                     </div>
                         <p>连衣群</p>
                         <p>销量：120件</p>
                         <p> 
                            <img src="../addons/shoping11/style/img/qian.png">1000元
                        </p>
                    </a>
                </li>
                <li>
                    <a href="###">
                      <div class ="hotshopp_show_2a">
                            <img  src="../addons/shoping11/style/img/img1/4.jpg">
                      </div>
                         <p>xxxxxxx连衣群</p>
                         <p>销量：120件</p>
                        <p> 
                            <img src="../addons/shoping11/style/img/qian.png">1000元
                        </p>
                    </a>
                </li>
                <li>
                    <a href="###">
                       <div class ="hotshopp_show_2a">
                            <img  src="../addons/shoping11/style/img/img1/6.jpg">
                       </div>
                         <p>xxxxxxx连衣群</p>
                         <p>销量：120件</p>
                        <p> 
                            <img src="../addons/shoping11/style/img/qian.png">1000元
                        </p>
                    </a>
                </li>
                <li>
                    <a href="###">
                     <div class ="hotshopp_show_2a">
                         <img  src="../addons/shoping11/style/img/img1/7.jpg">
                    </div>
                         <p>xxxxxxx连衣群</p>
                         <p>销量：120件</p>
                        <p> 
                            <img src="../addons/shoping11/style/img/qian.png">1000元
                        </p>
                    </a>
                </li>
                <li>
                    <a href="###">
                     <div class ="hotshopp_show_2a">
                        <img  src="../addons/shoping11/style/img/img1/8.jpg">
                     </div>
                         <p>xxxxxxx连衣群</p>
                         <p>销量：120件</p>
                        <p> 
                            <img src="../addons/shoping11/style/img/qian.png">1000元
                        </p>
                    </a>
                </li>
                <li>
                    <a href="###">
                      <div class ="hotshopp_show_2a">
                            <img  src="../addons/shoping11/style/img/img1/9.jpg">
                      </div>
                         <p style="overflow: hidden">xxx12</p>
                        <p> 
                            <img src="../addons/shoping11/style/img/qian.png">1000元
                        </p>
                    </a>
                </li>
                <li>
                    <a href="###">
                      <div class ="hotshopp_show_2a">
                            <img  src="../addons/shoping11/style/img/img1/9.jpg">
                      </div>
                         <p>xxxxxxx连衣群</p>
                         <p>销量：120件</p>
                        <p> 
                            <img src="../addons/shoping11/style/img/qian.png">1000元
                        </p>
                    </a>
                </li>
                <li>
                    <a href="###">
                      <div class ="hotshopp_show_2a">
                            <img  src="../addons/shoping11/style/img/img1/9.jpg">
                      </div>
                         <p>xxxxxxx连衣群</p>
                         <p>销量：120件</p>
                         
                        <p> 
                            <img src="../addons/shoping11/style/img/qian.png">1000元
                        </p>
                    </a>
                </li>
                
            </ul>
            </div>
        
    </div>
    <div id ="footera">
        
    </div>
</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>


