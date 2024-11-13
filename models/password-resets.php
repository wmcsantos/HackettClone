<?php

require_once("base.php");

class PasswordResets extends Base
{
    public function saveToken($user_id, $token, $expiration)
    {
        $query = $this->db->prepare("
            INSERT INTO
                password_resets (user_id, token, createdAt, expiration) 
            VALUES 
                (?, ?, NOW(), ?);
        ");

        $query->execute([
            $user_id,
            $token,
            $expiration
        ]);
    }

    public function checkTokenValidity($token)
    {
        $query = $this->db->prepare("
            SELECT
                *
            FROM
                password_resets
            WHERE
                token = ? AND expiration > NOW();
        ");

        $query->execute([
            $token
        ]);

        return $query->fetch();
    }

    public function deleteUsedToken($user_id)
    {
        $query = $this->db->prepare("
            DELETE FROM
                password_resets
            WHERE
                user_id = ?;
        ");

        $query->execute([
            $user_id
        ]);
    }
}