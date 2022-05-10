<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta taggs *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thanh toán thành công!</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/base.css" />
    <link href="<?= DOCUMENT_ROOT ?>/App/Views/vnpay_php/assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?= DOCUMENT_ROOT ?>/App/Views/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="<?= DOCUMENT_ROOT ?>/App/Views/vnpay_php/assets/jquery-1.11.3.min.js"></script>
</head>

<body>
    <?php
    require_once(VIEW . "/vnpay_php/config.php");
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }

    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    ?>
    <!--Begin display -->
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">Bạn đã thanh toán thành công!</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>

                <label><?php echo $_GET['vnp_TxnRef'] ?></label>
            </div>
            <div class="form-group">

                <label>Số tiền:</label>
                <label><?= number_format($_GET['vnp_Amount'] / 100, 0, " ", ".") ?>đ</label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label><?php echo $_GET['vnp_BankCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label><?= (new DateTime())->format('d/m/Y H:i:s')  ?></label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label class="text-success">
                    Giao dịch thành công
                </label>
            </div>
        </div>
        <a href="<?= DOCUMENT_ROOT . "/profile#order" ?>" class="btn btn--primary">Quay lại</a>
        <p>
            &nbsp;
        </p>
        <footer class="footer">
            <p>&copy; Meos Store <?php echo date('Y') ?></p>
        </footer>
        <script>
            const xhttp = new XMLHttpRequest();
            xhttp.open("GET", "<?= DOCUMENT_ROOT . "/cart/updatePayment/" . $_GET['vnp_TxnRef'] . "/" .  $_GET['vnp_TransactionNo'] ?>", true);
            xhttp.send();
        </script>

    </div>
</body>

</html>