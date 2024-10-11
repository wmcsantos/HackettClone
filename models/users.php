<?php

require_once("base.php");

class Users extends Base
{
    public function getUser($user_id)
    {
        $query = $this->db->prepare("
            SELECT 
                id, title, first_name, last_name, gender, email
            FROM 
                users
            WHERE id  = ?
        ");

        $query->execute([
            $user_id
        ]);

        return $query->fetch();
    }

    public function createUser($data)
    {
        $createdUser = $this->sanitizer($data);

        $query = $this->db->prepare("
            INSERT INTO users
            (title, first_name, last_name, gender, email, email_verified_at, password_hash, is_admin, remember_token)
            VALUES (?,?,?,?,?,?,?,?,?);
        ");

        $query->execute([
            $createdUser["customer-title"],
            $createdUser["customer-first-name"],
            $createdUser["customer-last-name"],
            $createdUser["customer-gender"],
            $createdUser["customer-email"],
            null,
            password_hash($createdUser["customer-password"], PASSWORD_DEFAULT),
            0,
            "remember-token"
        ]);

        $createdUser["id"] = $this->db->lastInsertId();
        unset($createdUser["customer_password"]);

        return $createdUser;
    }

    public function updateUser($data, $user_id)
    {
        $updatedUser = $this->sanitizer($data);

        $query = $this->db->prepare("
            UPDATE 
                users
            SET 
                title = ?, 
                first_name = ?, 
                last_name = ?, 
                gender = ?, 
                email = ?
            WHERE
                id = ?;
        ");

        $query->execute([
            $updatedUser["title"],
            $updatedUser["first_name"],
            $updatedUser["last_name"],
            $updatedUser["gender"],
            $updatedUser["email"],
            $user_id
        ]);

        return $updatedUser;

    }

    public function loginUser($data)
    {
        $query = $this->db->prepare("
            SELECT 
                id, first_name, email, password_hash
            FROM 
                users
            WHERE
                email = ?;
        ");

        $query->execute([
            $data["email"]
        ]);

        
        $user = $query->fetch();

        if ( !empty($user) && password_verify($data["password"], $user["password_hash"]) )
        {
            return $user;
        }

        return [];
    }
}