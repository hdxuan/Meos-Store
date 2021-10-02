<?php

use App\Core\Database;

class ProductModel extends Database
{

    function all()
    {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            // return $result->fetch_all(MYSQLI_ASSOC);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function numProduct()
    {
        $sql = "SELECT COUNT(*) as numProduct FROM PRODUCTS";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $numProduct = mysqli_fetch_assoc($result);
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

    function getIdPet()
    {
        $sql = "SELECT name FROM products_type ";
    }
}
