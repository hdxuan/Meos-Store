<?php

use App\Core\Controller;

class HomeController extends Controller
{
    private $productModel;
    private $categoryModel;

    function __construct()
    {
        $this->productModel = $this->model('ProductModel');
        $this->categoryModel = $this->model('CategoryModel');
    }

    function Index()
    {
        $product = $this->productModel->all();
        if (!$product) {
            $product = [];
        }

        $data['product'] = $product;
        $data['bestSellers'][] = $product[2];
        $data['bestSellers'][] = $product[5];
        $data['bestSellers'][] = $product[9];
        $data['bestSellers'][] = $product[1];
        $data['bestSellers'][] = $product[2];

        $data['categories'] = $this->categoryModel->all();

        // paging
        $definePage = 8;
        $numPage = $this->productModel->numProduct();

        $pages = ceil($numPage / $definePage);
        $data['pages'] = $pages; // so trang

        $currentPage = 1;
        if (isset($_GET['page'])) {
            $currentPage = $_GET['page'];
        }

        $index = ($currentPage - 1) * $definePage;
        $productOnlyPage = $this->productModel->paging($index, $definePage);
        $data['productOnlyPage'] = $productOnlyPage;

        $data['currentPage'] = $currentPage;

        $this->view("/home/index", $data);
    }
}
