<?php

require_once("base.php");

class Categories extends Base
{
    public function getCategories() 
    {
        $query = $this->db->prepare("
            SELECT 
                id, name
            FROM 
                categories
            WHERE
                parent_id = 0;
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function getSubcategories($parent_id)
    {
        $query = $this->db->prepare("
            SELECT
                id, name
            FROM
                categories
            WHERE
                parent_id = ?
        ");

        $query->execute([
            $parent_id
        ]);

        return $query->fetchAll();
    }
}