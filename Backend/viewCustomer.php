<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #252525; 
        color: #f4f4f4; 
        margin: 0;
        padding: 20px;
    }

    h2 {
        color: #e2e2e2; 
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    th, td {
        border: 1px solid #393939;
        padding: 12px;
        text-align: left;
        color: #f4f4f4;
    }

    th {
        background-color: #6D7FCC; 
        color: #ffffff;
    }

    tr:nth-child(even) {
        background-color: #333333;
    }

    tr:hover {
        background-color: #575757;
    }

    .edit-popup, .overlay {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        z-index: 2;
        color: #000;
        border-radius: 8px; 
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7); 
        z-index: 1;
    }

    button {
        background-color: #39004b; 
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1rem;
        margin-right: 5px;
    }

    button:hover {
        background-color: #51006A;
    }

    .delete-button {
        background-color: #f44336;
    }

    .delete-button:hover {
        background-color: #e53935; 
    }
</style>


</head>

<body>
    <?php
    include '../Include/connectin.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_user'])) {
        $editUserId = $_POST['edit_user_id'];
        $editUserName = $_POST['edit_user_name'];
        $editUserAge = $_POST['edit_user_age'];
        $editUserAddress = $_POST['edit_user_address'];
        $editUserEmail = $_POST['edit_user_email'];

        $updateSql = "UPDATE customer SET 
                      name = '$editUserName', 
                      age = '$editUserAge', 
                      address = '$editUserAddress', 
                      email = '$editUserEmail' 
                      WHERE id = $editUserId";

        if ($conn->query($updateSql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
        $deleteUserId = $_POST['delete_user_id'];

        $deleteSql = "DELETE FROM customer WHERE id = $deleteUserId";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM customer";
    $result = $conn->query($sql);

    // Process the results
    $rows = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    $conn->close();
    ?>

    <h2>User Data</h2>
    <?php if (!empty($rows)) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <button onclick="openDeletePopup(<?php echo $row['id']; ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="overlay" id="deleteOverlay"></div>
        <div class="edit-popup" id="deletePopup">
            <h3>Delete User</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="delete_user_id" id="deleteUserId" value="">
                <p>Are you sure you want to delete this user?</p>
                <button type="submit" name="delete_user">Yes</button>
                <button type="button" onclick="closeDeletePopup()">No</button>
            </form>
        </div>

    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>

    <!-- JS -->
    <script>
        function openDeletePopup(userId) {
            document.getElementById('deleteUserId').value = userId;

            // Display the delete pop-up
            document.getElementById('deletePopup').style.display = 'block';
            document.getElementById('deleteOverlay').style.display = 'block';
        }

        function closeDeletePopup() {
            // Close the delete pop-up
            document.getElementById('deletePopup').style.display = 'none';
            document.getElementById('deleteOverlay').style.display = 'none';
        }
    </script>

</body>
</html>
