<?php

use App\Core\Controller;

class ProfileController extends Controller
{
    private $userModel;

    function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }

    function index()
    {

        $this->view("/profile/Profile");
    }

    function update()
    {

        if (isset($_POST)) {
            $result =  $this->userModel->editProfile($_POST, $_SESSION['user']['id']);
            $data['user'] = $this->userModel->getById($_SESSION['user']['id']);

            $_SESSION['user'] = $data['user'];


            $this->view("/profile/Profile", $data);
        } else {
            echo "k the chinh sua";
        }
    }
}
