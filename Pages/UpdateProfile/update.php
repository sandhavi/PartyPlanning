<?php
include '../../Include/connectin.php'; // Include your database connection

// Placeholder for user ID
$userId = 1; // Example user ID

// Fetch user details
$stmt = $conn->prepare("SELECT * FROM customer WHERE id = :userId");
$stmt->execute(['userId' => $userId]);
$user = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="profile">
    <p>Name: <span id="userName"><?php echo htmlspecialchars($user['name']); ?></span></p>
    <p>Age: <span id="userAge"><?php echo htmlspecialchars($user['age']); ?></span></p>
    <p>Email: <span id="userEmail"><?php echo htmlspecialchars($user['email']); ?></span></p>
    <p>Address: <span id="userAddress"><?php echo htmlspecialchars($user['address']); ?></span></p>
    <button id="editProfileBtn">Edit Profile</button>
</div>

<!-- Hidden form for editing profile -->
<div id="editProfileForm" style="display:none;">
    <input type="text" id="editName" placeholder="Name" value="<?php echo htmlspecialchars($user['name']); ?>">
    <input type="number" id="editAge" placeholder="Age" value="<?php echo htmlspecialchars($user['age']); ?>">
    <input type="email" id="editEmail" placeholder="Email" value="<?php echo htmlspecialchars($user['email']); ?>">
    <input type="text" id="editAddress" placeholder="Address" value="<?php echo htmlspecialchars($user['address']); ?>">
    <button id="saveProfileBtn">Save Changes</button>
</div>

<script src="script.js"></script>
</body>
</html>
