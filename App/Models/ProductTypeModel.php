<?php

use App\Core\Database;

class ProductTypeModel extends Database
{
    function all()
    {
        $sql = 'SELECT * FROM products_type';
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    function allPetType()
    {
        $sql = 'SELECT * FROM pet_products_type';
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function allDog()
    {
        $sql = 'SELECT * FROM products_type where id_pet_products_type = 1';
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function allCat()
    {
        $sql = 'SELECT * FROM products_type where id_pet_products_type = 2';
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products_type WHERE id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function getByIdPetType()
    {
        $sql = 'SELECT * FROM pet_products_type';
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    // admin
    function store($data)
    {
        $name = $data['name'];
        $petTypeId = $data['petTypeId'];

        if (isset($data["image"])) {
            $image = $data["image"];
        }

        $stmt = $this->db->prepare("INSERT INTO products_type (name, id_pet_products_type , image) VALUES (?, ?, ?)");

        // var_dump($stmt);
        // die();
        if ($stmt) {
            $stmt->bind_param("sis", $name, $petTypeId, $image);
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
        $petTypeId = intval($data['petTypeId']);
        $id =  intval($data['id']);

        if (isset($data["image"])) {
            $image = $data["image"];
        }

        if (isset($image)) {
            $stmt = $this->db->prepare("UPDATE products_type SET name = ?, image = ?, id_pet_products_type = ? where id = ?");

            if ($stmt) {
                $stmt->bind_param("ssii", $name, $image, $petTypeId, $id);
                $stmt->execute();
                $result = $stmt->affected_rows;
                if ($result < 1) {
                    return false;
                } else {
                    return true;
                }
            }
            return false;
        } else {
            $stmt = $this->db->prepare("UPDATE products_type SET name = ?, id_pet_products_type = ? where id = ?");
            $stmt->bind_param("sii", $name, $petTypeId, $id);
            $stmt->execute();
            $result = $stmt->affected_rows;
            if ($result < 1) {
                return false;
            } else {
                return true;
            }
        }
    }
    function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM products_type WHERE id = ? ");
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
