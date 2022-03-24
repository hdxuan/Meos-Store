<?php

use App\Core\Controller;

class CategoriesController extends Controller
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
        $categories = $this->productTypeModel->all();
        $data['categories'] = $categories;
        // die(print_r($data['categories']));

        $this->view("/admin/category/index", $data);
    }

    function create()
    {
        $categories = $this->productTypeModel->all();
        $data['categories'] = $categories;
        $petType = $this->productTypeModel->allPetType();
        $data['petType'] = $petType;
        // die(print_r($data["petType"]));



        $this->view("/admin/category/create", $data);
    }

    function store()
    {
        if (!isset($_POST)) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $data = $_POST;

        $data['name'] = $_POST['name'];
        $data['petTypeId'] = intval($_POST['petTypeId']);
        // die(print_r($data));

        // handle image
        if (isset($_FILES["image"])) {
            if ($_FILES["image"]['name'] != "") {
                $randomNum = time();
                $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                $imageExt = substr($imageName, strrpos($imageName, '.'));
                $imageExt = str_replace('.', '', $imageExt);
                $newImageName = $randomNum . '.' . $imageExt;

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_IMAGES . DS . "menu" . DS . $newImageName);
                $data["image"] = $newImageName;
            }
        }
        // die(print_r($data));

        $result = $this->productTypeModel->store($data);
        // die(print_r($result));
        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Thêm loại sản phẩm thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang create"
            return;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/categories"); // neu dung tro lai trang product
    }

    function edit($id)
    {
        $category = $this->productTypeModel->getById($id);
        if (!$category) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $data['category'] = $category;

        $data['petType'] = $this->productTypeModel->getByIdPetType($id);
        // print_r($data['category']);
        // die();
        $this->view("/admin/category/edit", $data);
    }

    function update($id)
    {
        if (!isset($_POST)) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $data = $_POST;
        $data['id'] = $id;
        $data['name'] = $_POST['name'];
        $data['petTypeId'] = $_POST['petTypeId'];


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

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_IMAGES . DS . "menu" . DS . $newImageName);
                $data["image"] = $newImageName;

                if ($_POST['oldImage'] != "") {
                    unlink(PUBLIC_DIR_IMAGES . DS . "menu" . DS . $_POST['oldImage']);
                }
            }
        }

        $result = $this->productTypeModel->update($data);
        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Cập nhật loại sản thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang edit"
            return;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/categories"); // neu dung tro lai trang product
    }

    function delete($id)
    {
        $result = $this->productTypeModel->delete($id);
        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Xóa loại sản phẩm thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/categories");
    }
}
