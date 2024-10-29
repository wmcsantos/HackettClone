<?php

require_once("./models/categories.php");

// Conditional statement to deal with POST requests to route 'subcategories'
if (isset($_POST['parent_id'])) {

    // Check the CSRF token
    $csrfToken = $_SERVER['HTTP_CSRF_TOKEN'] ?? '';
    if (empty($csrfToken) || $csrfToken !== $_SESSION['csrf_token']) {
        echo json_encode([
            "success" => false,
            "message" => "CSRF token validation failed."
        ]);
        http_response_code(403);
        exit;
    }
    
    $parent_id = $_POST['parent_id'];

    // Instance of the model required
    $model = new Categories();

    // Get subcategories given the parent id
    $subcategories = $model->getSubcategories($parent_id);

    echo json_encode($subcategories);
} else {
    echo json_encode(['error' => 'No parent_id provided']);
}