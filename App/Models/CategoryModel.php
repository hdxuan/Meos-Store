<?php

use App\Core\Database;

class CategoryModel extends Database
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

    function showCategory($id)
    {

        $sttm = $this->db->prepare("SELECT *  FROM products_type WHERE id = ?");
        $sttm->bind_param("i", $id);

        $sttm->execute();

        $result =  $sttm->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function eachTypeCategory($id)
    {

        $sttm = $this->db->prepare("SELECT * FROM products WHERE id_products_type = ?");
        $sttm->bind_param("i", $id);

        $sttm->execute();

        $result =  $sttm->get_result();

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
