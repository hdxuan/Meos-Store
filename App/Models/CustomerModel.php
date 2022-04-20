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

    function addAdressAdmin($data, $id)
    {
        $address = $data['address'];

        $stmt = $this->db->prepare("INSERT INTO addresses (address, id_user) VALUES (?, ?)");

        $stmt->bind_param("si", $address, $id);
        $stmt->execute();
        $result = $stmt->affected_rows;
        if ($result < 1) {
            return false;
        } else {
            return true;
        }
    }
    function getAdminByID()
    {
        $sql = "SELECT * FROM users WHERE role = 0 ORDER BY id DESC LIMIT 1  ";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc()['id'];
        } else {
            return false;
        }
    }

    // Customer admin
    function store($data)
    {
        $name = $data['name'];
        // $address = $data['address'];
        $phone = $data['phone'];
        $email = $data['email'];
        $passwd = $data['passwd'];
        $role = 0;

        $stmt = $this->db->prepare("INSERT INTO users (name, phone, password, email, role) VALUES (?, ?, ?, ?, ?)");
        // var_dump($stmt);
        // die();
        if ($stmt) {
            $stmt->bind_param("ssssi", $name, $phone, $passwd, $email, $role);
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
