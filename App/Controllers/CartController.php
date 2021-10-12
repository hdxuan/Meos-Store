<?php

use App\Core\Controller;

class CartController extends Controller
{
    private $cartModel;
    private $orderModel;

    function __construct()
    {
        $this->cartModel = $this->model('CartModel');
        $this->orderModel = $this->model('OrderModel');
    }
    function index()
    {
        $numProduct = $this->cartModel->getIdProductCart($_SESSION['user']['id']);
        if (!$numProduct) {
            $numProduct = [];
        }
        $data['productInCart'] = $numProduct;

        // die(var_dump($data['numProduct']));

        $this->view("/cart/Cart", $data);
    }

    function addToCart()
    {
        // su dung ajac ne return ve 1 chuoi xem thanh cong k
        if (isset($_GET)) {
            $result = $this->cartModel->addToCart($_GET);
            echo json_encode($result);
        }
    }
    function amountInCart()
    {
        if (!isset($_SESSION['user'])) {
            $result = 0;
        } else {

            $result = $this->cartModel->amountInCart($_SESSION['user']['id']);
        }
        echo $result;
    }

    function removeCart()
    {
        $idProduct = $_GET['id'];
        $delProduct = $this->cartModel->deleteCart($_SESSION['user']['id'], $idProduct);
        header("Location: " . DOCUMENT_ROOT . DS . "Cart");
    }

    function total()
    {
        $total = $this->cartModel->total($_SESSION['user']['id']);
        echo $total;
    }
    function checkout()
    {

        $data['id_user'] = $_SESSION['user']['id'];
        $data['address'] = $_SESSION['user']['address'];
        $data['phone'] = $_SESSION['user']['phone'];

        $productInCart = $this->cartModel->getIdProductCart($_SESSION['user']['id']);
        if (!$productInCart) {
            $productInCart = [];
        }

        foreach ($productInCart as $key => $product) {
            $id = $product['id'];
            $data['id_product'][] = $id;
            $data['amount'][] = intval($_POST["numOfProduct$id"]); //lay so nguyen
        }
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $result = $this->orderModel->store($data);
        if ($result === true) {
            $productInCart = $this->cartModel->deleteCart($_SESSION['user']['id']);
        }
        echo '<script>';
        echo 'alert("Đặt hàng thành công!")';
        echo '</script>';

        header("Location:" . DOCUMENT_ROOT . "/home");
    }
}
