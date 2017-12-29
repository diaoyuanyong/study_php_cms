<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//管理实体类
class Manage{
    private $_tpl;
    private $_admin_user;
    private $_admin_pass;
    private $_level;
    //构造方法
    public  function __construct(&$_tpl) {
               $this->_tpl = $_tpl;
               $this->Action();
    }
    //业务流程控制器
    private function Action(){
            switch($_GET['action']){    
                case "list":
                    $this->_tpl->assign('list',true);
                    $this->_tpl->assign('title','管理员列表');
                    $this->_tpl->assign('allManage', $this->getManage());
                    $this->getManage();
                    break;
                case "stem_mysqli":
                       $this->_tpl->assign('stem_mysqli',true);
                       $this->_tpl->assign('title','mysqli_stem'); 
                       if($this->length===$this->stemSqlName){
                                $this->_tpl->assign("mysqli_stem",$this->allGetManage());
                         }else{
                             echo "Length Error";      
                         }
                        break;
                case "add":
                    if(isset($_POST['send'])){
                        $this->_admin_user = htmlspecialchars(trim($_POST['admin_user']));
                        $this->_admin_pass =sha1($_POST['admin_pass']);
                        $this->_level = htmlspecialchars(strim($_POST['level']));
                            if($this->addManage()){
                                    Tool::alertLocation('Add Success', 'manage.php?action=list');

                            }else{

                                Tool::alertBackLocation('Error:addMange');

                            }
                        }
                    $this->_tpl->assign("add",true);
                    $this->_tpl->assign("title",'新增管理员');
                    break;
                case "update":
                    $this->_tpl->assign("update",true);
                    $this->_tpl->assign("title",'修改管理员');
                    break;
                case "delete":
                    $this->_tpl->assign("delete",true);
                    $this->_tpl->assign("title",'删除管理员');
                    break;
                default : 
                    echo "Error:#0001";
            }
                $this->_tpl->display('manage.tpl');
            
}


    //查询管理

    public  function getManage(){
        
            $_db = DB::getDB();
            //sql
            $_sql = "SELECT m.id,
                                m.admin_user,
                                
                                m.login_count,
                                m.last_ip,
                                m.last_time,
                                m.reg_time,
                                l.level_name
                            FROM 
                                cms_manage m,
                                cms_level l
                            WHERE
                             l.level = m.level
                            ORDER BY
                               id ASC
                                LIMIT 0,100";
            $_result = $_db->query($_sql);
            $_htmlDate =  array();
            while(!!$_object = $_result->fetch_object()){
                print_r($_htmlDate[]= $_object);   
            }
           DB::unDB($_result, $_db);
           return $_htmlDate;
    }
    
    
    //查询管理
    public  function getManage1(){
           $_db = DB::getDB();
            $_sql = "SELECT m.id,
                                m.admin_user,
                                m.login_count,
                                m.last_ip,
                                m.last_time,
                                m.reg_time,
                                l.level_name
                            FROM 
                                cms_manage m,
                                cms_level l
                            WHERE
                             l.level = m.level
                            ORDER BY
                               id ASC
                                LIMIT 0,100";
                $stem=$_db->prepare($_sql);
                $stem->bind_result($mid,$madmin_user,$mlogin_count,$mlast_ip,$mlast_time,$mreg_time,$llevel_name);
                $stem->execute();
                $stem->store_result();
                $result=$stem->result_metadata();
                //数据库字段数量；
                    $this->length =$result->field_count;
//                        var_dump($result);
                        //print_r($this->length);
                        //echo gettype($result);
                        //echo gettype($this->length) ;
            while($file = $result->fetch_field()){
               $fetch_name[]=  $file->name;
            }
            //获取数据表的字段，已数组的形式排序
             $this->stemSqlName = count($fetch_name);
                   //echo gettype($this->stemSqlName);
            //这里遍历出数据;
            $ay=array();
//            $stem->bind_result($mid,$madmin_user,$mlogin_count,$mlast_ip,$mlast_time,$mreg_time,$llevel_name);
              while($stem->fetch()){
               $fetchAll[id]= $mid;
               $fetchAll[admin_user] = $madmin_user;
               $fetchAll[level] = $llevel_name;
               $fetchAll[login] = $mlogin_count;
               $fetchAll[ip] = $mlast_ip;
               $fetchAll[time] = $mlast_time;
               $fetchAll[reg_time] = $mreg_time;
               //print_r($fetchAll);
                    $ay[]=$fetchAll;
               } 
               
               //print_r($ay);
//               foreach($ay as $key=>$value){
//                    print_r($value[id]);
//               }
            $stem->free_result();
            $stem->close();
            return $ay;
    }
    /*
     * 
     * 
     * 
     *      
     */
    
