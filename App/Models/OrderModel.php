<?php

use App\Core\Database;

class OrderModel extends Database
{
    function store($data = [])
    {
        $data['id_status'] = "CXL";
        $data['order_date'] = date("Y-m-d");

        $stmt = $this->db->prepare("INSERT INTO ORDERS ( order_date, id_user, id_status, address, phone) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss", $data["order_date"], $data["id_user"], $data["id_status"], $data['address'], $data["phone"]);

        $isSuccess = $stmt->execute();
        if (!$isSuccess) {
            return  $stmt->error;
        } else if ($stmt->affected_rows <= 0) {
            return "Thêm đơn hàng không thành công";
        }

        // lấy id order vừa mới thêm
        $id_order = $this->db->query("SELECT LAST_INSERT_ID()"); // lấy ra id cuối cùng vừa thêm vào

        if (!$id_order) {
            return $this->db->error;
        }
        $id_order = $id_order->fetch_row()[0];

        for ($i = 0; $i < count($data['id_product']); $i++) {
            $stmt = $this->db->prepare("INSERT INTO ORDER_DETAILS ( id_order, id_product, amount) VALUES (?, ?, ?)");

            if ($stmt) {
                $stmt->bind_param("iii", $id_order, $data["id_product"][$i], $data["amount"][$i]);
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
                    return "Thêm chi tiết đơn hàng không thành công";
                }
            } else {
                return $stmt;
            }
        }
        return true;
    }

    function update($data)
    {
    }
    function delete($data)
    {
    }
}
