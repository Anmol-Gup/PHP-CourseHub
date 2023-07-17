<?php
require 'connection.php';
class Cart
{
    private $connection;
    function __construct()
    {
        $this->connection=connect_db();
    }
    function AddToCart($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            if (!isset($_SESSION['Isloggedin']))
                return false;

            if (isset($_SESSION['cart'])) {
                if (in_array($id, $_SESSION['cart']))
                    return true;
                else {
                    array_push($_SESSION['cart'], $id);
                    print_r($_SESSION['cart']);
                }
            } else
                $_SESSION['cart'] = array($id);
        }
    }

    function DeleteCourse($id, $price)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            session_start();
            if (isset($_SESSION['total_price']))
                $_SESSION['total_price'] -= floatval($price);

            $key = array_search($id, $_SESSION['cart']);
            unset($_SESSION['cart'][$key]);
            return $_SESSION['total_price'];
        }
    }
    function ShowCart()
    {
        if (isset($_SESSION['cart']))
            return $_SESSION['cart'];
    }
    function CheckOut($amount, $name, $status)
    {
        $insertquery = "INSERT INTO orders VALUES('',NOW(),$amount,'$name',$status,'')";
        $result = $this->connection->query($insertquery);
        if ($result)
            return $this->connection->insert_id;
        else
            return 0;
    }

    function UpdateOrder($order_id,$payment_id)
    {
        session_start();
        $updatequery="UPDATE orders SET payment_id='$payment_id', payment_status=1 WHERE order_id=$order_id";
        $result = $this->connection->query($updatequery);
        if ($result)
        {
            unset($_SESSION['cart']);
            unset($_SESSION['total_price']);
            return 1;
        }
        else
            return 0;
    }
}

$data = file_get_contents('php://input');
$data = json_decode($data, true);
if (isset($data)) {
    $cart = new Cart();
    if ($data['function'] === 'AddToCart') {
        $result = json_encode($cart->AddToCart(intval($data['id'])));
        print_r($result);
    }
    if ($data['function'] === 'DeleteCourse') {
        $result = json_encode($cart->DeleteCourse(intval($data['id']), floatval($data['price'])));
        print_r($result);
    }
    if ($data['function'] === 'CheckOut') {
        $result = json_encode($cart->CheckOut($data['amount'], $data['customer_name'], $data['status']));
        echo $result;
    }
    if($data['function']==='UpdateOrder')
    {
        $result = json_encode($cart->UpdateOrder($data['order_id'],$data['payment_id']));
        echo $result;
    }
}
