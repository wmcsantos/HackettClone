<?php

require_once("base.php");

class ProductImages extends Base
{    
    public function insertImage($color_products_id, $image_url) {
        $query = $this->db->prepare("
            INSERT INTO
                product_images (color_products_id, image_url)
            VALUES
                (?, ?);
        ");
        
        $query->execute([
            $color_products_id,
            $image_url
        ]);
    }
}