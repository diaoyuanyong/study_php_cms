<?php
/**
 * wx1_shopping模块微站定义
 *
 * @author m-diao
 * @url 
 */
defined('IN_IA') or exit('Access Denied');

session_start();
include 'model.php';

class Shoping11ModuleSite extends WeModuleSite {
               
               public $settings;
               
	public function doMobileIndex() {
		//这个操作被定义用来呈现 功能封面
                require_once(dirname(__FILE__)."/inc/mobile/doMobileIndex.php");
	}
                
                //header
                public function doMobileHeader() {
		//这个操作被定义用来呈现 功能封面
                require_once(dirname(__FILE__)."/inc/mobile/doMobileHeader.php");
	}
                public function doMobileFooter() {
		//这个操作被定义用来呈现 功能封面
                require_once(dirname(__FILE__)."/inc/mobile/doMobileFooter.php");
	}
                //all shopping
                public function doMobileAllshopping() {
		//这个操作被定义用来呈现 功能封面
                require_once(dirname(__FILE__)."/inc/mobile/doMobileAllshopping.php");
	}
               //hot shopping
                public function doMobileHotshopping() {
		//这个操作被定义用来呈现 功能封面
                require_once(dirname(__FILE__)."/inc/mobile/doMobileHotshopping.php");
	}
               
                 //brankclass
                public function doMobileBrandclass() {
		//这个操作被定义用来呈现 功能封面
                require_once(dirname(__FILE__)."/inc/mobile/doMobileBrandclass.php");
	}
                //zhekou
                
                public function doMobileZhekou() {
		//这个操作被定义用来呈现 功能封面
                require_once(dirname(__FILE__)."/inc/mobile/doMobileZhekou.php");
	}
                //shoppcar
                  public function doMobileShoppcar() {
		//这个操作被定义用来呈现 功能封面
                require_once(dirname(__FILE__)."/inc/mobile/doMobileShoppcar.php");
	}
                //shoppexpressed
                public function doMobileShoppexpressed() {
		//这个操作被定义用来呈现 功能封面
                require_once(dirname(__FILE__)."/inc/mobile/doMobileShoppexpressed.php");
	}
                //order
                public function doMobileOrder() {
		//这个操作被定义用来呈现 功能封面
                require_once(dirname(__FILE__)."/inc/mobile/doMobileOrder.php");
	}
                //address
                  
                public function doMobileAddress() {
		//这个操作被定义用来呈现 功能封面
                require_once(dirname(__FILE__)."/inc/mobile/doMobileAddress.php");
	}
                //shopp
                public function doMobileShopp() {
		//这个操作被定义用来呈现 功能封面aa
                require_once(dirname(__FILE__)."/inc/mobile/doMobileShopp.php");
	}
        
             
	public function doWebLiebiao() {
		//这个操作被定义用来呈现 规则列表
	}
        
              //web
	public function doWebIndex1() {
		//这个操作被定义用来呈现 管理中心导航菜单--订单管理 
            	load()->func('tpl');
                require_once(dirname(__FILE__)."/inc/web/doWebIndex1.php");
	}
	public function doWebIndex2() {
		//这个操作被定义用来呈现 管理中心导航菜单--商品管理
                require_once(dirname(__FILE__)."/inc/web/doWebIndex2.php");
	}
	public function doWebIndex3() {
		//这个操作被定义用来呈现 管理中心导航菜单--商品分类
                require_once(dirname(__FILE__)."/inc/web/doWebIndex3.php");
	}
	public function doWebIndex4() {
		//这个操作被定义用来呈现 管理中心导航菜单--物流管理 
                require_once(dirname(__FILE__)."/inc/web/doWebIndex4.php");
	}
	public function doWebIndex5() {
		//这个操作被定义用来呈现 管理中心导航菜单--配送方式
                require_once(dirname(__FILE__)."/inc/web/doWebIndex5.php");
	}
                public function doWebIndex6() {
		//这个操作被定义用来呈现 管理中心导航菜单 -- 维权与警告
                require_once(dirname(__FILE__)."/inc/web/doWebIndex6.php");
	}
                public function doWebIndex7() {
		//这个操作被定义用来呈现 管理中心导航菜单--
                require_once(dirname(__FILE__)."/inc/web/doWebIndex7.php");
	}
                public function doWebIndex8() {
		//这个操作被定义用来呈现 管理中心导航菜单
                require_once(dirname(__FILE__)."/inc/web/doWebIndex8.php");
	}
                public function doWebIndex9() {
		//这个操作被定义用来呈现 管理中心导航菜单
                require_once(dirname(__FILE__)."/inc/web/doWebIndex9.php");
	}
            public function doWebSetGoodsProperty() {
		global $_GPC, $_W;
		$id = intval($_GPC['id']);
		$type = $_GPC['type'];
		$data = intval($_GPC['data']);
		if (in_array($type, array('new', 'hot', 'recommand', 'discount'))) {
			$data = ($data==1?'0':'1');
			pdo_update("shopping_goods", array("is" . $type => $data), array("id" => $id, "weid" => $_W['uniacid']));
			die(json_encode(array("result" => 1, "data" => $data)));
		}
		if (in_array($type, array('status'))) {
			$data = ($data==1?'0':'1');
			pdo_update("shopping_goods", array($type => $data), array("id" => $id, "weid" => $_W['uniacid']));
			die(json_encode(array("result" => 1, "data" => $data)));
		}
		if (in_array($type, array('type'))) {
			$data = ($data==1?'2':'1');
			pdo_update("shopping_goods", array($type => $data), array("id" => $id, "weid" => $_W['uniacid']));
			die(json_encode(array("result" => 1, "data" => $data)));
		}
		die(json_encode(array("result" => 0)));
	}


}