<?php
namespace app;
require 'classes/OrderList.php';
require 'classes/Order.php';
require 'classes/Transaction.php';
use app\classes\Order;
use app\classes\OrderList;
use app\classes\Transaction;

$orderList = new OrderList();
$orders = [
    new Order(0, 1, 42, 'Alice'),
    new Order(0, 10, 43, 'Bob'),
    new Order(1, 20, 43, 'John')
];
foreach ($orders as $order){
    $orderList->push_order($order);
}

echo "Полная информация в OrderList\n";
foreach ($orderList->getSellers() as $seller) echo $seller;
foreach($orderList->getCustomers() as $customer) echo $customer;
echo "Разница: ";
print_r($orderList->get_spread());
echo "\nТранзакции: \n";
foreach($orderList->process() as $process) echo $process;