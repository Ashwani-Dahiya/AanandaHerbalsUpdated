<?php 
include '../database/config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['save_assign'])){
    $datas = $_POST['json_data'];
    $sql = "";

$json['status'] = false ;
    
    foreach($datas as $data){
        $pro_id = $data['product_id'];
        $price = $data['price'];
        $frei_id = $data['frei_id'];
        $status = $data['status'];
       
        $sql .= "INSERT INTO `tbl_assign_products` ( `frei_id`, `pro_id`, `price`, `addon`, `status`)
        VALUES ('$frei_id','$pro_id', '$price', '$date', $status)
        ON DUPLICATE KEY UPDATE
          `frei_id` = VALUES(`frei_id`),
          `pro_id` = VALUES(`pro_id`),
          `price` = VALUES(`price`),
          `status` = VALUES(`status`);
        ";
    }
    $json['sql']=  $sql;
    if($link->multi_query($sql)===TRUE){
        $json['status'] = true;
    }else{
        $json['status'] = false;
        $json['msg'] = $link->error;
    }
echo json_encode($json);
 
    
}

