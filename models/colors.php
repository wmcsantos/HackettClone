<?php

require_once("base.php");

class Colors extends Base
{
    public function getColors() 
    {
        $query = $this->db->prepare("
            SELECT 
                id, name, code, image_url
            FROM 
                colors;
        ");

        $query->execute();

        return $query->fetchAll();
    }
}
