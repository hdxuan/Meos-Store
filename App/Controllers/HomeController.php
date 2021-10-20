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
    }

    function Index()
    {
        $products = $this->productModel->all();
        if (!$products) {
            $products = [];
        }

        $data['products'] = $products;
        $data['bestSellers'][] = $products[0]; // mảng chạy từ 0
        $data['bestSellers'][] = $products[4];
        $data['bestSellers'][] = $products[8];
        $data['bestSellers'][] = $products[1];
        $data['bestSellers'][] = $products[33];
        $data['bestSellers'][] = $products[43];

        $data['categories'] = $this->productTypeModel->all();

        // paging
        $definePage = 8;
        $numProduct = $this->productModel->numProduct();

        $pages = ceil(($numProduct / 6) / $definePage);
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
