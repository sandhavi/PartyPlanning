<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <title>Database Box</title>
  <style>
  :root {
    --primary-color: #796565;
    --hover-effect-color: #9a8e8e;
    --border-radius: 8px;
    --transition-speed: 0.3s;
  }

  body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    background-color: #f5f5f5;
    font-family: Arial, sans-serif;
  }

  .database-box {
    width: 300px;
    margin: 10px;
    background-color: var(--primary-color);
    border: 2px solid #ccc;
    padding: 20px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: var(--border-radius);
    text-align: center;
    transition: transform var(--transition-speed) ease-in-out, background-color var(--transition-speed) ease-in-out;
    cursor: pointer;
  }

  .database-box:hover {
    transform: scale(1.05);
    background-color: var(--hover-effect-color);
  }

  .content-box {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  h4, h5 {
    margin: 5px 0;
  }
</style>


</head>
<body><?php
include '../../Include/connection.php';
?>
    
  <div class="database-box" id="dataBox">
    <?php include('./dataprocess.php'); ?>
  </div>

  <script src="script.js"></script>
</body>
</html>
