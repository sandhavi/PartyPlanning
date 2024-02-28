<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PartyPRO Navbar</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    include '../../Include/connectin.php';
    session_start();

    if (isset($_SESSION['id'])) {
       
        $userId = $_SESSION['id'];
        $sql = "SELECT name FROM admin WHERE id = $adminId";
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
  <header>
    <nav class="navbar">
      <div class="logo">
        <a href="index.php"> PartyPRO</a>
      </div>
      <ul class="nav-links">
        <li>Welcome  <?php echo $userName; ?></li>
      </ul>
    </nav>
  </header>
<script src="script.js"></script>
</body>
</html>
