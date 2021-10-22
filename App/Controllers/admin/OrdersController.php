<?php

use App\Core\Controller;

class OrdersController extends Controller
{
    private $productModel;
    private $productTypeModel;
    function __construct()
    {
        $this->productModel = $this->model('ProductModel');
        $this->productTypeModel = $this->model('ProductTypeModel');
    }



    function index()
    {


        $this->view("/admin/product/index");
    }

    function create()
    {
    }

    function store()
    {
    }

    function edit($id)
    {
    }

    function update($id)
    {
    }

    function delete($id)
    {
    }
}
