<?php

use App\Core\Controller;

class OrdersController extends Controller
{
    private $orderModel;
    // private $productTypeModel;
    function __construct()
    {
        $this->orderModel = $this->model('orderModel');
        // $this->productTypeModel = $this->model('ProductTypeModel');
    }



    function index()
    {
        $data['orders'] = $this->orderModel->all();

        $this->view("/admin/order/index", $data);
    }

    function total($id)
    {
    }


    function create()
    {
    }

    function store()
    {
    }

    function edit($id)
    {
        $data["editOrder"] = $this->orderModel->getIdOrder($id);
        //die(var_dump($data["editOrder"]));
        $data["idStatus"] = $this->orderModel->getIdStatus();

        $data["numProductInOrderDetail"] = $this->orderModel->getNumProduct($id);


        // die(var_dump($data["numProductInOrderDetail"]));

        $this->view("/admin/order/edit", $data);
    }

    function update($id)
    {
        if (isset($_POST)) {
            $data["idOrder"] = $_POST['idOrder'];
            $data["delivery_date"] = $_POST['delivery_date'];
            $data["idstatus"] = $_POST['idstatus'];
        } else {
            header("Location: " . DOCUMENT_ROOT . "/admin/order/");
        }
        // var_dump($data);
        $result = $this->orderModel->update($data);
        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Cập nhật đơn hàng thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        // die(var_dump($result));
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]); // neu sai quay lai trang truoc do cua no 
            return;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/orders"); // neu dung tro lai trang order
    }

    function delete($id)
    {
        $result = $this->orderModel->delete($id);
        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Xóa đơn hàng thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/orders");
    }
}
