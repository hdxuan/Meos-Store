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
        $sql = "SELECT name,  u.id as iduser, phone, email, password, avatar, ad.id as idAddress, address, id_user
          FROM users u JOIN addresses ad on u.id = ad.id_user WHERE role = 0 ";
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
    function getLastAdminByID()
    {
        $sql = "SELECT * FROM users WHERE role = 0 ORDER BY id DESC LIMIT 1  ";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc()['id'];
        } else {
            return false;
        }
    }

    function getIdAdmin($id)
    {
        $stmt = $this->db->prepare("SELECT name,  u.id as iduser, phone, email, password, avatar, ad.id as idAddress, address, id_user
                                    FROM users u JOIN addresses ad on u.id = ad.id_user
                                    where u.id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
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
        $passwd = password_hash($data['passwd'], PASSWORD_DEFAULT);
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
        $name = $data['name'];
        // $address = $data['address'];
        $phone = $data['phone'];
        $email = $data['email'];
        $idAdmin = $data['idAdmin'];

        $stmt = $this->db->prepare("UPDATE users SET name = ?,phone = ?,email = ? where id = ?");

        $stmt->bind_param("sssi", $name, $phone, $email, $idAdmin);
        $stmt->execute();
        $result = $stmt->affected_rows;
        if ($result < 1) {
            return false;
        } else {
            return true;
        }
    }

    function updateAdressAdmin($data)
    {
        $address = $data['address'];
        $idAdmin = $data['idAdmin'];

        $stmt = $this->db->prepare("UPDATE addresses SET address = ? where id_user = ?");

        $stmt->bind_param("si", $address, $idAdmin);
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
