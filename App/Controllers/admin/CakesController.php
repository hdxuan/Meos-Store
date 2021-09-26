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



    function index()
    {
        // Show all cakes
        $cakes = $this->cakeModel->all();
        if (!$cakes) {
            $cakes = [];
        }
        $data['cakes'] =  $cakes;

        $categories = $this->categoryModel->all();
        $data['categories'] = $categories;

        $this->view("/admin/cakes/index", $data);
    }

    function create()
    {
        $categories = $this->categoryModel->all();
        $data['categories'] = $categories;

        $this->view("/admin/cakes/create", $data);
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

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_CAKE_IMAGES . DS . $newImageName);
                $data["image"] = $newImageName;
            }
        }

        $result = $this->cakeModel->store($data);
        if ($result) {
            header("Location: " . DOCUMENT_ROOT . "/admin/cakes"); // neu dung tro lai trang cakes
        } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang create"
            }
        }
    }

    function edit($id)
    {
        $cake = $this->cakeModel->getById($id);
        if (!$cake) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $categories = $this->categoryModel->all();
        $data['cake'] = $cake;
        $data['categories'] = $categories;


        $this->view("/admin/cakes/edit", $data);
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

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_CAKE_IMAGES . DS . $newImageName);
                $data["image"] = $newImageName;
            } else {
                $data["image"] = $_POST['image'];
            }
        }

        $result = $this->cakeModel->update($data);
        if ($result) {
            header("Location: " . DOCUMENT_ROOT . "/admin/cakes"); // neu dung tro lai trang cakes
        } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang edit"
            }
        }
    }

    function delete($id)
    {

        $this->cakeModel->delete($id);
        header("Location: " . DOCUMENT_ROOT . "/admin/cakes");
    }
}
