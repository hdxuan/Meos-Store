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
        $this->view("/cart/Cart");
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
        $result = $this->cartModel->amountInCart($_SESSION['user']['id']);
        echo $result;
    }

    function removeCart()
    {
    }
}
