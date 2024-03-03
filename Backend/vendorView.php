<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Data</title>
    <link rel="icon" type="image/x-icon" href="./images/favicon-icon.svg">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #252525;
            color: #f4f4f4;
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
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        th,
        td {
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

        .edit-popup,
        .overlay {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #241E5C;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 2;
            border-radius: 5px;
            transition: all 0.3s ease;
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
            cursor: pointer;
            background-color: #3C1C60;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            margin-right: 5px;
            transition: opacity 0.3s ease;
        }

        .delete-btn {
            background-color: #f44336;
        }

        button:hover {
            opacity: 0.8;
        }

        /* Adjust button style inside the form */
        form button[type=submit],
        form button[type=button] {
            background-color: #6D7FCC;
            color: white;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        form button[type=button] {
            background-color: #888;
        }

        form button:hover {
            background-color: #7a7a7a;
        }

        /* Style for adding new vendors */
        .add-vendor-btn {
            display: block;
            width: max-content;
            margin: 20px auto;
            background-color: #FFD700;
            color: #333;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .add-vendor-btn:hover {
            background-color: #f0c040;
            transform: scale(1.05);
        }
    </style>

</head>

<body>
    <?php
    include '../Include/connectin.php';

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


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_vendor'])) {
        $deleteVendorId = $_POST['delete_vendor_id'];

        $deleteSql = "DELETE FROM vendor WHERE id = $deleteVendorId";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_vendor'])) {
        $addAdminId = $_POST['add_admin_id'];
        $addVendorName = $_POST['add_vendor_name'];
        $addVendorDescription = $_POST['add_vendor_description'];
        $addVendorType = $_POST['add_vendor_type'];

        $addSql = "INSERT INTO vendor (admin_id, name, description, type) VALUES ('$addAdminId','$addVendorName', '$addVendorDescription', '$addVendorType')";

        if ($conn->query($addSql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM vendor";
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    $conn->close();
    ?>

    <h2>Vendor Data</h2>
    <?php if (!empty($rows)) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>AdminID</th>
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


        <div class="overlay" id="addOverlay"></div>
        <div class="edit-popup" id="addPopup">
            <h3>Add Vendor</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                Admin ID: <input type="text" name="add_admin_id" required><br>
                Name: <input type="text" name="add_vendor_name" required><br>
                Description: <input type="text" name="add_vendor_description" required><br>
                Type: <input type="text" name="add_vendor_type" required><br>
                <button type="submit" name="add_vendor">Add</button>
                <button type="button" onclick="closeAddPopup()">Cancel</button>
            </form>
        </div>

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

                document.getElementById('editPopup').style.display = 'block';
                document.getElementById('editOverlay').style.display = 'block';
            }
        }

        function closeEditPopup() {
            document.getElementById('editPopup').style.display = 'none';
            document.getElementById('editOverlay').style.display = 'none';
        }

        function openDeletePopup(vendorId) {
            document.getElementById('deleteVendorId').value = vendorId;


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

            document.querySelectorAll('#addPopup input').forEach(input => input.value = '');

        }
    </script>

</body>

</html>