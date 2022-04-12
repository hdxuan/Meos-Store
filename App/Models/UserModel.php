<?php

use App\Core\Database;

class UserModel extends Database
{
    function authenticate($data) // xac thuc
    {
        $email = $data['your_email'];
        $password = $data['password'];

        $stmt = $this->db->prepare("SELECT * FROM USERS WHERE email = ?");
        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $passwdHash = $result->fetch_assoc()['password'];

            $validPassword = password_verify($password,  $passwdHash);

            if ($validPassword === true) {
                return true;
            } else {
                return "Sai mật khẩu!";
            }
        } else {
            return "Email không tồn tại ";
        }
    }

    function register($data)
    {
        $name = $data['username'];
        $email = $data['your_email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $role = 1;

        $stmt = $this->db->prepare("INSERT INTO USERS (name, email, password, role)  VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $email, $password, $role);

        $stmt->execute();

        $result = $stmt->affected_rows; // giong num_row, tra ve so dong
        if ($result < 1) {
            return false;
        } else {
            return true;
        }
    }

    function getByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT id, name, phone, email, avatar FROM users WHERE email = ? and role = 1");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    function getByEmailAdmin($email)
    {
        $stmt = $this->db->prepare("SELECT id, name, phone, email, avatar FROM users WHERE email = ? and role = 0");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    function getById($id)
    {
        $stmt = $this->db->prepare("SELECT id, name, phone, email, avatar FROM users WHERE id = ?");
        $stmt->bind_param("s", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function getByAddress($id)
    {
        $stmt = $this->db->prepare("SELECT * from addresses WHERE id_user = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function editProfile($data, $id)
    {

        $stmt = $this->db->prepare("UPDATE USERS SET name = ?, phone = ?, email = ?  WHERE id = ?");
        $stmt->bind_param("sssi", $data['name'], substr(strval($data['phone']), 0, 10), $data['email'], $id);

        $stmt->execute();


        $result = $stmt->affected_rows;
        if ($result < 1) {
            return false;
        } else {
            return true;
        }
    }

    function editAvatar($data = [], $iduser)
    {
        $stmt = $this->db->prepare("UPDATE USERS SET avatar = ?  WHERE id = ?");
        $stmt->bind_param("si", $data['profileImage'], $iduser);

        $stmt->execute();

        $result = $stmt->affected_rows;
        if ($result < 1) {
            return false;
        } else {
            return true;
        }
    }

    function deleteAddress($iduser)
    {
        $stmt = $this->db->prepare("DELETE FROM addresses WHERE id_user = ?");
        $stmt->bind_param("i", $iduser);

        $stmt->execute();

        $result = $stmt->affected_rows;
        if ($result < 1) {
            return false;
        } else {
            return true;
        }
    }

    function updateAddress($data, $iduser)
    {
        if (count($data) < 1) {
            return false;
        }
        $this->deleteAddress($iduser);

        foreach ($data as $address) {
            if ($address != "") {
                $stmt = $this->db->prepare("INSERT INTO addresses(address, id_user) values(?, ?)");
                $stmt->bind_param("si", $address, $iduser);
                $stmt->execute();
            }
        }

        $result = $stmt->affected_rows;
        if ($result < 1) {
            return false;
        } else {
            $addresses = $this->getByAddress($iduser);
            return $addresses;
        }
    }


    function checkAdmin($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $stmt = $this->db->prepare("SELECT *  FROM users WHERE email = ? and role = 0");

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $passwdHash = $result->fetch_assoc()['password'];
            $validPassword = password_verify($password, $passwdHash);
            // die(var_dump($validPassword));
            if ($validPassword == true) {
                return true;
            } else {
                return "Sai mật khẩu!";
            }
        } else {
            return "Không tồn tại email này";
        }
    }

    // Customer admin
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
    function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ? ");
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
