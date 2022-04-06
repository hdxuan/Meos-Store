<?php

use App\Core\Controller;

class StaffController extends Controller
{
    private $customerModel;

    function __construct()
    {
        $this->customerModel = $this->model('CustomerModel');
    }

    function Index()
    {
        $staff = $this->customerModel->allStaff();
        if (!$staff) {
            $staff = [];
        }
        $data['staff'] = $staff;
        // print_r($data['staff']);
        // die();

        $this->view("/admin/staff/index", $data);
    }

    function create()
    {
        $categories = $this->productTypeModel->all();
        $data['categories'] = $categories;

        $this->view("/admin/product/create", $data);
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
            $_SESSION['alert']['messages'] = "Xóa nhân viên thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/staff");
    }
}
