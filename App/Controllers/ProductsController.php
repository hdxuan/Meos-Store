<?php

use App\Core\Controller;

class ProductsController extends Controller
{
    private $productModel;
    private $productTypeModel;
    function __construct()
    {
        $this->productModel = $this->model('ProductModel');
        $this->productTypeModel = $this->model('ProductTypeModel');
    }

    function Dog()
    {

        $productType = $this->productTypeModel->allDog();
        $data["productType"] = $productType;

        $productTypeId = 1;
        if (isset($_GET['productTypeId'])) {
            $productTypeId = $_GET['productTypeId'];
        }
        $products = $this->productModel->getByProductType($productTypeId);
        $data["products"] = $products;

        // die(var_dump($data["products"]));
        $this->view("/product/Dog", $data);
    }

    function Cat()
    {
        $productTypeId = 1;
        if (isset($_GET['productTypeId'])) {
            $productTypeId = $_GET['productTypeId'];
        }
        $products = $this->productModel->getByProductType($productTypeId);
        $productType = $this->productTypeModel->allCat();
        $data["productType"] = $productType;
        $data["products"] = $products;
        $this->view("/product/Cat", $data);
    }

    function search()
    {
        $key = $_GET['key'];
        $data['key'] = $key;

        $products = $this->productModel->search($key);
        $data['products'] = $products;

        $this->view("/product/search", $data);
    }
}
