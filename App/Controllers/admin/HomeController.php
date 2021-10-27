<?php

use App\Core\Controller;

class HomeController extends Controller
{
    private $productModel;
    private $productTypeModel;

    function __construct()
    {
        $this->productModel = $this->model('ProductModel');
        $this->customerModel = $this->model('CustomerModel');
        $this->orderModel = $this->model('OrderModel');
    }

    function Index()
    {
        $data['numproducts'] = $this->productModel->numProduct();
        $data['numCustomer'] = $this->customerModel->numOfCustomer();
        $data['numOrder'] = $this->orderModel->numOfOrders();
        // die(var_dump($data['numproducts']));
        $this->view("/admin/home/index", $data);
    }
}
