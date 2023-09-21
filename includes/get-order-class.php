<?php

add_action('woocommerce_order_details_after_order_table', 'get_user_order');

function get_user_order($order)
{

    if ($order) {
        $order_id = $order->get_id();
        $customer_first_name = $order->get_billing_first_name();
        $customer_last_name = $order->get_billing_last_name();

        $customer_email = $order->get_billing_email();
        $customer_phone = $order->get_billing_phone();
        $order_items = $order->get_items();
        $order_item_count = count($order_items);

        $order_item_count_total_price = $order->get_total();
        $order_item_count_total_price_formatted = wc_price($order_item_count_total_price);
        $actions = wc_get_account_orders_actions($order);

        require_once 'script-cn-class.php';
         // your code goes below
}
        require_once 'script-sn-class.php';
    }

   
