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



    function index()
    {
        // Show all cakes
        $products = $this->productModel->all();
        if (!$products) {
            $products = [];
        }
        $data['products'] =  $products;

        $categories = $this->productTypeModel->all();
        $data['categories'] = $categories;
        // die(print_r($data['categories']));

        $this->view("/admin/product/index", $data);
    }
    // function Cat()
    // {
    //     // Show all cakes
    //     $products = $this->productModel->allCat();
    //     if (!$products) {
    //         $products = [];
    //     }
    //     $data['products'] =  $products;

    //     $categories = $this->productTypeModel->all();
    //     $data['categories'] = $categories;

    //     $this->view("/admin/product/cat", $data);
    // }

    function create()
    {
        $categories = $this->productTypeModel->all();
        $data['categories'] = $categories;

        $this->view("/admin/product/create", $data);
    }

    function store()
    {
        if (!isset($_POST)) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $data = $_POST;

        $data['name'] = $_POST['name'];
        $data['categoryId'] = $_POST['categoryId'];
        $data['size'] = $_POST['size'];
        $data['price'] = $_POST['price'];
        $data['ingredients'] = $_POST['ingredients'];
        $data["image"] = "";

        // handle image
        if (isset($_FILES["image"])) {
            if ($_FILES["image"]['name'] != "") {
                $randomNum = time();
                $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                $imageExt = substr($imageName, strrpos($imageName, '.'));
                $imageExt = str_replace('.', '', $imageExt);
                $newImageName = $randomNum . '.' . $imageExt;

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_IMAGES . DS . $newImageName);
                $data["image"] = $newImageName;
            }
        }

        $result = $this->productModel->store($data);
        if ($result) {
            header("Location: " . DOCUMENT_ROOT . "/admin/product"); // neu dung tro lai trang product
        } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang create"
            }
        }
    }

    function edit($id)
    {
        $product = $this->productModel->getById($id);
        if (!$product) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $categories = $this->productTypeModel->all();
        $data['product'] = $product;
        $data['categories'] = $categories;


        $this->view("/admin/product/edit", $data);
    }

    function update($id)
    {
        if (!isset($_POST)) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $data = $_POST;
        $data['id'] = $id;
        $data['name'] = $_POST['name'];
        $data['categoryId'] = $_POST['categoryId'];
        $data['price'] = $_POST['price'];
        $data['ingredients'] = $_POST['ingredients'];
        $data['benerfits'] = $_POST['benerfits'];

        // echo "<pre>";
        // print_r($_POST);
        // die();

        //handle image
        if (isset($_FILES["image"])) {
            if ($_FILES["image"]['name'] != "") {
                $randomNum = time();
                $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                $imageExt = substr($imageName, strrpos($imageName, '.'));
                $imageExt = str_replace('.', '', $imageExt);
                $newImageName = $randomNum . '.' . $imageExt;

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_IMAGES . DS . "products" . DS . $newImageName);
                $data["image"] = $newImageName;

                if ($_POST['oldImage'] != "") {
                    unlink(PUBLIC_DIR_IMAGES . DS . "products" . DS . $_POST['oldImage']);
                }
            }
        }

        $this->productModel->update($data);

        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang edit"
            return;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/products"); // neu dung tro lai trang product
    }

    function delete($id)
    {

        $this->productModel->delete($id);
        header("Location: " . DOCUMENT_ROOT . "/admin/products");
    }
}
