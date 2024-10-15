<?php

require_once("base.php");

class CartItems extends Base
{
    public function createCartItem($cart_id, $product_variant_id, $quantity, $price)
    {
        $query = $this->db->prepare("
            INSERT INTO
                cart_items (cart_id, product_variant_id, quantity, price)
            VALUES
                (?, ?, ?, ?)
        ");

        $query->execute([
            $cart_id,
            $product_variant_id,
            $quantity,
            $price,
        ]);

        return $query->fetch();
    }

    public function updateCartItem($cart_item)
    {
        $query = $this->db->prepare("
            UPDATE 
                cart_items
            SET
                quantity = ?
            WHERE
                cart_id = ? AND product_variant_id = ?;
        ");

        $query->execute([
            $cart_item["quantity"],
            $cart_item["cart_id"],
            $cart_item["product_variant_id"],
        ]);

        return $query->fetch();
    }


}