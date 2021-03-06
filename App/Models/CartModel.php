<?php

use App\Core\Database;

class CartModel extends Database
{
    function addToCart($data)
    {
        if (!isset($data['idUser']) || !isset($data['idProduct'])) {
            return [
                'isSuccess' => false,
                'numInCart' => 0,
                'error' => "Empty user id or cake id"
            ];
        }
        $id_product = $data['idProduct'];
        $id_user = $data['idUser'];
        $amount = isset($data['amount']) ? $data['amount'] : 1;

        $checkProductInCart = $this->checkProductInCart($id_user, $id_product);
        $isSuccess = true;
        $error = "";
        if ($checkProductInCart > 0) { // co trong cart, them tiep vao cart
            $amount += $checkProductInCart; // neu co thi cong them vao sl sp
            $stmt = $this->db->prepare("UPDATE cart SET amount = ? where id_user = ? and id_product = ?");
            $stmt->bind_param("iii", $amount, $id_user, $id_product);

            $stmt->execute();
            if ($stmt->error) {
                $isSuccess = false;
                $error = $stmt->error;
            }
        } else {

            $stmt = $this->db->prepare("INSERT INTO cart (id_user, id_product, amount) values (?, ?, ?) ");
            $stmt->bind_param("iii", $id_user, $id_product, $amount);

            $stmt->execute();
            if ($stmt->error) {
                $isSuccess = false;
                $error = $stmt->error;
            }
        }

        return [ // return qua ajac
            "isSuccess" => $isSuccess,
            "error" => $error
        ];
    }

    function checkProductInCart($isUser, $idProduct)
    {
        $stmt = $this->db->prepare("SELECT * FROM cart where id_user = ? and id_product = ?");
        $stmt->bind_param("ii", $isUser, $idProduct);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc()['amount']; // co trong cart roi
        } else {
            return 0; // k ton tai = 0
        }
    }

    function amountInCart($idUser)
    {
        $stmt = $this->db->prepare("SELECT count(*) FROM cart where id_user = ?");
        $stmt->bind_param("i", $idUser);

        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_row()[0]; // tr??? v??? d???ng m???ng
        // fetch_row: tr??? v??? dl d???ng
        // arr(
        //     0 => gtr 1,
        //     1 => gtr 2,
        //     2 => gtr 3,
        // )

    }

    function deleteCart($isUser, $idProduct = "")
    {
        if ($idProduct !== "") {
            $stmt = $this->db->prepare("DELETE FROM cart WHERE id_user = ? AND id_product = ?"); // x??a 1 sp trong cart
            $stmt->bind_param("ii", $isUser, $idProduct);
        } else {
            $stmt = $this->db->prepare("DELETE FROM cart WHERE id_user = ?"); // xoa het khi dat hang xong
            $stmt->bind_param("i", $isUser);
        }

        $stmt->execute();

        $result =  $stmt->get_result();

        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }

    function getIdProductCart($iduser)
    {
        $stmt = $this->db->prepare("SELECT * FROM cart c JOIN products p ON c.id_product = p.id where id_user = ?");
        $stmt->bind_param("i", $iduser);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    // discount
    function getDiscountCode($discountCode)
    {
        $sql = "SELECT * FROM  discounts WHERE code='$discountCode'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC)[0];
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
