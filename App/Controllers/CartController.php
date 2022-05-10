<?php

use App\Core\Controller;

class CartController extends Controller
{
    private $cartModel;
    private $orderModel;
    private $userModel;

    function __construct()
    {
        $this->cartModel = $this->model('CartModel');
        $this->orderModel = $this->model('OrderModel');
        $this->userModel = $this->model('UserModel');
    }
    function index()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $productInCart = $this->cartModel->getIdProductCart($_SESSION['user']['id']);
        if (!$productInCart) {
            $productInCart = [];
        }
        $data['productInCart'] = $productInCart;

        // echo "<pre>";
        // print_r($data['productInCart']);
        // die();
        $data['addresses'] = $this->userModel->getByAddress($_SESSION['user']['id']);

        if (isset($_GET['discountCode'])) {
            $data['discountCode'] = $this->cartModel->getDiscountCode($_GET['discountCode']);
            if ($data['discountCode'] == false) {
                $data['discountCode']['message'] = "Không tìm thấy mã giảm giá này";
            } else {
                $today = date("Y-m-d H:i:s");
                $startTime = date("Y-m-d H:i:s", strtotime($data['discountCode']['start_time']));
                $endTime = date("Y-m-d H:i:s", strtotime($data['discountCode']['end_time']));

                if ($today < $startTime) {
                    $data['discountCode']['message'] = "Chưa đến thời gian của chương trình khuyến mãi này";
                } else if ($today > $endTime) {
                    $data['discountCode']['message'] = "Chương trình khuyến mãi này đã kết thúc";
                } else {
                    $data['discountCode']['message'] = "";
                }
            }
        }

        $this->view("/cart/Cart", $data);
    }

    function addToCart()
    {
        // su dung ajac ne return ve 1 chuoi xem thanh cong k
        if (isset($_GET)) {
            $result = $this->cartModel->addToCart($_GET);
            echo json_encode($result);
        }
    }
    function amountInCart()
    {
        if (!isset($_SESSION['user'])) {
            $result = 0;
        } else {

            $result = $this->cartModel->amountInCart($_SESSION['user']['id']);
        }
        echo $result;
    }

    function removeCart()
    {
        $idProduct = $_GET['id'];
        $delProduct = $this->cartModel->deleteCart($_SESSION['user']['id'], $idProduct);
        header("Location: " . DOCUMENT_ROOT . DS . "Cart");
    }

    function checkout() // đặt hàng
    {
        $data['id_user'] = $_SESSION['user']['id'];
        $data['address'] = $_POST['address'];
        $data['phone'] = $_SESSION['user']['phone'];
        $data['discount'] = isset($_POST['discount']) ? $_POST['discount'] : 0;

        $productInCart = $this->cartModel->getIdProductCart($_SESSION['user']['id']);
        if (!$productInCart) {
            $productInCart = [];
        }

        $data['total'] = 0;
        foreach ($productInCart as $key => $product) {
            $id = $product['id'];
            $data['id_product'][] = $id;
            $data['amount'][] = intval($_POST["numOfProduct$id"]); //intval: lay so nguyen/ lấy số lượng từng sp theo id
            $data['price'][] = intval($_POST["price$id"]); // gia trong order k thay đôi
            $discountPrice = intval($_POST["price$id"]) * (1 - ($data['discount'] / 100));
            $data['total'] += $discountPrice;
        }

        $orderId = $this->orderModel->store($data);

        if (isset($_POST['paymentMethod']) &&  $_POST['paymentMethod'] == "VNPAY") {
            $phone = $data['phone'];
            $address = $data['address'];
            $email = $_SESSION['user']['email'];
            $fullname = $_SESSION['user']['name'];
            $total = $data['total'];
            header("Location:" . DOCUMENT_ROOT . "/vnpay_php/vnpay_create_payment.php?order_id=$orderId&amount=$total&phone=$phone&email=$email&fullname=$fullname&address=$address");
            return;
        }
        // echo "<pre>";
        // print_r($productInCart);
        // die();

        // print_r($data['id_product']);
        // die();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $productInCart = $this->cartModel->deleteCart($_SESSION['user']['id']);

        header("Location:" . DOCUMENT_ROOT . "/profile");
    }

    function deleteProduct()
    {
        $idOrder = $_GET['id'];
        $delOrder = $this->orderModel->deleteOrder($_SESSION['user']['id'], $idOrder);
        $_SESSION['flashMessage'] = "Hủy đơn hàng $idOrder thành công";
        header("Location: " . DOCUMENT_ROOT . DS . "Profile");
    }

    function updatePayment($orderId, $paymentCode)
    {
        $result = $this->orderModel->updatePayment($orderId, $paymentCode);
        echo $result;
    }
}
