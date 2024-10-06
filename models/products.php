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


    public function getProductById($product_id)
    {
        $query = $this->db->prepare("
            SELECT
                name, description_details, description_composition, description_care, description_delivery
            FROM 
                products
            WHERE
                id = ?;
        ");

        $query->execute([
            $product_id
        ]);

        return $query->fetch();
    }

    public function getProductImages($color_code, $product_id)
    {
        $query = $this->db->prepare("
            SELECT 
                c1.image_url, c1.position, c3.code
            FROM 
                `product_images` as c1
            JOIN
                `color_products` as c2
            ON
                c1.color_products_id = c2.id
            JOIN
            	`colors` as c3
            ON
            	c3.id = c2.color_id
            WHERE
                c3.code = ? AND c2.product_id = ?
            ORDER BY
                position ASC;
        ");

        $query->execute([
            $color_code,
            $product_id
        ]);

        return $query->fetchAll();
    }

    public function getProductColors($product_id)
    {
        $query = $this->db->prepare("
            SELECT 
                c1.name, c1.code, c1.image_url, c2.color_id
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

}