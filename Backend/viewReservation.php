<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/viewReservation.css" />
    <link rel="icon" type="image/x-icon" href="./images/favicon-icon.svg">
    <title>Reservation Data</title>

</head>

<body>
    <?php
    include '../Include/connectin.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_reservation'])) {
        $editReservationId = $_POST['edit_reservation_id'];
        $editReservationDate = $_POST['edit_reservation_date'];
        $editReservationTime = $_POST['edit_reservation_time'];
        $editReservationDescription = $_POST['edit_reservation_description'];
        $editReservationNoGuests = $_POST['edit_reservation_no_guests'];
        $editReservationStatus = $_POST['edit_reservation_status'];

        $updateSql = "UPDATE reservation SET 
                      date = '$editReservationDate', 
                      time = '$editReservationTime', 
                      description = '$editReservationDescription', 
                      no_guests = '$editReservationNoGuests', 
                      status = '$editReservationStatus' 
                      WHERE id = $editReservationId";

        if ($conn->query($updateSql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_reservation'])) {
        $deleteReservationId = $_POST['delete_reservation_id'];

        $deleteSql = "DELETE FROM reservation WHERE id = $deleteReservationId";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM reservation";
    $result = $conn->query($sql);

 
    $rows = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }


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
                <th>No. of Guests</th>
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
                    <td><?php echo $row['no_guests']; ?></td>
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
                No. of Guests: <input type="number" name="edit_reservation_no_guests" id="editReservationNoGuests" required><br>
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
    <?php
        include './back.php'
        ?>
    <!-- JS -->
    <script>
        function openEditPopup(reservationId) {
            var reservation = <?php echo json_encode($rows); ?>.find(r => r.id == reservationId);

            if (reservation) {
                document.getElementById('editReservationId').value = reservation.id;
                document.getElementById('editReservationDate').value = reservation.date;
                document.getElementById('editReservationTime').value = reservation.time;
                document.getElementById('editReservationDescription').value = reservation.description;
                document.getElementById('editReservationNoGuests').value = reservation.no_guests;
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