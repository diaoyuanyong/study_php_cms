<?php defined('IN_IA') or exit('Access Denied');?>
<div id = "footer"> 
	<footer>
    <ul>
        <li>
            <div class="footer_div">
           	<a href="<?php  echo $this->createMobileUrl('index')?>">
                <span><img style="width:30px;height: 30px;"src="../addons/shoping11/style/img/home1.png"></span>
                <p style="display:block;padding: 5px;font-size: 12px;">商城首页</p>
            	</a>
            </div>
        </li>
        <li>
        <div class="footer_div">
            <a href="<?php  echo $this->createMobileUrl('shoppcar')?>">
                <span style="display:block;margin: 0;width:100%;height: 30px;" >
                	<img style="width:30px;height: 30px;" src="../addons/shoping11/style/img/shoppingcar.png">
                </span>
                <p style="display:block;padding: 5px;font-size: 12px;">我的购物</p>
            </a>
        </div>
        </li>
        <li>
        <div class="footer_div">
            <a href="<?php  echo $this->createMobileUrl('shoppexpressed')?>">
                <span style="display:block;margin: 0;width:100%;height: 30px;" >
                	<img style="width:30px;height: 30px;" src="../addons/shoping11/style/img/wuliu.png">
						</span>
                <p style="display:block;padding: 5px;font-size: 12px;">我的快递</p>
            </a>
        </div>
        </li>
        <li>
        <div class="footer_div">
            <a href="<?php  echo $this->createMobileUrl('order')?>">
                <span style="display:block;margin: 0;width:100%;height: 30px;" >
                	<img style="width:30px;height: 30px;" src = "../addons/shoping11/style/img/person1.png">
                </span>
                <p  style="display:block;padding: 5px;font-size: 12px;">我的订单</p>
            </a>
           </div>
        </li>
    </ul>
</footer>
</div>

</body>
</html>