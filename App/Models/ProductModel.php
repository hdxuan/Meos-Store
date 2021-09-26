<?php

use App\Core\Database;

class ProductModel extends Database
{

    function all()
    {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getById($id)
    {
        $sttm = $this->db->prepare("SELECT * FROM cakes WHERE id = ?");
        $sttm->bind_param("i", $id);

        $sttm->execute();
        $result = $sttm->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function getByKeyword($keyword)
    {
        $keyword = '%' . $keyword . '%';
        $stmt = $this->db->prepare("SELECT * FROM CAKES WHERE name like ?");
        $stmt->bind_param("s", $keyword);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function numProduct()
    {
        $sql = "SELECT COUNT(*) AS numProduct FROM products";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $numProduct = mysqli_fetch_assoc($result);
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

    function detailCake($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM CAKES WHERE id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    function store($data)
    {
        $name = $data['name'];
        $categoryId = $data['categoryId'];
        $size = $data['size'];
        $price = $data['price'];
        $description = $data['description'];
        $image = $data["image"];

        $sttm = $this->db->prepare("INSERT INTO cakes (name, price, size, description,id_cake_type, image)  VALUES (?, ?, ?, ?, ?, ?)");
        $sttm->bind_param("siisis", $name, $price, $size, $description, $categoryId, $image);

        $sttm->execute();
        $result = $sttm->affected_rows;
        if ($result < 1) {
            return false;
        } else {
            return true;
        }
    }

    function update($data)
    {
        $name = $data['name'];
        $categoryId = $data['categoryId'];
        $size = $data['size'];
        $price = $data['price'];
        $description = $data['description'];
        $id =  $data['id'];
        $image = $data["image"];

        // var_dump($image);
        // die(); 
        if (isset($image)) {
            $sttm = $this->db->prepare("UPDATE cakes SET name = ?, 
                                                    price = ?,
                                                    size = ?,
                                                    id_cake_type = ?,
                                                    description = ?,
                                                    image = ?
                                                    where id = ?");
            $sttm->bind_param("siiissi", $name, $price, $size, $categoryId, $description, $image, $id);
            $sttm->execute();
            $result = $sttm->affected_rows;
            if ($result < 1) {
                return false;
            } else {
                return true;
            }
        } else {
            $sttm = $this->db->prepare("UPDATE cakes SET name = ?, 
                                                        price = ?,
                                                        size = ?,
                                                        id_cake_type = ?,
                                                        description = ?
                                                        where id = ?");
            $sttm->bind_param("siiisi", $name, $price, $size, $categoryId, $description, $id);
            $sttm->execute();
            $result = $sttm->affected_rows;
            if ($result < 1) {
                return false;
            } else {
                return true;
            }
        }
    }
    function delete($id)
    {
        $sttm = $this->db->prepare("DELETE FROM  cakes where id = ?");
        $sttm->bind_param("i", $id);
        $sttm->execute();
        // $result = $sttm->affected_rows;
        // if ($result < 1) {
        //     return false;
        // } else {
        //     return true;
        // }
    }
}
