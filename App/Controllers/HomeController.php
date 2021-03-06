<?php

use App\Core\Controller;

class HomeController extends Controller
{
    private $productModel;
    private $productTypeModel;

    function __construct()
    {
        $this->productModel = $this->model('ProductModel');
        $this->productTypeModel = $this->model('ProductTypeModel');
        $this->commentModel = $this->model('CommentModel');
    }

    function Index()
    {
        $products = $this->productModel->all();
        if (!$products) {
            $products = [];
        }

        $data['products'] = $products;
        // $data['bestSellers'][] = $products[0]; // mảng chạy từ 0
        // $data['bestSellers'][] = $products[4];
        // $data['bestSellers'][] = $products[80];
        // $data['bestSellers'][] = $products[64];
        // $data['bestSellers'][] = $products[33];
        // $data['bestSellers'][] = $products[43];

        $data['categories'] = $this->productTypeModel->all();
        $data['categoriesDog'] = $this->productTypeModel->allDog();
        $data['bestSellers'] = $this->commentModel->bestSellers();
        // echo "<pre>";
        // print_r($data['bestSellers']);
        // echo "<pre>";
        // die();

        // paging
        $definePage = 9;
        $numProduct = $this->productModel->numProduct();

        $pages = ceil(($numProduct / 6) / $definePage);
        $data['pages'] = $pages; // so trang

        $currentPage = 1;
        if (isset($_GET['page'])) {
            $currentPage = $_GET['page'];
        }

        $index = ($currentPage - 1) * $definePage;
        $productOnlyPageDog = $this->productModel->pagingDog($index, $definePage);
        $data['productOnlyPageDog'] = $productOnlyPageDog;

        $productOnlyPageCat = $this->productModel->pagingCat($index, $definePage);
        $data['productOnlyPageCat'] = $productOnlyPageCat;

        // print_r($data['productOnlyPageDog']);

        // die();
        $data['currentPage'] = $currentPage;


        // discount
        //$data['discounts'] = $this->productModel->getProductDiscount();

        $this->view("/home/index", $data);
    }
}
