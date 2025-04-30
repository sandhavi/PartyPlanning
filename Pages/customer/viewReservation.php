<?php
session_start();
include_once '../../Include/connectin.php';

$customerId = 1;

// Fetch reservations for the current user with related information
$query = "SELECT r.*, 
          t.name as theme_name, t.description as theme_description,
          v.name as vendor_name, v.description as vendor_description, v.type as vendor_type,
          ve.name as venue_name, ve.description as venue_description
          FROM reservation r
          LEFT JOIN theme t ON r.theme_id = t.id
          LEFT JOIN vendor v ON r.vendor_id = v.id
          LEFT JOIN venue ve ON r.venue_id = ve.id
          WHERE r.customer_id = ?
          ORDER BY r.date ASC";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Reservations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        .reservation-card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .reservation-card:hover {
            transform: translateY(-5px);
        }

        .badge-upcoming {
            background-color: #28a745;
            color: white;
        }

        .badge-pending {
            background-color: #ffc107;
            color: black;
        }

        .badge-cancelled {
            background-color: #dc3545;
            color: white;
        }

        .event-detail {
            margin-bottom: 10px;
        }

        .event-detail i {
            width: 20px;
            text-align: center;
            margin-right: 10px;
        }

        .event-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 15px;
        }
    </style>
</head>

<body>


    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-4">Your Upcoming Events</h2>

                <?php if ($result->num_rows > 0): ?>
                    <?php while ($reservation = $result->fetch_assoc()): ?>
                        <div class="card reservation-card">
                            <div class="card-header event-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4>Event on <?= date('F j, Y', strtotime($reservation['date'])) ?></h4>
                                    <?php
                                    $badgeClass = 'badge-pending';
                                    if ($reservation['status'] == 'Confirmed') {
                                        $badgeClass = 'badge-upcoming';
                                    } elseif ($reservation['status'] == 'Cancelled') {
                                        $badgeClass = 'badge-cancelled';
                                    }
                                    ?>
                                    <span class="badge <?= $badgeClass ?>"><?= $reservation['status'] ?: 'Pending' ?></span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="event-detail">
                                            <i class="fas fa-calendar"></i> <strong>Date:</strong> <?= date('F j, Y', strtotime($reservation['date'])) ?>
                                        </div>
                                        <div class="event-detail">
                                            <i class="fas fa-clock"></i> <strong>Time:</strong> <?= date('g:i A', strtotime($reservation['time'])) ?>
                                        </div>
                                        <div class="event-detail">
                                            <i class="fas fa-users"></i> <strong>Number of Guests:</strong> <?= $reservation['no_guests'] ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-detail">
                                            <i class="fas fa-paint-brush"></i> <strong>Theme:</strong> <?= $reservation['theme_name'] ?>
                                        </div>
                                        <div class="event-detail">
                                            <i class="fas fa-utensils"></i> <strong>Food Vendor:</strong> <?= $reservation['vendor_name'] ?>
                                        </div>
                                        <div class="event-detail">
                                            <i class="fas fa-map-marker-alt"></i> <strong>Venue:</strong> <?= $reservation['venue_name'] ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <h5>Event Details:</h5>
                                    <p><?= $reservation['description'] ?></p>
                                </div>

                                <div class="accordion mt-3" id="accordionDetails-<?= $reservation['id'] ?>">
                                    <div class="card">
                                        <div class="card-header" id="headingTheme-<?= $reservation['id'] ?>">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTheme-<?= $reservation['id'] ?>" aria-expanded="false" aria-controls="collapseTheme-<?= $reservation['id'] ?>">
                                                    Theme Details
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTheme-<?= $reservation['id'] ?>" class="collapse" aria-labelledby="headingTheme-<?= $reservation['id'] ?>" data-parent="#accordionDetails-<?= $reservation['id'] ?>">
                                            <div class="card-body">
                                                <?= $reservation['theme_description'] ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingVendor-<?= $reservation['id'] ?>">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseVendor-<?= $reservation['id'] ?>" aria-expanded="false" aria-controls="collapseVendor-<?= $reservation['id'] ?>">
                                                    Food Vendor Details
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseVendor-<?= $reservation['id'] ?>" class="collapse" aria-labelledby="headingVendor-<?= $reservation['id'] ?>" data-parent="#accordionDetails-<?= $reservation['id'] ?>">
                                            <div class="card-body">
                                                <?= $reservation['vendor_description'] ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingVenue-<?= $reservation['id'] ?>">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseVenue-<?= $reservation['id'] ?>" aria-expanded="false" aria-controls="collapseVenue-<?= $reservation['id'] ?>">
                                                    Venue Details
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseVenue-<?= $reservation['id'] ?>" class="collapse" aria-labelledby="headingVenue-<?= $reservation['id'] ?>" data-parent="#accordionDetails-<?= $reservation['id'] ?>">
                                            <div class="card-body">
                                                <?= $reservation['venue_description'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                
                            </div>
                        </div>

                     
                        <div class="modal fade" id="cancelModal-<?= $reservation['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel-<?= $reservation['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="cancelModalLabel-<?= $reservation['id'] ?>">Cancel Reservation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to cancel your reservation for <?= date('F j, Y', strtotime($reservation['date'])) ?>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="cancelReservation.php?id=<?= $reservation['id'] ?>" class="btn btn-danger">Confirm Cancellation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="alert alert-info">
                        <p>You don't have any reservations yet. <a href="newReservation.php" class="alert-link">Make a new reservation</a> to get started!</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>