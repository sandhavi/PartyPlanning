<?php
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "party";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Database connection failed: ' . $conn->connect_error
    ]);
    exit;
}

function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $theme_id = isset($_POST['theme_id']) ? intval($_POST['theme_id']) : 0;
    $vendor_id = isset($_POST['vendor_id']) ? intval($_POST['vendor_id']) : 0;
    $venue_id = isset($_POST['venue_id']) ? intval($_POST['venue_id']) : 0;
    $event_date = isset($_POST['event_date']) ? validate_input($_POST['event_date']) : '';
    $event_time = isset($_POST['event_time']) ? validate_input($_POST['event_time']) : '';
    $guests = isset($_POST['guests']) ? intval($_POST['guests']) : 0;
    $description = isset($_POST['description']) ? validate_input($_POST['description']) : '';


    $errors = [];

    if ($theme_id <= 0) {
        $errors[] = "Please select a valid theme";
    }

    if ($vendor_id <= 0) {
        $errors[] = "Please select a valid vendor";
    }

    if ($venue_id <= 0) {
        $errors[] = "Please select a valid venue";
    }

    if (empty($event_date)) {
        $errors[] = "Event date is required";
    } elseif (strtotime($event_date) < strtotime(date('Y-m-d'))) {
        $errors[] = "Event date cannot be in the past";
    }

    if (empty($event_time)) {
        $errors[] = "Event time is required";
    }

    if ($guests <= 0 || $guests > 500) {
        $errors[] = "Number of guests must be between 1 and 500";
    }

    if (strlen($description) < 10) {
        $errors[] = "Description is too short";
    }

    if (!empty($errors)) {
        echo json_encode([
            'status' => 'error',
            'message' => implode(", ", $errors)
        ]);
        exit;
    }

    $customer_id = isset($_SESSION['customer_id']) ? intval($_SESSION['customer_id']) : null;

    $admin_id = 1;
    $status = 'Pending';

    $stmt = $conn->prepare("INSERT INTO reservation (customer_id, theme_id, vendor_id, venue_id, admin_id, date, time, description, no_guests, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Prepare failed: ' . $conn->error
        ]);
        exit;
    }
    $stmt->bind_param(
        "iiiiisssis",
        $customer_id,
        $theme_id,
        $vendor_id,
        $venue_id,
        $admin_id,
        $event_date,
        $event_time,
        $description,
        $guests,
        $status
    );

    if ($stmt->execute()) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Reservation created successfully',
            'reservation_id' => $conn->insert_id
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Error saving reservation: ' . $stmt->error
        ]);
    }

    $stmt->close();
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method'
    ]);
}

$conn->close();
