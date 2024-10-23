<?php

include_once("base.php");

class ColorProducts extends Base
{
    public function createColorProductsReference($product_id, $color_id)
    {
        $query = $this->db->prepare("
            INSERT INTO
                color_products (product_id, color_id)
            VALUES
                (?, ?);
        ");

        $query->execute([
            $product_id,
            $color_id
        ]);

        return $this->db->lastInsertId();
    }
}