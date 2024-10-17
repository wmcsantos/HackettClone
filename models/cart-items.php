<?php

require_once("base.php");

class CartItems extends Base
{
    public function getCartItemInCart($cart_id)
    {
        $query = $this->db->prepare("
            SELECT 
                c1.id, c1.cart_id, c3.name product_name, c4.image_url, c1.price, c7.name color, c6.name size, c1.quantity
            FROM 
                cart_items as c1
            INNER JOIN 
                product_variants as c2
            ON 
                c1.product_variant_id = c2.id
            INNER JOIN 
                products as c3
            ON 
                c2.product_id = c3.id
            INNER JOIN 
                product_images as c4
            ON 
                c2.color_products_id = c4.color_products_id
            INNER JOIN 
                color_products as c5
            ON 
                c2.color_products_id = c5.id
            INNER JOIN 
                sizes as c6
            ON 
                c2.size_id = c6.id
            INNER JOIN 
                colors as c7
            ON 
                c5.color_id = c7.id
            WHERE 
                c4.position = 1 AND cart_id = ?;
        ");

        $query->execute([
            $cart_id
        ]);

        return $query->fetchAll();
    }
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

    public function removeItemFromCart($cart_item_id)
    {
        $query = $this->db->prepare("
            DELETE FROM
                cart_items
            WHERE
                id = ?;
        ");

        $query->execute([
            $cart_item_id
        ]);

        return true;
    }
}