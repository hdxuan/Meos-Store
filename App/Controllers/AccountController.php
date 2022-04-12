<?php

use App\Core\Controller;

class AccountController extends Controller
{
    private $userModel;

    function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }

    function index()
    {
        $this->view("/account/login");
    }

    function register()
    {
        $this->view("/account/register");
    }

    function signUp()
    {
        if (isset($_POST)) {

            $result = $this->userModel->register($_POST);
            if ($result === true) {
                $data['message'][] = "Đăng ký thành công. Đăng nhập thôi nào!";
                $this->view("/account/login", $data);
            } else {
                $data['message'][] = "Đăng ký thất bại!";
                $this->view("/account/register", $data);
            }
        }
    }

    function logIn()
    {
        if (isset($_POST)) {
            $result = $this->userModel->authenticate($_POST);
            if ($result === true) {
                $user = $this->userModel->getByEmail($_POST['your_email']);
                $_SESSION['user'] = $user;

                header("Location: " . DOCUMENT_ROOT);
            } else {
                $data['error'][] = $result;
            }
        } else {
            $data['error'][] = "Cần nhập vào Email và mật khẩu";
        }
        $this->view("/account/login", $data);
    }

    function logOut()
    {
        unset($_SESSION['user']);
        header("Location:" . DOCUMENT_ROOT);
    }
}
