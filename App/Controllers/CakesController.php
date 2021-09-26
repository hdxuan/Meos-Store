<?php

use App\Core\Controller;

class CakesController extends Controller
{
    private $cakeModel;
    private $categoryModel;
    function __construct()
    {
        $this->cakeModel = $this->model('CakeModel');
        $this->categoryModel = $this->model('CategoryModel');
    }

    function searchKey()
    {
        $search = $_GET["keyword"];
        $cakes = $this->cakeModel->getByKeyword($search);

        $data['search'] = $search;
        $data['cakes'] = $cakes;

        //paging chua on lam

        // $limit = 4;
        // $numPage = $this->cakeModel->numCake();

        // $pages = ceil($numPage / $limit);
        // $data['pages'] = $pages;

        // $currentPage = 1;
        // if (isset($_GET['page'])) {
        //     if ($_GET['page'] > 0) {
        //         $currentPage = $_GET['page'];
        //     }
        //     if ($_GET['page'] > $pages) {
        //         $currentPage = $pages;
        //     }
        // }

        // $index = ($currentPage - 1) * $limit;
        // $paging = $this->cakeModel->paging($index, $limit);
        // $data['paging'] = $paging;
        // $data['currentPage'] = $currentPage;

        $this->view("/cakes/search", $data);
    }

    function index()
    {
        // Show all cakes
        $cakes = $this->cakeModel->all();
        if (!$cakes) {
            $cakes = [];
        }
        $data['cakes'] =  $cakes;

        // paging
        $limit = 8;
        $numPage = $this->cakeModel->numCake();

        $pages = ceil($numPage / $limit);
        $data['pages'] = $pages;

        $currentPage = 1;
        if (isset($_GET['page'])) {
            if ($_GET['page'] > 0) {
                $currentPage = $_GET['page'];
            }
            if ($_GET['page'] > $pages) {
                $currentPage = $pages;
            }
        }

        $index = ($currentPage - 1) * $limit;
        $paging = $this->cakeModel->paging($index, $limit);
        $data['paging'] = $paging;
        $data['currentPage'] = $currentPage;



        $this->view("/cakes/index", $data);
    }

    function Category()
    {
        $id = $_GET['id'];

        $detail = $this->categoryModel->showCategory($id);
        $data['detail'] = $detail;

        $categories = $this->categoryModel->all();
        $data['categories'] = $categories;

        $caketype = $this->categoryModel->eachTypeCategory($id);
        $data['caketype'] = $caketype;

        $this->view("/cakes/Categories", $data);
    }

    function Detail()
    {
        if (isset($_GET)) {
            $detail = $this->cakeModel->detailCake($_GET['id']);
            $data['detail'] = $detail;

            $this->view("/cakes/Detail", $data);
        } else {
            return " khong co banh";
        }
    }
}
