<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theme Data</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #ffffff; /* White background */
            color: #333;
            padding: 20px;
        }

        h2 {
            color: #4B0082; /* Purple heading */
            text-align: center;
            transition: color 0.3s ease;
        }

        h2:hover {
            color: #9370DB; /* Lighter purple on hover */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            animation: fadeIn 0.5s ease-in-out;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            background-color: #fefefe;
            transition: background-color 0.3s ease;
        }

        th {
            background-color: #4B0082; /* Purple header */
            color: #ffffff;
        }

        td {
            color: #333; /* Dark text for content */
        }

        tr:nth-child(even) {
            background-color: #f7f7f7;
        }

        tr:hover {
            background-color: #f0f0f0; /* Hover effect for rows */
        }

        button {
            cursor: pointer;
            background-color: #FFD700; /* Yellow buttons */
            color: #4B0082; /* Text color purple */
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            margin-right: 5px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .edit-popup, .overlay {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
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
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes zoomIn {
            from { transform: scale(0.5); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        /* Styles for input fields */
        input[type="text"] {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 10px;
            width: calc(100% - 22px); /* Adjust width to account for padding and border */
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #4B0082; /* Purple border for focus */
        }

        /* Style for the popup forms */
        form {
            display: flex;
            flex-direction: column;
        }

        form button[type="submit"] {
            background-color: #4CAF50; /* Green for submit */
            color: #fff;
        }

        form button[type="button"] {
            background-color: #6c757d; /* Grey for cancel */
            color: #fff;
        }

        form button[type="submit"]:hover, form button[type="button"]:hover {
            background-color: darken(#4CAF50, 10%); /* Darken function is not native CSS, replace with actual color */
        }

    </style>
</head>

<body>
    <?php
    include '../Include/connectin.php';

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
