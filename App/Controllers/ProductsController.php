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
        $productType = $this->productTypeModel->allCat();
        $data["productType"] = $productType;

        $productTypeId = 11;
        if (isset($_GET['productTypeId'])) {
            $productTypeId = $_GET['productTypeId'];
        }
        $products = $this->productModel->getByProductType($productTypeId);

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

    function detail()
    {
        $productId = $_GET['productId'];
        $detailProduct = $this->productModel->detail($productId);
        $data['detailProduct'] = $detailProduct;


        $this->view("/product/Detail", $data);
    }

    // comment
    function Comment()
    {

        if (isset($_POST)) {
            $data['content'] = $_POST['comments'];
            if (isset($_SESSION['user'])) {
                $data['created'] = date("d/m/Y H:i:s");
                $data['idUser'] = $_SESSION['user']['id'];
                $data['idProduct'] = 1;
            }
            var_dump($data);
        }
    }
}
