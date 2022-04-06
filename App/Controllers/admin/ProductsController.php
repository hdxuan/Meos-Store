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
        $data['ingredients'] = $_POST['ingredients'];
        $data['benerfits'] = $_POST['benerfits'];
        $data['quantity'] = $_POST['quantity'];

        // $data["image"] = "";
        $data['price'] = intval($_POST['price']);
        $data['categoryId'] = intval($_POST['categoryId']);
        // die(print_r($data["image"]));

        // handle image
        if (isset($_FILES["image"])) {
            if ($_FILES["image"]['name'] != "") {
                $randomNum = time();
                $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                $imageExt = substr($imageName, strrpos($imageName, '.'));
                $imageExt = str_replace('.', '', $imageExt);
                $newImageName = $randomNum . '.' . $imageExt;

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_IMAGES . DS . "products" . DS . $newImageName);
                $data["image"] = $newImageName;
            }
        }
        // die(print_r($data));

        $result = $this->productModel->store($data);
        // die(print_r($result));
        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Thêm sản phẩmthành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang create"
            return;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/products"); // neu dung tro lai trang product
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
        $data['quantity'] = $_POST['quantity'];
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

        $result = $this->productModel->update($data);
        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Cập nhật đơn hàng thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang edit"
            return;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/products"); // neu dung tro lai trang product
    }

    function delete($id)
    {
        $result = $this->productModel->delete($id);
        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Xóa sản phẩm thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/products");
    }
}
