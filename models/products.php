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
            SELECT DISTINCT
                c1.id, c1.name, c1.description_details, c1.description_composition, c1.description_care, c1.description_delivery, c2.id as product_variant_id, c2.price
            FROM 
                products as c1
            INNER JOIN 
                product_variants as c2
            ON
                c1.id = c2.product_id
            WHERE
                c1.id = ?;
        ");

        $query->execute([
            $product_id
        ]);

        return $query->fetch();
    }

    public function getProductVariant($product_id, $size_id, $color_products_id)
    {
        $query = $this->db->prepare("
            SELECT
                id, price
            FROM
                product_variants
            WHERE
                product_id = ? AND size_id = ? AND color_products_id = ?;
        ");

        $query->execute([
            $product_id,
            $size_id,
            $color_products_id
        ]);

        return $query->fetch();
    }

    public function getProductImages($color_code, $product_id)
    {
        $query = $this->db->prepare("
            SELECT 
                c1.image_url, c1.position, c3.code
            FROM 
                product_images as c1
            JOIN
                color_products as c2
            ON
                c1.color_products_id = c2.id
            JOIN
            	colors as c3
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

    public function getProductFirstImageForEachColor($product_id)
    {
        $query = $this->db->prepare("
            SELECT 
                c2.product_id, c1.image_url, c1.position, c3.code
            FROM 
                product_images as c1
            JOIN
                color_products as c2
            ON
                c1.color_products_id = c2.id
            JOIN
            	colors as c3
            ON
            	c3.id = c2.color_id
            WHERE
                position = 1 AND c2.product_id = ?;
        ");

        $query->execute([
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
                colors as c1 
            LEFT JOIN 
                color_products as c2 
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

    public function getProductSizes()
    {
        $query = $this->db->prepare("
            SELECT 
                id
            FROM 
                sizes;
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function getProductsByCategory($category_id)
    {
        $query = $this->db->prepare("
            SELECT DISTINCT
                c2.product_id, c7.id, c7.name, c1.image_url as photo_image_url, c4.name, c5.price, c1.position, c3.code, c3.image_url as color_image_url
            FROM 
                product_images as c1
            LEFT JOIN
                color_products as c2
            ON
                c1.color_products_id = c2.id
            LEFT JOIN
            	colors as c3
            ON
            	c3.id = c2.color_id
            LEFT JOIN
            	products as c4
            ON
            	c4.id = c2.product_id
            LEFT JOIN
            	product_variants as c5
            ON
            	c5.product_id = c2.product_id
            LEFT JOIN
            	category_products as c6
            ON
            	c6.product_id = c2.product_id
            LEFT JOIN
            	categories as c7
            ON 
            	c7.id = c6.category_id
            WHERE
                position = 1 AND c7.id = ?;
        ");

        $query->execute([
            $category_id
        ]);

        return $query->fetchAll();
    }
}
