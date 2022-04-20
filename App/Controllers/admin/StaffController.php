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
        // $categories = $this->productTypeModel->all();
        // $data['categories'] = $categories;
        $this->view("/admin/staff/create");
    }


    function store()
    {
        if (!isset($_POST)) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $data = $_POST;

        $data['name'] = $_POST['name'];
        $data['address'] = $_POST['address'];
        $data['phone'] = $_POST['phone'];
        $data['email'] = $_POST['email'];
        $data['passwd'] = $_POST['passwd'];

        $result = $this->customerModel->store($data);
        $idUserAdmin = $this->customerModel->getAdminByID();
        // die(print_r($idUserAdmin));
        $addressAdmin = $this->customerModel->addAdressAdmin($data, $idUserAdmin);

        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Thêm nhân viên thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang create"
            return;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/staff"); // neu dung tro lai trang product
    }

    function edit()
    {
        $this->view("/admin/staff/edit");
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
