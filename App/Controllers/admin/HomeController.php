<?php

use App\Core\Controller;

class HomeController extends Controller
{
    private $cakeModel;
    private $categoryModel;

    function __construct()
    {
        $this->cakeModel = $this->model('CakeModel');
        $this->categoryModel = $this->model('CategoryModel');
    }

    function Index()
    {

        $this->view("/admin/home/index");
    }
}
