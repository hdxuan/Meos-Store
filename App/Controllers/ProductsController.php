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

        $idProductType = $this->productModel->getByIdProductType($productId);
        $data['RelatedProducts'] = $this->productModel->Related_products($idProductType);
        $data['comments'] = $this->productModel->getComment($productId);
        if ($data['comments'] == false) {
            $data['comments'] = [];
            $_SESSION['comments']['error'] = "Chưa có bình luận nào về sản phẩm này.";
        }
        $data['ProductType'] = $this->productModel->getProductType($idProductType);



        $data['sumRate'] = $this->productModel->getRate($productId);
        // print_r($ProductType);
        // die();

        $this->view("/product/Detail", $data);
    }

    // comment
    function Comment()
    {

        if (isset($_POST)) {
            $data['content'] = $_POST['comments'];
            $data['created_at'] = date("d/m/Y");
            $data['idProduct'] = $_POST['idProduct'];
            $data['rank'] = $_POST['rank'];
            if (isset($_SESSION['user'])) {
                $data['idUser'] = $_SESSION['user']['id'];
                $data['error'] = "";
            } else {
                $data['error'] = "Vui lòng đăng nhập để bình luận sản phẩm";
            }

            $_SESSION['error']['comment'] = $data['error'];
        }

        $data['comment'] = $this->productModel->Comment($data);
        // print_r($data);
        // die();
        header("Location:" . DOCUMENT_ROOT . "/products/Detail?productId=" . $data['idProduct'] . "#comment");
    }
}
