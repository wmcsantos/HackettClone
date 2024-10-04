<?php

require_once("./models/categories.php");

if (isset($_POST['parent_id'])) {
    $parent_id = $_POST['parent_id'];

    $model = new Categories();
    $subcategories = $model->getSubcategories($parent_id);

    echo json_encode($subcategories);
} else {
    echo json_encode(['error' => 'No parent_id provided']);
}