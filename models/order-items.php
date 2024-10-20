<?php

require_once("base.php");

class OrderItems extends Base
{
    public function createOrderItem($order_id, $product_variant_id, $quantity, $price)
    {
        $query = $this->db->prepare("
            INSERT INTO
                order_items (order_id, product_variant_id, quantity, price)
            VALUES
                (?, ?, ?, ?);
        ");

        $query->execute([
            $order_id, 
            $product_variant_id, 
            $quantity, 
            $price
        ]);
    }
}