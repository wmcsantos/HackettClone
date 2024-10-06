<?php

require_once("base.php");

class Products extends Base
{
    public function getProducts() 
    {
        $query = $this->db->prepare("
            SELECT 
                id, name
            FROM 
                products;
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function getProductColors($product_id)
    {
        $query = $this->db->prepare("
            SELECT 
                c1.name, c1.code, c1.image_url
            FROM 
                `colors` as c1 
            LEFT JOIN 
                `color_products` as c2 
            ON 
                c1.id = c2.color_id
            WHERE
                c2.product_id = ?;
        ");

        $query->execute([
            $product_id
        ]);

        return $query->fetchAll();
    }

    public function getProductsByCategory($category_id)
    {
        $query = $this->db->prepare("

        ");

        $query->execute([
            $category_id
        ]);

        return $query->fetchAll();
    }

    public function getProductsById($product_id)
    {
        $query = $this->db->prepare("
            
        ");

        $query->execute([
            $product_id
        ]);

        return $query->fetchAll();
    }
}