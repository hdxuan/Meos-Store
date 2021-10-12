<?php

use App\Core\Controller;

class ProfileController extends Controller
{
    private $userModel;

    function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }

    function index()
    {

        $this->view("/profile/Profile");
    }

    function update()
    {

        if (isset($_POST)) {
            $result =  $this->userModel->editProfile($_POST, $_SESSION['user']['id']);
            $data['user'] = $this->userModel->getById($_SESSION['user']['id']);

            $_SESSION['user'] = $data['user'];


            $this->view("/profile/Profile", $data);
        } else {
            echo "k the chinh sua";
        }
    }

    function editAvatar()
    {
        if (isset($_POST)) {
            $data = $_POST;
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

                    $result = $this->userModel->editAvatar($data, $_SESSION['user']['id']);
                }
            }
        }
    }
}
