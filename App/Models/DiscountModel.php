<?php

use App\Core\Database;

class DiscountModel extends Database
{
    function all()
    {

        $sql = "SELECT * from discounts";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
            // return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getDiscountById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM discounts WHERE id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    // thong ke
    function countDiscounts()
    {
        $sql = "SELECT COUNT(*) amount  FROM discounts ";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return  $result->fetch_assoc()['amount'];
        } else {
            return false;
        }
    }


    // admin
    function store($data)
    {
        $name = $data['nameDiscount'];
        $priceDiscount = $data['priceDiscount'];
        $code = substr(md5(time()), 0, 7);
        $start_time = $data['start_time'];
        $end_time =  $data['end_time'];

        // var_dump($code);
        // die();
        $stmt = $this->db->prepare("INSERT INTO discounts (name, code, discount, start_time, end_time) VALUES (?, ?, ?, ?, ?)");

        // var_dump($stmt);
        // die();
        if ($stmt) {
            $stmt->bind_param("ssiss", $name, $code, $priceDiscount, $start_time, $end_time);
            $stmt->execute();
            $result = $stmt->affected_rows;
            if ($result < 1) {
                return false;
            } else {
                return true;
            }
        }
    }

    function update($data)
    {
        $name = $data['nameDiscount'];
        $priceDiscount = $data['priceDiscount'];
        $start_time = $data['start_time'];
        $end_time =  $data['end_time'];

        $id =  intval($data['id']);


        $stmt = $this->db->prepare("UPDATE discounts SET name = ?, discount = ?, start_time = ?, end_time = ? where id = ?");
        $stmt->bind_param("sissi",  $name, $priceDiscount, $start_time, $end_time, $id);
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
        $stmt = $this->db->prepare("DELETE FROM discounts WHERE id = ? ");
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
}
