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
        $products = $this->productModel->allDog();
        if (!$products) {
            $products = [];
        }
        $data['products'] =  $products;

        $categories = $this->productTypeModel->all();
        $data['categories'] = $categories;

        $this->view("/admin/product/index", $data);
    }
    function Cat()
    {
        // Show all cakes
        $products = $this->productModel->allCat();
        if (!$products) {
            $products = [];
        }
        $data['products'] =  $products;

        $categories = $this->productTypeModel->all();
        $data['categories'] = $categories;

        $this->view("/admin/product/cat", $data);
    }

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
        $data['description'] = $_POST['description'];
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
        $cake = $this->productModel->getById($id);
        if (!$cake) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $categories = $this->productTypeModel->all();
        $data['cake'] = $cake;
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
        $data['size'] = $_POST['size'];
        $data['price'] = $_POST['price'];
        $data['description'] = $_POST['description'];
        $data["image"];

        //handle image
        if (isset($_FILES["image"])) {
            if ($_FILES["image"]['name'] != "") {
                $randomNum = time();
                $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                $imageExt = substr($imageName, strrpos($imageName, '.'));
                $imageExt = str_replace('.', '', $imageExt);
                $newImageName = $randomNum . '.' . $imageExt;

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_IMAGES . DS . $newImageName);
                $data["image"] = $newImageName;
            } else {
                $data["image"] = $_POST['image'];
            }
        }

        $result = $this->productModel->update($data);
        if ($result) {
            header("Location: " . DOCUMENT_ROOT . "/admin/product"); // neu dung tro lai trang product
        } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang edit"
            }
        }
    }

    function delete($id)
    {

        $this->productModel->delete($id);
        header("Location: " . DOCUMENT_ROOT . "/admin/product");
    }
}
