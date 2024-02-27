<!DOCTYPE html>
<html>
<?php
// Include the database connection file
include './Include/connectin.php';

// Query the database
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

// Process the results
$rows = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }
}

// Close the connection
$conn->close();
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="globals.css" />
  <link rel="stylesheet" href="styleguide.css" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="admin-dashboard">
    <table class="student-list">
      <thead>
        <tr>
          <th></th>
          <th>ID</th>
          <th>Name</th>
          <th>Membership</th>
          <th>Last LogIn</th>
          <th>Email</th>
          <th>City</th>
          <th>Contact</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Assuming $data is an array fetched from the database
        foreach ($data as $row) {
          echo '<tr>';
          echo '<td></td>'; // Placeholder for checkbox or any other actions
          echo '<td>' . $row['id'] . '</td>';
          echo '<td>' . $row['name'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['city'] . '</td>';
          echo '<td>' . $row['contact'] . '</td>';
          echo '<td>Action buttons or links</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>

    <div class="pagination">
      <!-- Pagination code here -->
    </div>

    <div class="menu">
      <!-- Admin menu code here -->
    </div>
  </div>
</body>

</html>