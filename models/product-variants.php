<?php

require_once("base.php");

class ProductVariants extends Base
{
    public function createProductVariant($stock, $product_id, $size, $color_products_id, $price)
    {
        $query = $this->db->prepare("
            INSERT INTO product_variants (stock, product_id, size_id, color_products_id, price)
            VALUES (?, ?, ?, ?, ?);
        ");
        
        $query->execute([
            $stock,
            $product_id,
            $size,
            $color_products_id,
            $price
        ]);

        return $this->db->lastInsertId();
    }
}