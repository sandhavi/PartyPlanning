<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PartyPRO Navbar</title>
  <style>
    body,
    html {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #39004b;
      /* Adjust color to match the exact hue of the navbar */
      padding: 10px 20px;
      color: white;
      font-size: x-large;
    }

    .logo a {
      color: #FFD700;
      /* Gold color for the logo, adjust if necessary */
      text-decoration: none;
      font-size: 24px;
    }

    .nav-links {
      list-style: none;
    }

    .nav-links li {
      display: inline;
      margin-left: 20px;
      padding: 20px;
      font-size: 30px;
    }

    .nav-links a {
      color: white;
      text-decoration: none;
      font-size: 16px;
      font-size: large;
    }

    .nav-links a:hover {
      text-decoration: none;
      color: blanchedalmond;
    }

    @media (max-width: 768px) {

      /* Responsive design for smaller screens */
      .nav-links {
        display: none;
        /* Hide the navigation on small screens */
        /* You might want to add a JavaScript toggle button here */
      }
    }
  </style>
</head>

<body>
  <?php
  include '../../Include/connectin.php';
  session_start();

  if (isset($_SESSION['id'])) {

    $adminId = $_SESSION['id'];
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
        <li>Welcome Admin, <?php echo $userName; ?></li>
      </ul>
    </nav>
  </header>
  <script src="script.js"></script>
</body>

</html>