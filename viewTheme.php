<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theme Data</title>
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
    include './Include/connectin.php';

    // Process of edit form submission and update the database, this works fine, don't do anything to it
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_theme'])) {
        $editThemeId = $_POST['edit_theme_id'];
        $editThemeName = $_POST['edit_theme_name'];
        $editThemeDescription = $_POST['edit_theme_description'];
        $editThemeImage = $_POST['edit_theme_image'];

        $updateSql = "UPDATE theme SET 
                      name = '$editThemeName', 
                      description = '$editThemeDescription', 
                      image = '$editThemeImage'
                      WHERE id = $editThemeId";

        if ($conn->query($updateSql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Process of delete form submission and delete the record from the database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_theme'])) {
        $deleteThemeId = $_POST['delete_theme_id'];

        $deleteSql = "DELETE FROM theme WHERE id = $deleteThemeId";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    // Process of add form submission and insert a new record into the database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_theme'])) {
        $addThemeName = $_POST['add_theme_name'];
        $addThemeDescription = $_POST['add_theme_description'];
        $addThemeImage = $_POST['add_theme_image'];

        $addSql = "INSERT INTO theme (name, description, image) VALUES ('$addThemeName', '$addThemeDescription', '$addThemeImage')";

        if ($conn->query($addSql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    // Query the database
    $sql = "SELECT * FROM theme";
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

    <h2>Theme Data</h2>
    <?php if (!empty($rows)) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['admin_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['image']; ?></td>
                    <td>
                        <button onclick="openEditPopup(<?php echo $row['id']; ?>)">Edit</button>
                        <button onclick="openDeletePopup(<?php echo $row['id']; ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Edit pop-up window-->
        <div class="overlay" id="editOverlay"></div>
        <div class="edit-popup" id="editPopup">
            <h3>Edit Theme</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="edit_theme_id" id="editThemeId" value="">
                Name: <input type="text" name="edit_theme_name" id="editThemeName" required><br>
                Description: <input type="text" name="edit_theme_description" id="editThemeDescription" required><br>
                Image: <input type="text" name="edit_theme_image" id="editThemeImage" required><br>
                <button type="submit" name="edit_theme">Save</button>
                <button type="button" onclick="closeEditPopup()">Cancel</button>
            </form>
        </div>

        <!-- Delete pop-up window -->
        <div class="overlay" id="deleteOverlay"></div>
        <div class="edit-popup" id="deletePopup">
            <h3>Delete Theme</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="delete_theme_id" id="deleteThemeId" value="">
                <p>Are you sure you want to delete this theme?</p>
                <button type="submit" name="delete_theme">Yes</button>
                <button type="button" onclick="closeDeletePopup()">No</button>
            </form>
        </div>

        <!-- Add pop-up window -->
        <div class="overlay" id="addOverlay"></div>
        <div class="edit-popup" id="addPopup">
            <h3>Add Theme</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                Name: <input type="text" name="add_theme_name" required><br>
                Admin ID: <input type="text" name="add_theme_admin_id" required><br>
                Description: <input type="text" name="add_theme_description" required><br>
                Image: <input type="text" name="add_theme_image" required><br>
                <button type="submit" name="add_theme">Add</button>
                <button type="button" onclick="closeAddPopup()">Cancel</button>
            </form>
        </div>

        <!-- Add Theme Button -->
        <button onclick="openAddPopup()">Add New Theme</button>

    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>

    <!-- JS -->
    <script>
        function openEditPopup(themeId) {
            var theme = <?php echo json_encode($rows); ?>.find(t => t.id == themeId);

            if (theme) {
                document.getElementById('editThemeId').value = theme.id;
                document.getElementById('editThemeName').value = theme.name;
                document.getElementById('editThemeDescription').value = theme.description;
                document.getElementById('editThemeImage').value = theme.image;

                // Display the edit pop-up
                document.getElementById('editPopup').style.display = 'block';
                document.getElementById('editOverlay').style.display = 'block';
            }
        }

        function closeEditPopup() {
            // Close the edit pop-up
            document.getElementById('editPopup').style.display = 'none';
            document.getElementById('editOverlay').style.display = 'none';
        }

        function openDeletePopup(themeId) {
            document.getElementById('deleteThemeId').value = themeId;

            // Display the delete pop-up
            document.getElementById('deletePopup').style.display = 'block';
            document.getElementById('deleteOverlay').style.display = 'block';
        }

        function closeDeletePopup() {
            // Close the delete pop-up
            document.getElementById('deletePopup').style.display = 'none';
            document.getElementById('deleteOverlay').style.display = 'none';
        }

        function openAddPopup() {
            // Display the add pop-up
            document.getElementById('addPopup').style.display = 'block';
            document.getElementById('addOverlay').style.display = 'block';
        }

        function closeAddPopup() {
            // Close the add pop-up
            document.getElementById('addPopup').style.display = 'none';
            document.getElementById('addOverlay').style.display = 'none';
        }
    </script>

</body>

</html>
