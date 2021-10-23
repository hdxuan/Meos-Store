<?php

use App\Core\Controller;

class CustomerController extends Controller
{
    private $customerModel;

    function __construct()
    {
        $this->customerModel = $this->model('CustomerModel');
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


    function store()
    {
    }

    function update($id)
    {
    }

    function delete($id)
    {

        $this->customerModel->delete($id);
        header("Location: " . DOCUMENT_ROOT . "/admin/customer");
    }
}
