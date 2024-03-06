<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/favicon-icon.svg">
    <title>Theme Data</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('./images/admin5.webp');
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: #333;
            padding: 20px;
        }

        h2 {
            color: #4B0082;
            text-align: center;
            transition: color 0.3s ease;
        }

        h2:hover {
            color: #9370DB;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            animation: fadeIn 0.5s ease-in-out;
        }

        th,
        td {
            border: 1px solid #393939;
            padding: 12px;
            text-align: left;
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        th {
            background-color: #d699ff;
            color: #ffffff;
        }

        td {
            color: #333;
        }

        tr:nth-child(even) {
            background-color: transparent;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        button {
            cursor: pointer;
            background-color: #39004b;
            color: #FFFFFF;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            margin-right: 10px;
            align-items: center;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            background-color: #4B0082;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        /* Enhanced styles for pop-ups */
.edit-popup, .overlay {
    /* Existing styles */
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}



        .edit-popup,
        .overlay {
            display: none;
            position: fixed;
            top: 75%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(234, 249, 252, 0.9);
            padding: 40px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.9);
            z-index: 2;
            border-radius: 5px;
            animation: zoomIn 0.3s ease-in-out;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.5);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        input[type="text"] {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 10px;
            width: calc(100% - 22px);
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #4B0082;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form button[type="submit"] {
            background-color: #39004b;
            color: #fff;
        }

        form button[type="button"] {
            background-color: #6c757d;
            color: #fff;
        }

        form button[type="submit"]:hover,
        form button[type="button"]:hover {
            background-color: darken(#39004b, 10%);
        }
    </style>
</head>

<body>
    <?php
    include '../Include/connectin.php';


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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_theme'])) {
        $deleteThemeId = $_POST['delete_theme_id'];

        $deleteSql = "DELETE FROM theme WHERE id = $deleteThemeId";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_theme'])) {
        $addThemeAdminId = $_POST['add_theme_admin_id'];
        $addThemeName = $_POST['add_theme_name'];
        $addThemeDescription = $_POST['add_theme_description'];
        $addThemeImage = $_POST['add_theme_image'];

        $addSql = "INSERT INTO theme (admin_id,name, description, image) VALUES ('$addThemeAdminId','$addThemeName', '$addThemeDescription', '$addThemeImage')";

        if ($conn->query($addSql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM theme";
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

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

        <button onclick="openAddPopup()">Add New Theme</button>

    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>

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