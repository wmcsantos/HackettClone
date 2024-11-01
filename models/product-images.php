<?php

require_once("base.php");

class ProductImages extends Base
{    
    public function insertImage($color_products_id, $image_url, $position) {
        $query = $this->db->prepare("
            INSERT INTO
                product_images (color_products_id, image_url, position)
            VALUES
                (?, ?, ?);
        ");
        
        $query->execute([
            $color_products_id,
            $image_url,
            $position
        ]);
    }
}