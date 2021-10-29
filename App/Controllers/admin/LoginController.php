<?php

use App\Core\Controller;

class LoginController extends Controller
{
    private $customerModel;

    function __construct()
    {
        $this->customerModel = $this->model('CustomerModel');
    }

    function index()
    {
        $this->view("admin/login/index");
    }

    function checkAdmin()
    {

        // die(var_dump($_POST));
        var_dump($_POST);
        echo "<pre>";
        if (isset($_POST)) {

            $admin = $this->customerModel->checkAdminnn($_POST);
            // die(var_dump($admin));
            if ($admin === true) {
                $_SESSION['admin'] = $admin;
                header("Location: " . DOCUMENT_ROOT . DS . "admin/home");
            } else {
                $_SESSION['error'][] = $admin;
            }
        } else {
            $_SESSION['error'][] = "Cần nhập vào Email và mật khẩu";
        }
        // $this->view("/admin/login/index", $data);
        header("Location: " . DOCUMENT_ROOT . DS . "admin/login");
    }
}
