<?php

use App\Core\Controller;

class OrdersController extends Controller
{
    private $orderModel;
    // private $productTypeModel;
    function __construct()
    {
        $this->orderModel = $this->model('orderModel');
        // $this->productTypeModel = $this->model('ProductTypeModel');
    }



    function index()
    {
        $data['orders'] = $this->orderModel->all();

        $this->view("/admin/order/index", $data);
    }

    function total($id)
    {
    }


    function create()
    {
    }

    function store()
    {
    }

    function edit($id)
    {
        $this->view("/admin/order/edit");
    }

    function update($id)
    {
    }

    function delete($id)
    {
    }
}
