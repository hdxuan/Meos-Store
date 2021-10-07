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
}
