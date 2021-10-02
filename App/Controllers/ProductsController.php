<?php

use App\Core\Controller;

class ProductsController extends Controller
{
    private $productsModel;
    private $categoryModel;
    function __construct()
    {
        $this->productsModel = $this->model('ProductModel');
        $this->categoryModel = $this->model('CategoryModel');
    }

    function index($id)
    {
        echo "$id";
        die();

        $this->view("/product/index");
    }
}
