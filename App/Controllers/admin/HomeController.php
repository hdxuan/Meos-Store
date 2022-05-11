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
        $this->producttypeModel = $this->model('ProductTypeModel');
        $this->discountModel = $this->model('DiscountModel');
        $this->commentModel = $this->model('CommentModel');
        $this->userModel = $this->model('UserModel');
    }

    function Index()
    {
        $data['numproducts'] = $this->productModel->numProduct();
        $data['numCustomer'] = $this->customerModel->numOfCustomer();
        $data['numOrder'] = $this->orderModel->numOfOrders();
        $data['countOrder'] = $this->orderModel->countOrders();
        $data['countproducts_type'] = $this->producttypeModel->countproducts_type();
        $data['countDiscounts'] = $this->discountModel->countDiscounts();
        $data['countComment'] = $this->commentModel->countComment();
        $data['countDiscounts'] = $this->discountModel->countDiscounts();
        $data['countStaff'] = $this->userModel->countStaff();
        // die(var_dump($data['numOrder']));
        $this->view("/admin/home/index", $data);
    }
}
