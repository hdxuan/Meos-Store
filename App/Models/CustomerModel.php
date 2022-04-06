<?php

use App\Core\Database;

class CustomerModel extends Database
{
    function all()
    {
        $sql = "SELECT *  FROM users u JOIN addresses ad on u.id = ad.id_user WHERE role = 1 ";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    function allStaff()
    {
        $sql = "SELECT *  FROM users u JOIN addresses ad on u.id = ad.id_user WHERE role = 0 ";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function numOfCustomer()
    {
        $sql = "SELECT count(*) as numCustomer  FROM users WHERE role = 1 ";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc()['numCustomer'];
        } else {
            return false;
        }
    }


    // Customer admin
    function store($data)
    {
    }

    function update($data)
    {
    }
    function delete($id)
    {

        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ? ");
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
