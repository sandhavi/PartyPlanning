<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Data</title>
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Data</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #EDF2F4;
            color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #2B2D42;
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
            color: #2B2D42;
        }

        th {
            background-color: #6D7FCC;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: transparent; 
        }

        tr:hover {
            background-color: bisque; 
        }

        .edit-popup, .overlay {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #363636;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 2;
            border-radius: 5px;
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

        input[type="text"],
        input[type="date"],
        input[type="time"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border-radius: 4px;
            border: 1px solid #ddd;
            background-color: #333; 
            color: #f4f4f4;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="time"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #6D7FCC;
        }

        button {
            background-color: #39004b;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease; 
            margin-right: 10px;
        }

        button:hover {
            background-color: #39004b; 
            transform: translateY(-3px);
        }

        .delete-btn {
            background-color: #f44336; 
        }

        .delete-btn:hover {
            background-color: #d32f2f; 
        }

        /* Add Reservation Button */
        .add-button {
            background-color: #FFD700; 
            color: #252525;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-bottom: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .add-button:hover {
            background-color: #e5b800;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .no-results {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
    include '../Include/connectin.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_reservation'])) {
        $editReservationId = $_POST['edit_reservation_id'];
        $editReservationDate = $_POST['edit_reservation_date'];
        $editReservationTime = $_POST['edit_reservation_time'];
        $editReservationDescription = $_POST['edit_reservation_description'];
        $editReservationVenue = $_POST['edit_reservation_venue'];
        $editReservationNoGuests = $_POST['edit_reservation_no_guests'];
        $editReservationVendor = $_POST['edit_reservation_vendor'];
        $editReservationTheme = $_POST['edit_reservation_theme'];
        $editReservationStatus = $_POST['edit_reservation_status'];

        $updateSql = "UPDATE reservation SET 
                      date = '$editReservationDate', 
                      time = '$editReservationTime', 
                      description = '$editReservationDescription', 
                      venue = '$editReservationVenue', 
                      no_guests = '$editReservationNoGuests', 
                      vendor = '$editReservationVendor', 
                      theme = '$editReservationTheme', 
                      status = '$editReservationStatus' 
                      WHERE id = $editReservationId";

        if ($conn->query($updateSql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Process of delete form submission and delete the record from the database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_reservation'])) {
        $deleteReservationId = $_POST['delete_reservation_id'];

        $deleteSql = "DELETE FROM reservation WHERE id = $deleteReservationId";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    // Query the database
    $sql = "SELECT * FROM reservation";
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

    <h2>Reservation Data</h2>
    <?php if (!empty($rows)) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Theme ID</th>
                <th>Vendor ID</th>
                <th>Venue ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Description</th>
                <th>Venue</th>
                <th>No. of Guests</th>
                <th>Vendor</th>
                <th>Theme</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['customer_id']; ?></td>
                    <td><?php echo $row['theme_id']; ?></td>
                    <td><?php echo $row['vendor_id']; ?></td>
                    <td><?php echo $row['venue_id']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['venue']; ?></td>
                    <td><?php echo $row['no_guests']; ?></td>
                    <td><?php echo $row['vendor']; ?></td>
                    <td><?php echo $row['theme']; ?></td>
                    <td><?php echo $row['status']; ?></td>
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
            <h3>Edit Reservation</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="edit_reservation_id" id="editReservationId" value="">
                Date: <input type="date" name="edit_reservation_date" id="editReservationDate" required><br>
                Time: <input type="time" name="edit_reservation_time" id="editReservationTime" required><br>
                Description: <input type="text" name="edit_reservation_description" id="editReservationDescription" required><br>
                Venue: <input type="text" name="edit_reservation_venue" id="editReservationVenue" required><br>
                No. of Guests: <input type="number" name="edit_reservation_no_guests" id="editReservationNoGuests" required><br>
                Vendor: <input type="text" name="edit_reservation_vendor" id="editReservationVendor" required><br>
                Theme: <input type="text" name="edit_reservation_theme" id="editReservationTheme" required><br>
                Status: <input type="text" name="edit_reservation_status" id="editReservationStatus" required><br>
                <button type="submit" name="edit_reservation">Save</button>
                <button type="button" onclick="closeEditPopup()">Cancel</button>
            </form>
        </div>

        <!-- Delete pop-up window -->
        <div class="overlay" id="deleteOverlay"></div>
        <div class="edit-popup" id="deletePopup">
            <h3>Delete Reservation</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="delete_reservation_id" id="deleteReservationId" value="">
                <p>Are you sure you want to delete this reservation?</p>
                <button type="submit" name="delete_reservation">Yes</button>
                <button type="button" onclick="closeDeletePopup()">No</button>
            </form>
        </div>

    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>

    <!-- JS -->
    <script>
        function openEditPopup(reservationId) {
            var reservation = <?php echo json_encode($rows); ?>.find(r => r.id == reservationId);

            if (reservation) {
                document.getElementById('editReservationId').value = reservation.id;
                document.getElementById('editReservationDate').value = reservation.date;
                document.getElementById('editReservationTime').value = reservation.time;
                document.getElementById('editReservationDescription').value = reservation.description;
                document.getElementById('editReservationVenue').value = reservation.venue;
                document.getElementById('editReservationNoGuests').value = reservation.no_guests;
                document.getElementById('editReservationVendor').value = reservation.vendor;
                document.getElementById('editReservationTheme').value = reservation.theme;
                document.getElementById('editReservationStatus').value = reservation.status;

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

        function openDeletePopup(reservationId) {
            document.getElementById('deleteReservationId').value = reservationId;

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
