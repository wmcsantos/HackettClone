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

    public function getProductSizesStock($color_products_id)
    {
        $query = $this->db->prepare("
            SELECT 
                size_id, stock
            FROM
                product_variants
            WHERE
                color_products_id = ?;
        ");

        $query->execute([
            $color_products_id
        ]);

        return $query->fetchAll();
    }
}