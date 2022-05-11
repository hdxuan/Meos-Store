<?php

use App\Core\Database;

class CommentModel extends Database
{
    function all()
    {
        $sql = 'SELECT p.name as nameProduct, u.name as nameUser, c.id, c.id_user, c.id_product, 
                       c.content, c.rank, c.created_at
                FROM comments c join users u on c.id_user = u.id
                                join products p on c.id_product = p.id ';
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    // thong ke
    function countComment()
    {
        $sql = "SELECT COUNT(*) amount  FROM comments ";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return  $result->fetch_assoc()['amount'];
        } else {
            return false;
        }
    }

    // Customer admin
    function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM comments WHERE id = ? ");
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
