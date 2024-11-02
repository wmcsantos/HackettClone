<?php

require_once("base.php");

class Orders extends Base
{
    public function getOrdersByUser($user_id)
    {
        $query = $this->db->prepare("
            SELECT
                id, order_status, order_date, total_amount
            FROM
                orders
            WHERE
                user_id = ?;
        ");

        $query->execute([
            $user_id
        ]);

        return $query->fetchAll();
    }

    public function createOrder($user_id, $order_status, $total_amount, $shipping_address)
    {
        $query = $this->db->prepare("
            INSERT INTO
                orders (user_id, order_status, total_amount, shipping_address)
            VALUES
                (?, ?, ?, ?);
        ");

        $query->execute([
            $user_id,
            $order_status,
            $total_amount,
            $shipping_address
        ]);
        // Return the order ID
        return $this->db->lastInsertId();
    }
}