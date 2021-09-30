<?php

use App\Core\Controller;

class AccountController extends Controller
{
    private $userModel;

    function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }
}
