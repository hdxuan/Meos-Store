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
                return "Password Incorrect!";
            }
        } else {
            return "Don't exists your email ";
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
        $stmt = $this->db->prepare("SELECT id, name, phone,address, email, avatar FROM users WHERE email = ?");
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
        $stmt = $this->db->prepare("SELECT id, name, phone,address, email, avatar FROM users WHERE id = ?");
        $stmt->bind_param("s", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function editProfile($data, $id)
    {

        $stmt = $this->db->prepare("UPDATE USERS SET name = ?, phone = ?, address = ?, email = ?  WHERE id = ?");
        $stmt->bind_param("ssssi", $data['name'], $data['phone'], $data['address'], $data['email'], $id);

        $stmt->execute();


        $result = $stmt->affected_rows;
        if ($result < 1) {
            return false;
        } else {
            return true;
        }
    }

    function editAvatar($data, $iduser)
    {
        $stmt = $this->db->prepare("UPDATE USERS SET avatar = ?  WHERE id = ?");
        $stmt->bind_param("si", $data['avatar'], $iduser);

        $stmt->execute();

        $result = $stmt->affected_rows;
        if ($result < 1) {
            return false;
        } else {
            return true;
        }
    }
}
