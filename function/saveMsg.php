<?php
// $refSms= echo"<script>ref_msg ;</script>"


if($check_seller_number_notify and $commerciale_sms_notify=="yes"){
    
$log_file = dirname(__FILE__) . "/../logs/my_success.log";

$date = 'Le ' . date('d/m/Y') . ' | ' . date('H:i:s');

$data_response = "_" . "success seller sms message notify" . "_" . $check_seller_number_notify . "_" . $order_id;

chmod($log_file, 0777); //  Now universally accessible

file_put_contents($log_file, $date . $data_response . "\n", FILE_APPEND);


}

if($customer_phone){
    
$log_file = dirname(__FILE__) . "/../logs/my_success.log";

$date = 'Le ' . date('d/m/Y') . ' | ' . date('H:i:s');

$data_response = "_" . "success client sms message notify" . "_" . $customer_phone . "_" . $order_id;

chmod($log_file, 0777); //  Now universally accessible

file_put_contents($log_file, $date . $data_response . "\n", FILE_APPEND);


}









// function logs_success($check_seller_number_notify,$order_id)
// {

// file_put_contents(dirname(__FILE__).'myfile.log', json_encode($check_seller_number_notify));



    // if (!file_exists($log_file)) {

    //     $log_file =  "./logs/my_success.log";

    //     $date = 'Le ' . date('d/m/Y') . ' | ' . date('H:i:s');

    //     $data_response = "_" . "succèss seller sms message notify" . "_" . $check_seller_number_notify . "_" . $order_id;

    //     chmod($log_file, 0777); //  Now universally accessible

    //     file_put_contents($log_file, $date . $data_response . "\n", FILE_APPEND);

    // }

// }

//  logs_success($check_seller_number_notify,$order_id);

