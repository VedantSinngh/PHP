<?php
// Utility functions

// Function to send JSON Response with proper headers
function sendJsonResponse($data, $status = 200) {

    header('Content-Type: application/json');

    http_response_code($status);

    echo json_encode($data);

    exit;
}


// Get Input JSON data
function getJsonInput() {
    $input = file_get_contents('php://input');
    return json_decode($input, true);
}

// Authentication check
function isAuthenticated() {
    session_start();
    return isset($_SESSION['user_id']);
    
}
?>