<?php

use App\Core\Database;

class CustomerModel extends Database
{
    function all()
    {
        $sql = "SELECT *  FROM users WHERE role = 1 ";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function checkAdminnn($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $stmt = $this->db->prepare("SELECT *  FROM users WHERE email = ?");

        $stmt->bind_param("s", $email);
        $stmt->execute();
        // $result = $stmt->affected_rows;
        $result = $stmt->get_result();

        // die(var_dump($result));
        if ($result->num_rows > 0) {
            // echo "bbbbbbbbb";
            // die();
            $passwd = $result->fetch_assoc()['password'];
            $passwdHash = password_verify($password, $passwd);
            if ($passwdHash == true) {
                return true;
            } else {
                return "Sai mật khẩu!";
            }
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
