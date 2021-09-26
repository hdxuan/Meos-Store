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
        if (isset($_GET)) {

            $result = $this->cartModel->addToCart($_GET);
            echo json_encode($result);
            return;
        }
    }
    function amountInCart()
    {
        if (isset($_SESSION['user'])) {
            $amount = $this->cartModel->amountInCart($_SESSION['user']['id']);
            echo $amount;
        } else {
            echo 0;
        }
    }
}
