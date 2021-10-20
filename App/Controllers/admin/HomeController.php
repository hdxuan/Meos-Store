<?php

use App\Core\Controller;

class HomeController extends Controller
{
    private $cakeModel;
    private $productTypeModel;

    function __construct()
    {
        $this->cakeModel = $this->model('ProductModel');
        $this->productTypeModel = $this->model('ProductTypeModel');
    }

    function Index()
    {

        $this->view("/admin/home/index");
    }
}
