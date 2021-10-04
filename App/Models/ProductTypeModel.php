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

    function store($data)
    {
    }

    function update($data)
    {
    }
    function delete($data)
    {
    }
}
