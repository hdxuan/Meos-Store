<?php

use App\Core\Controller;

class CartController extends Controller
{
    private $cartModel;

    function __construct()
    {
        $this->cartModel = $this->model('CartModel');
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
}
