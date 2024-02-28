<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 2;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
    </style>
</head>

<body>
    <?php
    // Include the database connection file
    include './Include/connectin.php';

    // Process edit form submission
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

    // Query the database
    $sql = "SELECT * FROM customer";
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
                        <!-- Edit button with onclick event to open edit pop-up -->
                        <button onclick="openEditPopup(<?php echo $row['id']; ?>)">Edit</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>

    <!-- Edit pop-up -->
    <div class="overlay" id="overlay"></div>
    <div class="edit-popup" id="editPopup">
        <h3>Edit User</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="edit_user_id" id="editUserId" value="">
            Name: <input type="text" name="edit_user_name" id="editUserName" required><br>
            Age: <input type="text" name="edit_user_age" id="editUserAge" required><br>
            Address: <input type="text" name="edit_user_address" id="editUserAddress" required><br>
            Email: <input type="text" name="edit_user_email" id="editUserEmail" required><br>
            <button type="submit" name="edit_user">Save</button>
            <button type="button" onclick="closeEditPopup()">Cancel</button>
        </form>
    </div>

    <!-- JavaScript code for handling edit pop-up -->
    <script>
        function openEditPopup(userId) {
            var user = <?php echo json_encode($rows); ?>.find(u => u.id == userId);

            if (user) {
                document.getElementById('editUserId').value = user.id;
                document.getElementById('editUserName').value = user.name;
                document.getElementById('editUserAge').value = user.age;
                document.getElementById('editUserAddress').value = user.address;
                document.getElementById('editUserEmail').value = user.email;

                // Display the edit pop-up and overlay
                document.getElementById('editPopup').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            }
        }

        function closeEditPopup() {
            // Close the edit pop-up and overlay
            document.getElementById('editPopup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
</body>

</html>
