<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue Data</title>
    <link rel="icon" type="image/x-icon" href="./images/favicon-icon.svg">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('./images/admin5.webp');
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #252525;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        th,
        td {
            border: 1px solid #5C376F;
            padding: 15px;
            text-align: left;
            color: black;
        }

        th {
            background-color: #d699ff;
        }

        tr:nth-child(even) {
            background-color: transparent;
        }

        tr:hover {
            background-color: rgba(222, 189, 237,0.25);
        }

        .edit-popup,
        .overlay {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(140, 146, 172, 0.9);
            padding: 20px;
            border-radius: 10px;
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
            color: #252525;
        }

        input[type="text"],
        button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border-radius: 4px;
            border: 1px solid #ddd;
            color: black;
        }

        input[type="text"] {
            background-color: transparent;
            color: black;
            
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #E510E5;
         
        }

        button {
            background-color: #663399;
            color: #ffffff;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s ease;
            width: 40%;
        }

        button:hover {
            background-color: #663399;
        }

        .add-button {
            background-color: #514B27;
            color: #252525;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            margin-bottom: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            
        }

        .add-button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .no-results {
            color: #f4f4f4;
        }
    </style>
</head>

<body>
    <?php
    include '../Include/connectin.php';

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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_venue'])) {
        $deleteVenueId = $_POST['delete_venue_id'];

        $deleteSql = "DELETE FROM venue WHERE id = $deleteVenueId";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_venue'])) {
        $addAdminId = $_POST['add_admin_id'];
        $addVenueName = $_POST['add_venue_name'];
        $addVenueDescription = $_POST['add_venue_description'];

        $addSql = "INSERT INTO venue (admin_id, name, description) VALUES ('$addAdminId','$addVenueName', '$addVenueDescription')";

        if ($conn->query($addSql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM venue";
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

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

        <div class="overlay" id="addOverlay"></div>
        <div class="edit-popup" id="addPopup">
            <h3>Add Venue</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                Admin ID: <input type="text" name="add_admin_id" id="addAdminId" required><br>
                Name: <input type="text" name="add_venue_name" required><br>
                Description: <input type="text" name="add_venue_description" required><br>
                <button type="submit" name="add_venue">Add</button>
                <button type="button" onclick="closeAddPopup()">Cancel</button>
            </form>
        </div>

        <button onclick="openAddPopup()">Add New Venue</button>

    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>
    <?php
        include './back.php'
        ?>

    <!-- JS -->
    <script>
        function openEditPopup(venueId) {
            var venue = <?php echo json_encode($rows); ?>.find(v => v.id == venueId);

            if (venue) {
                document.getElementById('editVenueId').value = venue.id;
                document.getElementById('editVenueName').value = venue.name;
                document.getElementById('editVenueDescription').value = venue.description;

                document.getElementById('editPopup').style.display = 'block';
                document.getElementById('editOverlay').style.display = 'block';
            }
        }

        function closeEditPopup() {

            document.getElementById('editPopup').style.display = 'none';
            document.getElementById('editOverlay').style.display = 'none';
        }

        function openDeletePopup(venueId) {
            document.getElementById('deleteVenueId').value = venueId;

            document.getElementById('deletePopup').style.display = 'block';
            document.getElementById('deleteOverlay').style.display = 'block';
        }

        function closeDeletePopup() {
            document.getElementById('deletePopup').style.display = 'none';
            document.getElementById('deleteOverlay').style.display = 'none';
        }

        function openAddPopup() {
            document.getElementById('addPopup').style.display = 'block';
            document.getElementById('addOverlay').style.display = 'block';
        }

        function closeAddPopup() {
            document.getElementById('addPopup').style.display = 'none';
            document.getElementById('addOverlay').style.display = 'none';
        }
    </script>

</body>

</html>