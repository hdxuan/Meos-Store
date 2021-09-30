<?php

use App\Core\Controller;

class ProductsController extends Controller
{
    private $productsModel;
    private $categoryModel;
    function __construct()
    {
        $this->productsModel = $this->model('ProductsModel');
        $this->categoryModel = $this->model('CategoryModel');
    }
}
