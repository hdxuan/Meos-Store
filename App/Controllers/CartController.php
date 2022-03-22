<?php

use App\Core\Controller;

class CartController extends Controller
{
    private $cartModel;
    private $orderModel;
    private $userModel;

    function __construct()
    {
        $this->cartModel = $this->model('CartModel');
        $this->orderModel = $this->model('OrderModel');
        $this->userModel = $this->model('UserModel');
    }
    function index()
    {
        $productInCart = $this->cartModel->getIdProductCart($_SESSION['user']['id']);
        if (!$productInCart) {
            $productInCart = [];
        }
        $data['productInCart'] = $productInCart;
        $data['addresses'] = $this->userModel->getByAddress($_SESSION['user']['id']);



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

    function checkout() // đặt hàng
    {
        $data['id_user'] = $_SESSION['user']['id'];
        $data['address'] = $_POST['address'];
        $data['phone'] = $_SESSION['user']['phone'];


        $productInCart = $this->cartModel->getIdProductCart($_SESSION['user']['id']);
        if (!$productInCart) {
            $productInCart = [];
        }

        foreach ($productInCart as $key => $product) {
            $id = $product['id'];
            $data['id_product'][] = $id;
            $data['amount'][] = intval($_POST["numOfProduct$id"]); //intval: lay so nguyen/ lấy số lượng từng sp theo id
            $data['price'][] = $_POST["price$id"]; // gia trong order k thay đôi
        }
        //print_r($_POST);
        // echo "<pre>";

        // print_r($data['id_product']);
        // die();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $result = $this->orderModel->store($data);
        if ($result === true) {
            $productInCart = $this->cartModel->deleteCart($_SESSION['user']['id']);
        }


        header("Location:" . DOCUMENT_ROOT . "/home");
    }
}
