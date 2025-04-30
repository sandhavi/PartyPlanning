<?php
header('Content-Type: application/json');

require_once '../../Include/connectin.php';

define('MAX_MESSAGE_LENGTH', 1000);
function sanitize($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

$name = isset($_POST['name']) ? sanitize($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitize($_POST['email']) : '';
$phone = isset($_POST['phone']) ? sanitize($_POST['phone']) : '';
$message = isset($_POST['message']) ? sanitize($_POST['message']) : '';

if ($name === '' || $email === '' || $message === '' || strlen($message) > MAX_MESSAGE_LENGTH) {
    echo json_encode(['success' => false, 'error' => 'Invalid input.']);
    exit;
}

$customer_id = 1;
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

$insert = "INSERT INTO form (customer_id, name, message, phone, email) VALUES (?, ?, ?, ?, ?)";
if ($stmt = mysqli_prepare($conn, $insert)) {

    mysqli_stmt_bind_param($stmt, 'issss', $customer_id, $name, $message, $phone, $email);
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        echo json_encode(['success' => false, 'error' => 'DB error: ' . mysqli_stmt_error($stmt)]);
        mysqli_stmt_close($stmt);
        exit;
    }
    mysqli_stmt_close($stmt);
    echo json_encode(['success' => true]);
    exit;
}
http_response_code(500);
echo json_encode(['success' => false, 'error' => 'Database error.']);
