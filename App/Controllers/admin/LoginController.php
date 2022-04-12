<?php

use App\Core\Controller;

class LoginController extends Controller
{
    private $userModel;

    function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }

    function index()
    {
        $this->view("admin/login/index");
    }

    function checkAdmin()
    {

        if (isset($_POST)) {

            $result = $this->userModel->checkAdmin($_POST);
            // die(var_dump($result));
            if ($result === true) {
                $admin = $this->userModel->getByEmailAdmin($_POST['email']);

                $_SESSION['admin'] = $admin;

                // die(var_dump($_SESSION['admin']));

                header("Location: " . DOCUMENT_ROOT . DS . "admin/home");
            } else {
                $_SESSION['errorAdmin'] = $result;
            }
        } else {
            $_SESSION['errorAdmin'] = "Cần nhập vào Email và mật khẩu";
        }
        header("Location: " . DOCUMENT_ROOT . DS . "admin");
    }

    function checkOut()
    {
        unset($_SESSION['admin']);
        header("Location:" . DOCUMENT_ROOT . DS . "admin");
    }
}
