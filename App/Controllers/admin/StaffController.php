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
        // echo "<pre>";
        // print_r($data['staff']);
        // echo "<pre>";
        // die();

        $this->view("/admin/staff/index", $data);
    }

    function create()
    {
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
        $idUserAdmin = $this->customerModel->getLastAdminByID();
        // die(print_r($idUserAdmin));
        $addressAdmin = $this->customerModel->addAdressAdmin($data, $idUserAdmin);

        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Thêm nhân viên thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = "Thêm nhân viên thất bại";
        }
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang create"
            return;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/staff"); // neu dung tro lai trang product
    }

    function edit($id)
    {
        // echo $id;
        $data['idAdmin'] = $this->customerModel->getIdAdmin($id);
        // die(print_r($data['idAdmin']));
        $this->view("/admin/staff/edit", $data);
    }



    function update($id)
    {
        if (!isset($_POST)) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $data = $_POST;
        // die(print_r($data));

        $data['name'] = $_POST['name'];
        // $data['address'] = $_POST['address'];
        $data['phone'] = $_POST['phone'];
        $data['email'] = $_POST['email'];
        $data['idAdmin'] = $id;




        $result = $this->customerModel->update($data);

        $addressAdmin = $this->customerModel->updateAdressAdmin($data);

        if ($result === true || $addressAdmin === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Sửa thông tin nhân viên thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = "Sửa thông tin nhân viên thất bại";
        }
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang create"
            return;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/staff"); // neu dung tro lai trang product
    }

    function delete($id)
    {

        $result = $this->customerModel->delete($id);

        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Xóa nhân viên thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = "Xóa nhân viên thất bại";
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/staff");
    }
}
