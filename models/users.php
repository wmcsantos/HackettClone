<?php

require_once("base.php");

class Users extends Base
{
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
}