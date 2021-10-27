<?php

use App\Core\Controller;

class LoginController extends Controller
{
    private $customerModel;

    function __construct()
    {
        $this->customerModel = $this->model('customerModel');
    }

    function index()
    {
        // $data['admin'] = $this->customerModel->admin();

        // die(var_dump($data['numproducts']));
        $this->view("admin/login/index", []);
    }
}
