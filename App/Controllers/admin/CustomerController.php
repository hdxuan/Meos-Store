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

        $result = $this->customerModel->delete($id);

        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Xóa khách hàng thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/customer");
    }
}
