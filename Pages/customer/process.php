<?php
header('Content-Type: application/json');

// Include DB connection
require_once '../../Include/connectin.php';

// Helper function to sanitize input
define('MAX_MESSAGE_LENGTH', 1000);
function sanitize($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

// Get POST data
$name = isset($_POST['name']) ? sanitize($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitize($_POST['email']) : '';
$phone = isset($_POST['phone']) ? sanitize($_POST['phone']) : '';
$message = isset($_POST['message']) ? sanitize($_POST['message']) : '';

// Basic validation
if ($name === '' || $email === '' || $message === '' || strlen($message) > MAX_MESSAGE_LENGTH) {
    echo json_encode(['success' => false, 'error' => 'Invalid input.']);
    exit;
}

// Try to find customer by email (optional, fallback to NULL)
$customer_id = null;
$sql = "SELECT id FROM customer WHERE email = ? LIMIT 1";
if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $cid);
    if (mysqli_stmt_fetch($stmt)) {
        $customer_id = $cid;
    }
    mysqli_stmt_close($stmt);
}

// Insert into form table
$insert = "INSERT INTO form (customer_id, name, message, p_numeber, email) VALUES (?, ?, ?, ?, ?)";
if ($stmt = mysqli_prepare($conn, $insert)) {
    // If customer_id is null, use null and bind as 's' (string), else as 'i' (int)
    if (is_null($customer_id)) {
        $null = null;
        mysqli_stmt_bind_param($stmt, 'sssss', $null, $name, $message, $phone, $email);
    } else {
        mysqli_stmt_bind_param($stmt, 'issss', $customer_id, $name, $message, $phone, $email);
    }
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        // Output error for debugging
        echo json_encode(['success' => false, 'error' => 'DB error: ' . mysqli_stmt_error($stmt)]);
        mysqli_stmt_close($stmt);
        exit;
    }
    mysqli_stmt_close($stmt);
    echo json_encode(['success' => true]);
    exit;
}
// If we reach here, something went wrong
http_response_code(500);
echo json_encode(['success' => false, 'error' => 'Database error.']);
// Note: Check your DB column name. 'p_numeber' may be a typo. Should it be 'phone_number'?
