<?php

use App\Core\Database;

class ProductModel extends Database
{
    function all()
    {
        $sql = "SELECT * FROM products";
        $sql = "SELECT p.*, pt.name as namept
        from products p JOIN products_type pt on p.id_products_type = pt.id";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
            // return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function numProduct()
    {
        $sql = "SELECT COUNT(*) as numProduct FROM PRODUCTS";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            // $numProduct = mysqli_fetch_assoc($result);
            $numProduct = $result->fetch_assoc();
            // dl trả về có dạng
            // arr(
            //     'field1' => gtri 1,
            //     'field1' => gtri 1,
            //     'field1' => gtri 1,
            // )
        }
        return $numProduct['numProduct'];
    }

    function paging($limit, $num)
    {
        $sql = "SELECT * FROM products LIMIT $limit, $num";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    function getByProductType($productTypeId)
    {
        $stmt = $this->db->prepare("SELECT * FROM products where id_products_type = ?");
        $stmt->bind_param("i", $productTypeId);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function search($key)
    {
        $key = '%' . $key . '%';
        $stmt = $this->db->prepare("SELECT * FROM products where name like ?");
        $stmt->bind_param("s", $key);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function detail($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products where id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }


    // admin
    function store($data)
    {
        $name = $data['name'];
        $ingredients = $data['ingredients'];
        $benerfits = $data['benerfits'];
        $price = $data['price'];
        $categoryId = $data['categoryId'];

        if (isset($data["image"])) {
            $image = $data["image"];
        }


        $stmt = $this->db->prepare("INSERT INTO products (name, price, ingredients, benerfits, image, id_products_type) VALUES (?, ?, ?, ?, ?, ?)");

        // var_dump($stmt);
        // die();
        if ($stmt) {
            $stmt->bind_param("sisssi", $name, $price, $ingredients, $benerfits, $image, $categoryId);
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
        $ingredients = $data['ingredients'];
        $benerfits = $data['benerfits'];

        if (isset($data["image"])) {
            $image = $data["image"];
        }

        $price = intval($data['price']);
        $categoryId = intval($data['categoryId']);
        $id =  intval($data['id']);

        if (isset($image)) {
            $stmt = $this->db->prepare("UPDATE products SET name = ?, 
                                                    ingredients = ?,
                                                    benerfits = ?,
                                                    image = ?,
                                                    id_products_type = ?,
                                                    price = ?
                                                    where id = ?");

            if ($stmt) {
                $stmt->bind_param("ssssiii", $name, $ingredients, $benerfits, $image, $categoryId, $price, $id);
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
            $stmt = $this->db->prepare("UPDATE products SET name = ?, 
                                                            price = ?,
                                                            ingredients = ?,
                                                            benerfits = ?,
                                                            id_products_type = ?
                                                            where id = ?");
            $stmt->bind_param("sissii", $name, $price,  $ingredients, $benerfits, $categoryId, $id);
            $stmt->execute();
            $result = $stmt->affected_rows;
            if ($result < 1) {
                return false;
            } else {
                return true;
            }
        }
    }
    function delete($data)
    {
    }
}
