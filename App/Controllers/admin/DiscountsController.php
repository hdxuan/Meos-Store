<?php

use App\Core\Controller;

class DiscountsController extends Controller
{

    private $discountModel;
    function __construct()
    {

        $this->discountModel = $this->model('DiscountModel');
    }

    function index()
    {
        $discounts = $this->discountModel->all();
        $data['discounts'] =  $discounts;

        $this->view("/admin/discount/index", $data);
    }

    function create()
    {
        $this->view("/admin/discount/create");
    }

    function store()
    {
        if (!isset($_POST)) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $data = $_POST;
        // die(print_r($data));


        $data['nameDiscount'] = $_POST['nameDiscount'];
        $data['priceDiscount'] = intval($_POST['priceDiscount']);
        $data['start_time'] = $_POST['start_time'];
        $data['end_time'] = $_POST['end_time'];


        $result = $this->discountModel->store($data);
        // die(print_r($result));
        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Thêm khuyến mãi thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang create"
            return;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/discounts"); // neu dung tro lai trang product
    }

    function edit($id)
    {
        $discounts = $this->discountModel->getDiscountById($id);
        if (!$discounts) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $data['discounts'] = $discounts;
        // echo "<pre>";
        // print_r($data['discount']);
        // die();

        $this->view("/admin/discount/edit", $data);
    }

    function update($id)
    {
        if (!isset($_POST)) {
            header("Location: " . DOCUMENT_ROOT . "/admin");
        }
        $data = $_POST;
        $data['id'] = $id;
        $data['nameDiscount'] = $_POST['nameDiscount'];
        $data['priceDiscount'] = $_POST['priceDiscount'];
        $data['start_time'] = $_POST['start_time'];
        $data['end_time'] = $_POST['end_time'];

        // echo "<pre>";
        // print_r($data);
        // die();

        $result = $this->discountModel->update($data);
        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Cập nhật khuyến mãi thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = "Cập nhật khuyến mãi thất bại";
        }
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no "la trang edit"
            return;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/discounts"); // neu dung tro lai trang product
    }

    function delete($id)
    {
        $result = $this->discountModel->delete($id);
        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Xóa khuyến mãi thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = "Xóa khuyến mãi thất bại";
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/discounts");
    }
}