    public $length ; //获取$result->field_count的字段长度；
    public $stemSqlName;//获取数据表的字段,
    public  function allGetManage(){
        $_db = DB::getDB();
        $_sql="SELECT 
                               id,
                               admin_user,
                               level,
                               login_count,
                               last_ip,
                               last_time,
                               reg_time
                     FROM 
                               cms_manage
              ORDER BY
                               id ASC
                     LIMIT
                               0,20";
                $stem=$_db->prepare($_sql);
                $stem->bind_result($id,$admin_user,$level,$login_count,$last_ip,$last_time,$reg_time);
                $stem->execute();
                $stem->store_result();
                $result=$stem->result_metadata();
                //数据表字段数量；
                    $this->length =$result->field_count;
//                        var_dump($result);
                        //print_r($this->length);
                        //echo gettype($result);
                        //echo gettype($this->length) ;
            while($file = $result->fetch_field()){
               $fetch_name[]=  $file->name;
            }
            //获取数据表的字段，已数组的形式排序
             $this->stemSqlName = count($fetch_name);
                   //echo gettype($this->stemSqlName);
            //这里遍历出数据;
            $ay=array();
            while($stem->fetch()){
               $fetchAll[id]= $id;
               $fetchAll[admin_user] = $admin_user;
               $fetchAll[level] = $level;
               $fetchAll[login] = $login_count;
               $fetchAll[ip] = $last_ip;
               $fetchAll[time] = $last_time;
               $fetchAll[reg_time] = $reg_time;
               //print_r($fetchAll);
                    $ay[]=$fetchAll;
               } 
               
               //print_r($ay);
//               foreach($ay as $key=>$value){
//                    print_r($value[id]);
//               }
            $stem->free_result();
            $stem->close();
            return $ay;
            
    }
    
    public function addManage(){
        $_db = DB::getDB();
        $_sql = "INSERT INTO 
                                        cms_manage(
                                                            admin_user,
                                                            admin_pass,
                                                            level,
                                                            reg_time
                                                            ) VALUES(
                                                                         '$this->_admin_user',
                                                                         '$this->_admin_pass',
                                                                          '$this->_level',
                                                                    NOW()
                                                                            )";
        $_db->query($_sql);
        $_affected_rows  = $_db->affected_rows;
        DB::unDB($_result=null, $_db);
        return $_affected_rows;
        
    }
    
    public function deleteManage(){
        
    }
    
    public function  chageMange(){
        
    }
 
  
    /*function summaryOne() ; 计算汇总,
     * 
     *
     * 
     *       
     */
    
    private $bb; //汇总
    public function summaryOne(){
        $db =DB::getDB();
        $sql = "SELECT id FROM `cms_manage`";
        $_result = $db->query($sql);
        $dd =  array();
         while (!!$row = $_result->fetch_assoc()) {
             $dd[] =  $row['id'];
         }
         foreach ($dd as $key=>$value){
             $this->bb += $value;
         }
         DB::unDB($_result, $_db);
         return $this->bb;
        }
        
        
    /*---填补没有的数据库id;
     *---class Sort();
     *private $this->Poor;  差值,可以在ID是乱序时候,填补没有的id,从大倒小.
     * private  $this->bbArr; 接收结果集 mysqli的 rows['id'] 数组     
     */
       
        public  function Sort(){
            $db =DB::getDB();
            $sql = "SELECT id FROM `cms_manage`";
            $_result = $db->query($sql);
            $this->bbArr =  array();
                while (!!$row = $_result->fetch_assoc()) {
                    $this->bbArr[]=  $row['id'];
                }
                 foreach ($this->bbArr as $key=>$value){
                 $this->Poor= $value-$key;
                 
                        while($this->Poor !=1){
                            $this->Poor--;
                                 if($this->Poor ==1){
                                     $this->Poor = $value-1;
                                     goto ret;
                                 }
                                 
                        }
                        if($this->Poor==1){
                            $this->Poor = $value-1;
                                     goto ret;
                        }
               }   
               ret:
                DB::unDB($_result, $_db);
                return $this->Poor;
        }
}
