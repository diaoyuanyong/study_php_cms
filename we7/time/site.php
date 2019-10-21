<?php

/**
 * sunhoo1模块微站定义
 *
 * @author mr-diao
 * @url 
 */
defined('IN_IA') or exit('Access Denied');

class Sunhoo1ModuleSite extends WeModuleSite {

    public function doMobileIndex() {
        ini_set('date.timezone', 'Asia/Shanghai');
        global $_GPC, $_W;

//        echo $tt;
        $we = 2;
        $seleteSell = array(
            'uniacid',
            'price',
            'pay_time',
            'is_pay',
        );
        $whereSell = array(
            'uniacid' => $we,
            'is_pay' => 1,
        );
        $sell = pdo_getall('sell_logs', $whereSell, $seleteSell);
//              print_r($sell);
        $arry = array();
        foreach ($sell as $index => $row) {

            $number = count($row);
            $arry[] = $row["pay_time"];
            for ($i = 0; $i < count($arry); $i++) {
                $today_s = date(time());
                $tt = $today_s - $arry[1];
                echo $today_s;
                echo "<br/>";
                $yesterday = date(time() - 24 * 3600);
                $week = date(time() - 7 * 24 * 3600);
                $week = date(time() - 30 * 24 * 3600);
                $seleteToday = $today_s - $yesterday;
                $seleteWeek = $today_s - $week;
//                    echo $seleteToday; // 小于或者等于一周的时间，就是一天之内的交易
//                    echo $seleteWeek; //小于当天时间或者等于一周的时间，就是去选择一周的时间；
//                    echo $arry[$i];
//                    ---------------------------
            }
        }

        //echo  strtotime ( "now" ),  "\n" ;
//echo  strtotime ( "10 September 2000" ),  "\n" ;
//echo  strtotime ( "+1 day" ),  "\n" ;
//echo  strtotime ( "+1 week" ),  "\n" ;
//echo  strtotime ( "+1 week 2 days 4 hours 2 seconds" ),  "\n" ;
//echo  strtotime ( "next Thursday" ),  "\n" ;
//echo  strtotime ( "last Monday" ),  "\n"
//设置时区
        ini_set('date.timezone', 'Asia/Shanghai');

        $tt = strtotime("+1 day");
        echo $tt;
        echo date('Y-m-d H:i:s', $tt);

        $today_b = date('Y-m-d H:i:s', $today_s);

        include $this->template('index');
    }

    public function doWebLiebiao() {
        //这个操作被定义用来呈现 规则列表
    }

    public function doWebSunhooperson() {
        //这个操作被定义用来呈现 管理中心导航菜单
    }

    public function doWebSunhooservice() {
        //这个操作被定义用来呈现 管理中心导航菜单
    }

}
