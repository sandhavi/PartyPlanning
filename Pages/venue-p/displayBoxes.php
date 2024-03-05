<?php
// Include your database connection file
include('../../Include/connectin.php');
$sql = "SELECT * FROM venue";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <title>Display Boxes</title>
  <style>
  :root {
    --box-bg-color: #796565;
    --box-hover-bg-color: #9a8e8e;
    --box-border-color: #ccc;
    --text-color: #fff;
    --hover-scale: 1.05;
    --transition-speed: 0.3s;
    --font-family: 'Arial', sans-serif;
  }

  body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: start;
    height: 100vh;
    margin: 0;
    background-color: #f5f5f5;
    font-family: var(--font-family);
    overflow: auto;
    padding-top: 20px;
  }

  .database-box {
    width: 300px;
    margin: 10px;
    background-color: var(--box-bg-color);
    color: var(--text-color);
    border: 2px solid var(--box-border-color);
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    text-align: center;
    transition: transform var(--transition-speed) ease, background-color var(--transition-speed) ease;
    cursor: pointer;
    position: relative;
  }

  .database-box:hover {
    transform: scale(var(--hover-scale));
    background-color: var(--box-hover-bg-color);
  }

  .database-box i {
    position: absolute;
    top: 10px;
    right: 10px;
    color: var(--text-color);
    transition: color var(--transition-speed) ease;
  }

  .database-box:hover i {
    color: #fff;
  }

  h4, h5 {
    margin: 10px 0;
  }

  .icon-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }
</style>

</head>
<body>
  <h1>venue</h1>
<?php if ($result->num_rows > 0): ?>
  <?php while ($row = $result->fetch_assoc()): ?>
    <div class="database-box" onclick="saveAndRedirect(<?= $row['id'] ?>)">
      <?= $row['name'] ?>
        <h5><?= $row['description'] ?></h5>

    </div>
  <?php endwhile; ?>
<?php endif; ?>

<script>
function saveAndRedirect(venueId) {
  const formData = new FormData();
  formData.append('venue_id', venueId);

  fetch('saveClick.php', {
    method: 'POST',
    body: formData,
  })
  .then(response => {
    if (response.ok) {
      window.location.href = "../date-p/formD.php"; // Specify your redirect page
    } else {
      alert('Error saving click.');
    }
  })
  .catch(error => console.error('Error:', error));
}

</script>

</body>
</html>
