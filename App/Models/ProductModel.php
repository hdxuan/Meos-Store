<?php

use App\Core\Database;

class ProductModel extends Database
{

    function allCat()
    {
        // $sql = "SELECT * FROM products";
        $sql = "SELECT p.* 
        from products p JOIN products_type pt on p.id_products_type = pt.id
        WHERE pt.id_pet_products_type = 2";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
            // return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    function allDog()
    {
        // $sql = "SELECT * FROM products";
        $sql = "SELECT p.* 
        from products p JOIN products_type pt on p.id_products_type = pt.id
        WHERE pt.id_pet_products_type = 1";
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
}
