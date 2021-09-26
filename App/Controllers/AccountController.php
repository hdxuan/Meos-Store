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

    function signup()
    {
        $result = $this->userModel->register($_POST);
        if ($result === true) {
            $data['message'][] = "Register successful. Please login!";
            $this->view("/account/login", $data);
        } else {
            $data['error'][] = "Register Unsuccessful ";
            $this->view("/account/register", $data);
        }
    }

    function login()
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
            $data['error'][] = "Email & Password are a required";
        }

        $this->view("/account/login", $data);
    }

    function logOut()
    {
        unset($_SESSION['user']);
        header("Location: " . DOCUMENT_ROOT);
    }
}
