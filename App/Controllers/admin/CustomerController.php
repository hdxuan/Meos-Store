<?php

use App\Core\Controller;

class CustomerController extends Controller
{
    private $customerModel;

    function __construct()
    {
        $this->customerModel = $this->model('UserModel');
    }

    function Index()
    {
        $customer = $this->customerModel->all();
        if (!$customer) {
            $customer = [];
        }
        $data['customer'] = $customer;

        $this->view("/admin/customer/index", $data);
    }
}
