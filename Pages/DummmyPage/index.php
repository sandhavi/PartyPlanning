<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PartyPRO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
 <?php
session_start();

if (isset($_SESSION['id'])) {
    include '../../Include/connectin.php';
    $userId = $_SESSION['id'];
    $sql = "SELECT name FROM customer WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, get the name
        $row = $result->fetch_assoc();
        $userName = $row['name'];
    } else {
        // User not found, set a default name
        $userName = "Log In";
    }
    $conn->close();
} else {
    $userName = "Log In";
}
?>
    <div id="sidebar">
        <!-- Placeholder for sidebar, add steps dynamically with PHP if needed -->
        <ul>
            <li>Step 01</li>
            <li>Step 02</li>
            <li>Step 03</li>
            <!-- Add more steps -->
        </ul>
    </div>
    <div id="content">
        <h1>Set the scene</h1>
        <!-- Placeholder for scene selection -->
        <div id="scenes">
            <!-- You would populate this with PHP in a real application -->
            <div class="scene">Bohemian backyard</div>
            <div class="scene">Rustic picnic</div>
            <div class="scene">Vintage tea party</div>
            <div class="scene">Tropical fiesta</div>
            <!-- Add more scenes -->
        </div>
        <button id="nextButton">Next: Choose Venue</button>
    </div>
    <script src="script.js"></script>
</body>
</html>
