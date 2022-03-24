<?php

use App\Core\Controller;

class ProfileController extends Controller
{
    private $userModel;
    private $orderModel;

    function __construct()
    {
        $this->userModel = $this->model('UserModel');
        $this->orderModel = $this->model('OrderModel');
    }

    function index()
    {


        $data['numOrderByUser'] = $this->orderModel->numOrderByUser($_SESSION['user']['id']);
        // $data['address'] = $this->userModel->getByAddress($_SESSION['user']['id']);
        // $_SESSION['user']['address'] = $data['address'];

        // echo "<pre>";
        // print_r($_SESSION['user']['address']);
        // echo "<pre>";
        // die();

        $this->view("/profile/index", $data);
    }

    function update()
    {
        if (isset($_POST)) {
            $result =  $this->userModel->editProfile($_POST, $_SESSION['user']['id']);
            $data['user'] = $this->userModel->getById($_SESSION['user']['id']);

            $_SESSION['user'] = $data['user'];
            $this->view("/profile/index", $data);
        } else {
            echo "Không thể chỉnh sửa";
        }
    }

    // function updateAddress()
    // {
    //     if (isset($_POST)) {
    //         $result =  $this->userModel->editAddress($_POST, $_SESSION['user']['id']);



    //         $_SESSION['address'] = $data['address'];
    //         $this->view("/profile/index", $data);
    //     } else {
    //         echo "Không thể chỉnh sửa";
    //     }
    // }

    function editAvatar()
    {
        if (isset($_FILES["profileImage"])) {
            if ($_FILES["profileImage"]['name'] != "") {
                $randomNum = time(); // time(): random them so phia truoc file de k bi trum file da ton tai vd :1634031033_16.png
                $imageName = str_replace(' ', '-', strtolower($_FILES["profileImage"]['name']));
                $imageExt = substr($imageName, strrpos($imageName, '.'));
                $imageExt = str_replace('.', '', $imageExt);
                $newImageName = $randomNum . '.' . $imageExt;

                $target = PUBLIC_DIR_IMAGES . DS . "uploads/avatar/" . $newImageName;

                move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target);
                $data["profileImage"] = $newImageName;

                if ($_POST['oldImage'] != "") {
                    unlink(PUBLIC_DIR_IMAGES . DS . "uploads/avatar" . DS . $_POST['oldImage']); // xoa hinh cu
                }
            }
        }
        $result = $this->userModel->editAvatar($data, $_SESSION['user']['id']);
        $_SESSION['user']['avatar'] = $data['profileImage'];

        header("Location: " . DOCUMENT_ROOT . "/profile");
    }
}
