<?php

require_once("base.php");
require_once("cart-items.php");

class Carts extends Base
{
    public function createCart($user_id)
    {
        $query = $this->db->prepare("
            INSERT INTO
                carts (user_id)
            VALUES
                ( ? );
        ");

        $query->execute([
            $user_id
        ]);

        return $query->fetch();
    }

    public function getUserActiveCart($user_id)
    {
        $query = $this->db->prepare("
            SELECT
                id
            FROM
                carts
            WHERE
                user_id = ? AND cart_status = 'active';
        ");

        $query->execute([
            $user_id
        ]);

        return $query->fetch();
    }

    public function getCartItemsFromCart($cart_id)
    {
        $query = $this->db->prepare("
            SELECT
                c1.cart_id, c1.product_variant_id, c1.quantity, c1.price
            FROM
                cart_items as c1
            INNER JOIN
                carts as c2
            ON
                c1.cart_id = c2.id
            WHERE 
                c1.cart_id = ?
        ");

        $query->execute([
            $cart_id
        ]);

        return $query->fetchAll();
    }

    public function updateCartStatus($cart_id)
    {
        $query = $this->db->prepare("
            UPDATE
                carts
            SET
                cart_status = 'inactive'
            WHERE
                id = ?;
        ");

        $query->execute([
            $cart_id
        ]);
    }

    public function countCartItemsFromCart($cart_id)
    {
        $query = $this->db->prepare("
            SELECT 
                SUM(quantity) 'total_cart_items'
            FROM
                cart_items
            WHERE
                cart_id = ?;
        ");

        $query->execute([
            $cart_id
        ]);

        return $query->fetch();
    }

    public function addToCart($user_id, $product_variant_id, $quantity, $price)
    {
        // Check if logged in user has any 'active' cart. Create a cart if there is not any
        $userCart = $this->getUserActiveCart($user_id);

        if ( !$userCart )
        {
            $this->createCart($user_id);
            $userCart = $this->getUserActiveCart($user_id);
        }

        $cartItems = new CartItems();

        /* 
            Check if the product already exists in the cart. Increase the quantity if the product already
            exists or add a new entry in case it does not exists
        */
        $itemsInCart = $this->getCartItemsFromCart($userCart["id"]); 

        $itemFound = false;
        foreach ( $itemsInCart as &$item)
        {
            if ( $item["product_variant_id"] == $product_variant_id )
            {
                $item["quantity"] += $quantity;
                $cartItems->updateCartItem($item);
                $itemFound = true;
                return true;
            }
        }

        if ( !$itemFound )
        {
            $cartItems->createCartItem($userCart["id"], $product_variant_id, $quantity, $price);
            return true;
        }

    }
}