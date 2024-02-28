<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue Data</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #663399;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 15px;
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
            background-color: #ffffff;
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

        .edit-popup h3 {
            color: #663399;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        button {
            background-color: #663399;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        button:hover {
            background-color: #4d2673;
        }

        .delete-popup button {
            background-color: #ff6347;
            color: #ffffff;
        }

        .delete-popup button:hover {
            background-color: #d94025;
        }

        .add-popup button {
            background-color: #ffd700;
            color: #000000;
        }

        .add-popup button:hover {
            background-color: #e5b800;
        }

        .no-results {
            color: #663399;
        }

        /* Add Venue Button */
        .add-button {
            background-color: #663399;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .add-button:hover {
            background-color: #4d2673;
        }
    </style>
</head>

<body>
    <?php
    include './Include/connectin.php';

    // Process of edit form submission and update the database, this works fine, don't do anything to it
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_venue'])) {
        $editVenueId = $_POST['edit_venue_id'];
        $editVenueName = $_POST['edit_venue_name'];
        $editVenueDescription = $_POST['edit_venue_description'];

        $updateSql = "UPDATE venue SET 
                      name = '$editVenueName', 
                      description = '$editVenueDescription'
                      WHERE id = $editVenueId";

        if ($conn->query($updateSql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Process of delete form submission and delete the record from the database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_venue'])) {
        $deleteVenueId = $_POST['delete_venue_id'];

        $deleteSql = "DELETE FROM venue WHERE id = $deleteVenueId";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    // Process of add form submission and insert a new record into the database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_venue'])) {
        $addVenueName = $_POST['add_venue_name'];
        $addVenueDescription = $_POST['add_venue_description'];

        $addSql = "INSERT INTO venue (name, description) VALUES ('$addVenueName', '$addVenueDescription')";

        if ($conn->query($addSql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    // Query the database
    $sql = "SELECT * FROM venue";
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

    <h2>Venue Data</h2>
    <?php if (!empty($rows)) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['admin_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
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
            <h3>Edit Venue</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="edit_venue_id" id="editVenueId" value="">
                Name: <input type="text" name="edit_venue_name" id="editVenueName" required><br>
                Description: <input type="text" name="edit_venue_description" id="editVenueDescription" required><br>
                <button type="submit" name="edit_venue">Save</button>
                <button type="button" onclick="closeEditPopup()">Cancel</button>
            </form>
        </div>

        <!-- Delete pop-up window -->
        <div class="overlay" id="deleteOverlay"></div>
        <div class="edit-popup" id="deletePopup">
            <h3>Delete Venue</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="delete_venue_id" id="deleteVenueId" value="">
                <p>Are you sure you want to delete this venue?</p>
                <button type="submit" name="delete_venue">Yes</button>
                <button type="button" onclick="closeDeletePopup()">No</button>
            </form>
        </div>

        <!-- Add pop-up window -->
        <div class="overlay" id="addOverlay"></div>
        <div class="edit-popup" id="addPopup">
            <h3>Add Venue</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                Name: <input type="text" name="add_venue_name" required><br>
                Description: <input type="text" name="add_venue_description" required><br>
                <button type="submit" name="add_venue">Add</button>
                <button type="button" onclick="closeAddPopup()">Cancel</button>
            </form>
        </div>

        <!-- Add Venue Button -->
        <button onclick="openAddPopup()">Add New Venue</button>

    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>

    <!-- JS -->
    <script>
        function openEditPopup(venueId) {
            var venue = <?php echo json_encode($rows); ?>.find(v => v.id == venueId);

            if (venue) {
                document.getElementById('editVenueId').value = venue.id;
                document.getElementById('editVenueName').value = venue.name;
                document.getElementById('editVenueDescription').value = venue.description;

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

        function openDeletePopup(venueId) {
            document.getElementById('deleteVenueId').value = venueId;

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
