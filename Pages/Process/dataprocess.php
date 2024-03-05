
<?php
include('../../Include/connectin.php'); // Check the path for correctness

$sql = "SELECT name, description FROM theme";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='database-box' data-key='{$row['id']}'>
                <h4>{$row['name']}</h4>
                <h5>{$row['description']}</h5>
              </div>";
    }
}
$conn->close();
?>
