<?php
$myclass = new WC_5Sender_Integration();

$customer_first_name;
$customer_last_name;
$customer_email;
$customer_phone;
$order_item_count;
$order_item_count_total_price_formatted;
$order_id;
$order_item_count_total_price;
$order_items;
$order_item_count;

// Setting menu for plugin
$token_data = $myclass->api_token;
$cle_marchand = $myclass->cle_marchand;
$entete_message = $myclass->entete_message;
$check_status = $myclass->status;
$check_customer_message = $myclass->customer_message;
$check_seller_number_notify = $myclass->seller_number_notify;
$commerciale_sms_notify = $myclass->commerciale_sms_notify;
$currentDateTime = date('Y-m-d H:i:s');

if (isset($token_data) and isset($check_seller_number_notify) and $check_status == "yes" and $commerciale_sms_notify == "yes") {?>

<script type="text/javascript">

  alert("HELLO");

var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

var raw  = JSON.stringify({
  "fullnameto":"Bonjour Mme/Mr",
  "phoneto":"<?php echo $check_seller_number_notify ?>" ,
  "title": "<?php echo $entete_message ?>" ,
  "senderkey":"<?php echo $cle_marchand ?>" ,
  "outemail": "<?php echo $token_data ?>" ,
  "cauris": "40",
  "message": 'Une nouvelle commande pour: <?php echo $order_item_count_total_price . "FCFA" . " " . "de" . " " . $customer_first_name . ", " . "Tél.:" . " " . $customer_phone . ", " . "Nbre d\'articles:" . $order_item_count ?>',
  "createdDate": "<?php echo $currentDateTime ?>"

});

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

fetch("https://app.5sender.com/sendersms/5sender/api", requestOptions)
  .then(response => response.text())
  .then(result => {
    // console.log(result);
    const res=JSON.parse(result);
    //  console.log(res,res.SmsId);
    const ref_msg = res.SmsId;

       if(ref_msg){
    <?php

    require_once __DIR__ . '/../function/saveMsg.php';

    ?>
  }
  })
  .catch(error => {

// console.log('error', error)
  });
</script>
 <?php }?>