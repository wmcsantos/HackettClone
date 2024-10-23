<?php

require_once("base.php");

class CategoryProducts extends Base
{
    public function createCategoryProductReference($product_id, $category_id)
    {
        $query = $this->db->prepare("
            INSERT INTO
                category_products (product_id, category_id)
            VALUES
                (?, ?);
        ");

        $query->execute([
            $product_id,
            $category_id
        ]);
    }
}