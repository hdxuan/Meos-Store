<?php

use App\Core\Database;

class OrderModel extends Database
{
    function all()
    {
        $sql = "SELECT o.id, o.id_user, o.address, o.discount_percent, o.payment_code, u.name as customerName, u.phone, u.email,  o.order_date, o.delivery_date,
        s.name as status, id_status
        from orders o JOIN users u on o.id_user = u.id
                                    JOIN status s on s.id = o.id_status
        order by o.id desc";

        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            $orderList =  $result->fetch_all(MYSQLI_ASSOC);
            // return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
        foreach ($orderList as $key => $order) {
            $idOrder = $order['id'];
            $total = $this->getTotalById($idOrder);
            $orderList[$key]['total'] = $total;
        }
        return $orderList;
    }

    function getTotalById($id)
    {
        $stmt = $this->db->prepare("SELECT amount, price_product
        from orders o JOIN order_details od on o.id = od.id_order WHERE id_order = ?");

        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $amountList =  $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
        // var_dump($amountList);
        // die();
        $total = 0;
        foreach ($amountList as $key => $amount) {
            $total += $amount['amount'] * $amount['price_product'];
        }
        return $total;
    }

    function getIdOrder($id)
    {

        $result = "";
        $allOrder = $this->all();
        foreach ($allOrder as $key => $order) {
            if ($id == $order['id']) {
                $result = $order;
            }
        }
        return $result;
    }

    function getIdStatus()
    {
        $sql = "SELECT * FROM status";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
            // return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    function getNumProduct($id)
    {
        $stmt = $this->db->prepare("SELECT od.id_product, od.amount, od.price_product, p.name , p.image
        from order_details od join products p on p.id = od.id_product where od.id_order = ?");

        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    // thong ke
    function numOfOrders()
    {
        $sql = "SELECT COUNT(id_status) amount , id_status, name 
                FROM orders o JOIN status s on o.id_status = s.id
                GROUP BY id_status";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return  $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    // thong ke
    function countOrders()
    {
        $sql = "SELECT COUNT(*) amount  FROM orders ";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return  $result->fetch_assoc()['amount'];
        } else {
            return false;
        }
    }

    // profile 
    function numOrderByUser($id)
    {
        $stmt = $this->db->prepare("SELECT o.id, o.order_date, o.delivery_date, s.name as status, id_status, discount_percent, payment_code 
        from orders o JOIN users u on o.id_user = u.id
        JOIN status s on s.id = o.id_status where id_user = ? ORDER BY o.id DESC");

        $stmt->bind_param("i", intval($id));

        $stmt->execute();
        $result = $stmt->get_result();
        // var_dump($id);
        // die();
        if ($result->num_rows > 0) {
            $orderList =  $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
        foreach ($orderList as $key => $order) {
            $idOrder = $order['id'];
            $total = $this->getTotalById($idOrder);
            $orderList[$key]['total'] = $total;
            $listOrderDetail = $this->getOrderDetail($idOrder);
            $orderList[$key]['products'] = $listOrderDetail;
        }
        // echo '<pre>';
        // print_r($orderList);
        // die();
        return $orderList;
    }

    // // profile
    function getOrderDetail($id)
    {
        $stmt = $this->db->prepare("SELECT od.id_product, od.amount, od.price_product, p.name , p.image
                from order_details od join products p on p.id = od.id_product where od.id_order = ?");

        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $listOrderDetail =   $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
        return $listOrderDetail;
    }


    function store($data = [])
    {
        $data['id_status'] = "CXL";
        $data['order_date'] = date("Y-m-d");

        // die(var_dump($data));

        $stmt = $this->db->prepare("INSERT INTO ORDERS ( order_date, id_user, id_status, address, phone, discount_percent) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sisssi", $data["order_date"], $data["id_user"], $data["id_status"], $data['address'], $data["phone"], $data["discount"]);

        $isSuccess = $stmt->execute();
        if (!$isSuccess) {
            return  $stmt->error;
        } else if ($stmt->affected_rows <= 0) {
            return "Th??m ????n h??ng kh??ng th??nh c??ng";
        }

        // l???y id order v???a m???i th??m
        $id_order = $this->db->query("SELECT LAST_INSERT_ID()"); // l???y ra id cu???i c??ng v???a th??m v??o

        if (!$id_order) {
            return $this->db->error;
        }
        $id_order = $id_order->fetch_row()[0];

        for ($i = 0; $i < count($data['id_product']); $i++) {
            $stmt = $this->db->prepare("INSERT INTO ORDER_DETAILS ( id_order, id_product, amount, price_product) VALUES (?, ?, ?, ?)");

            if ($stmt) {
                $stmt->bind_param("iiis", $id_order, $data["id_product"][$i], $data["amount"][$i], $data['price'][$i]);
                $isSuccess = $stmt->execute();

                if (!$isSuccess) {
                    $deleteStmt = $this->db->prepare("DELETE FROM ORDERS WHERE id = ?");
                    $deleteStmt->bind_param("i", $id_order);

                    $isDeleteSuccess = $deleteStmt->execute();

                    if (!$isDeleteSuccess) {
                        return  $deleteStmt->error;
                    }
                    return $stmt->error;
                } else if ($stmt->affected_rows <= 0) {
                    return "Th??m chi ti???t ????n h??ng kh??ng th??nh c??ng";
                }
            } else {
                return $stmt;
            }
        }
        return $id_order;
    }

    function update($data = [])
    {
        // die(var_dump($data['idOrder']));

        $stmt = $this->db->prepare("UPDATE orders SET delivery_date = ?, id_status = ? where id = ?");
        $stmt->bind_param("ssi", $data["delivery_date"], $data["idstatus"], $data["idOrder"]);
        $stmt->execute();
        $result = $stmt->affected_rows;
        if ($result < 1) {
            return false;
        } else {
            return true;
        }
    }
    function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM orders WHERE id = ? ");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->affected_rows;
            if ($result < 1) {
                return false;
            } else {
                return true;
            }
        }
        return false;
    }

    function deleteOrder($idUser, $idOrder = "")
    {

        $stmt = $this->db->prepare("DELETE FROM ORDERS WHERE id_user = ? AND id = ?"); // x??a 1 sp trong ORDERS
        $stmt->bind_param("ii", $idUser, $idOrder);


        $stmt->execute();

        $result =  $stmt->get_result();

        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }

    function updatePayment($orderId, $paymentCode = "")
    {
        $stmt = $this->db->prepare("UPDATE ORDERS SET payment_code = ? WHERE id = ?");
        $stmt->bind_param("ii", $paymentCode, $orderId);


        $stmt->execute();

        $result =  $stmt->get_result();

        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
