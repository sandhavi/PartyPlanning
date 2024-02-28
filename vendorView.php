<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Data</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #ffffff; /* Set background to white */
            color: #333; /* General text color */
            padding: 20px;
        }

        h2 {
            color: #4B0082; /* Purple heading */
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0px 0px 10px #ccc; /* Subtle shadow for depth */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            background-color: #fefefe; /* Slightly off-white cells for subtle contrast */
        }

        th {
            background-color: #4B0082; /* Purple heading background */
            color: #ffffff; /* White text for headings */
        }

        tr:nth-child(even) {
            background-color: #f7f7f7; /* Light zebra striping for rows */
        }

        tr:hover {
            background-color: #f0f0f0; /* Hover effect for rows */
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
            border-radius: 5px; /* Rounded corners */
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

        button {
            cursor: pointer;
            background-color: #4B0082; /* Purple buttons */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            margin-right: 5px;
            transition: background-color 0.3s ease; /* Transition for button background color */
        }

        button:hover {
            background-color: #6f42c1; /* Lighter purple on hover */
            box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2); /* Shadow on hover */
        }

        /* Additional styling for buttons */
        .edit-btn {
            background-color: #ffca28; /* Amber for edit */
            color: #333;
        }

        .edit-btn:hover {
            background-color: #ffc107; /* Darker amber on hover */
        }

        .delete-btn {
            background-color: #f44336; /* Red for delete */
        }

        .delete-btn:hover {
            background-color: #e53935; /* Darker red on hover */
        }

        /* Style for the popup forms */
        form {
            display: flex;
            flex-direction: column;
        }

        form input[type=text] {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        form button {
            width: auto;
            padding: 10px;
            margin-top: 10px;
        }

        /* Adjust button style inside the form */
        form button[type=submit] {
            background-color: #4CAF50; /* Green for submit */
        }

        form button[type=button] {
            background-color: #6c757d; /* Grey for cancel */
        }

    </style>
</head>

<body>
    <?php
    include './Include/connectin.php';

    // Process of edit form submission and update the database, this works fine, don't do anything to it
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_vendor'])) {
        $editVendorId = $_POST['edit_vendor_id'];
        $editVendorName = $_POST['edit_vendor_name'];
        $editVendorDescription = $_POST['edit_vendor_description'];
        $editVendorType = $_POST['edit_vendor_type'];

        $updateSql = "UPDATE vendor SET 
                      name = '$editVendorName', 
                      description = '$editVendorDescription', 
                      type = '$editVendorType'
                      WHERE id = $editVendorId";

        if ($conn->query($updateSql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Process of delete form submission and delete the record from the database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_vendor'])) {
        $deleteVendorId = $_POST['delete_vendor_id'];

        $deleteSql = "DELETE FROM vendor WHERE id = $deleteVendorId";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    // Process of add form submission and insert a new record into the database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_vendor'])) {
        $addVendorName = $_POST['add_vendor_name'];
        $addVendorDescription = $_POST['add_vendor_description'];
        $addVendorType = $_POST['add_vendor_type'];

        $addSql = "INSERT INTO vendor (name, description, type) VALUES ('$addVendorName', '$addVendorDescription', '$addVendorType')";

        if ($conn->query($addSql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    // Query the database
    $sql = "SELECT * FROM vendor";
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

    <h2>Vendor Data</h2>
    <?php if (!empty($rows)) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['admin_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['type']; ?></td>
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
            <h3>Edit Vendor</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="edit_vendor_id" id="editVendorId" value="">
                Name: <input type="text" name="edit_vendor_name" id="editVendorName" required><br>
                Description: <input type="text" name="edit_vendor_description" id="editVendorDescription" required><br>
                Type: <input type="text" name="edit_vendor_type" id="editVendorType" required><br>
                <button type="submit" name="edit_vendor">Save</button>
                <button type="button" onclick="closeEditPopup()">Cancel</button>
            </form>
        </div>

        <!-- Delete pop-up window -->
        <div class="overlay" id="deleteOverlay"></div>
        <div class="edit-popup" id="deletePopup">
            <h3>Delete Vendor</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="delete_vendor_id" id="deleteVendorId" value="">
                <p>Are you sure you want to delete this vendor?</p>
                <button type="submit" name="delete_vendor">Yes</button>
                <button type="button" onclick="closeDeletePopup()">No</button>
            </form>
        </div>

        <!-- Add pop-up window -->
        <div class="overlay" id="addOverlay"></div>
        <div class="edit-popup" id="addPopup">
            <h3>Add Vendor</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                Name: <input type="text" name="add_vendor_name" required><br>
                Description: <input type="text" name="add_vendor_description" required><br>
                Type: <input type="text" name="add_vendor_type" required><br>
                <button type="submit" name="add_vendor">Add</button>
                <button type="button" onclick="closeAddPopup()">Cancel</button>
            </form>
        </div>

        <!-- Add Vendor Button -->
        <button onclick="openAddPopup()">Add New Vendor</button>

    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>

    <!-- JS -->
    <script>
        function openEditPopup(vendorId) {
            var vendor = <?php echo json_encode($rows); ?>.find(v => v.id == vendorId);

            if (vendor) {
                document.getElementById('editVendorId').value = vendor.id;
                document.getElementById('editVendorName').value = vendor.name;
                document.getElementById('editVendorDescription').value = vendor.description;
                document.getElementById('editVendorType').value = vendor.type;

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

        function openDeletePopup(vendorId) {
            document.getElementById('deleteVendorId').value = vendorId;

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
