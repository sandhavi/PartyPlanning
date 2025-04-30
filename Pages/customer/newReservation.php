<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Reservation</title>
    <style>
        :root {
            --primary-color: #e83e8c;
            /* Pink */
            --secondary-color: #8b5cf6;
            /* Purple */
            --bg-color: #f8f9fa;
            --text-color: #333;
            --error-color: #e63946;
            --success-color: #10b981;
            --border-radius: 16px;
            --box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            background-image: url('bg.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
            color: var(--text-color);
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            filter: blur(8px);
            z-index: -1;
        }

        .container {
            max-width: 850px;
            margin: 30px auto;
            background-color: rgba(255, 255, 255, 0.92);
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background-color: var(--primary-color);
        }

        header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 12px;
            font-weight: 700;
            font-size: 2.5rem;
            letter-spacing: -0.5px;
            position: relative;
            display: inline-block;
        }

        h1::after {
            content: '';
            position: absolute;
            width: 70px;
            height: 4px;
            background-color: var(--secondary-color);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .subtitle {
            color: #666;
            font-size: 1.2rem;
            font-weight: 300;
            margin-top: 20px;
        }

        .form-header-icons {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 25px;
        }

        .form-header-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 0.9rem;
            color: #666;
        }

        .form-header-icon svg {
            margin-bottom: 8px;
            color: var(--secondary-color);
            width: 30px;
            height: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e1e1e1;
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.85);
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.2);
            background-color: #fff;
        }

        input::placeholder,
        textarea::placeholder {
            color: #aaa;
            font-weight: 300;
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%238b5cf6' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
            padding-right: 45px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-col {
            flex: 1;
        }

        .error {
            color: var(--error-color);
            font-size: 14px;
            margin-top: 5px;
        }

        button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 16px 24px;
            font-size: 18px;
            font-weight: 600;
            border-radius: var(--border-radius);
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            z-index: 1;
            box-shadow: 0 6px 15px rgba(232, 62, 140, 0.3);
        }

        button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background-color: var(--secondary-color);
            transition: width 0.5s ease;
            z-index: -1;
        }

        button:hover {
            box-shadow: 0 8px 20px rgba(139, 92, 246, 0.4);
            transform: translateY(-2px);
        }

        button:hover::before {
            width: 100%;
        }

        button:active {
            transform: translateY(0);
        }

        .confirmation {
            display: none;
            text-align: center;
            padding: 40px 20px;
            background-color: rgba(16, 185, 129, 0.95);
            color: white;
            border-radius: var(--border-radius);
            margin-top: 20px;
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .confirmation h2 {
            font-size: 28px;
            margin-bottom:
                20px;
            position: relative;
            display: inline-block;
        }

        .confirmation h2::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: white;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .confirmation p {
            font-size: 18px;
            opacity: 0.9;
            max-width: 450px;
            margin: 0 auto;
            line-height: 1.6;
        }

        textarea {
            min-height: 140px;
            resize: vertical;
            line-height: 1.8;
        }

        /* Modern touches */
        .form-icon {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .form-icon svg {
            margin-right: 10px;
            color: var(--secondary-color);
        }

        .form-group {
            position: relative;
            margin-bottom: 24px;
            transition: all 0.3s ease;
        }

        .form-group:hover label {
            color: var(--primary-color);
        }

        label {
            font-weight: 500;
            transition: color 0.3s ease;
            display: inline-block;
            margin-bottom: 10px;
            letter-spacing: 0.3px;
        }

        .progress-bar {
            height: 8px;
            background-color: rgba(239, 239, 239, 0.7);
            border-radius: 4px;
            margin-bottom: 35px;
            overflow: hidden;
            position: relative;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .progress {
            height: 100%;
            width: 100%;
            background-color: var(--primary-color);
            position: relative;
            animation: progressPulse 2s infinite;
        }

        .progress-bar {
            height: 8px;
            background-color: rgba(239, 239, 239, 0.7);
            border-radius: 4px;
            margin-bottom: 35px;
            overflow: hidden;
            position: relative;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .progress {
            height: 100%;
            width: 100%;
            background-color: var(--primary-color);
            position: relative;
            animation: progressPulse 2s infinite;
        }


        @keyframes progressPulse {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }

            100% {
                opacity: 1;
            }
        }

        .error {
            color: var(--error-color);
            font-size: 14px;
            margin-top: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            opacity: 0;
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        .error:not(:empty) {
            opacity: 1;
            transform: translateY(0);
        }

        .decorated-section {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: rgba(232, 62, 140, 0.05);
            top: -50px;
            right: -50px;
            z-index: 0;
        }

        .decorated-section-2 {
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: rgba(139, 92, 246, 0.05);
            bottom: -40px;
            left: -40px;
            z-index: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="decorated-section"></div>
        <div class="decorated-section-2"></div>

        <header>
            <h1>Event Reservation</h1>
            <p class="subtitle">Complete the form below to book your special event</p>

            <div class="form-header-icons">
                <div class="form-header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                        <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                    </svg>
                    Easy Booking
                </div>
                <div class="form-header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    Premium Service
                </div>
                <div class="form-header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    Fast Confirmation
                </div>
            </div>
        </header>

        <div class="progress-bar">
            <div class="progress"></div>
        </div>

        <?php

        $status = isset($_GET['status']) ? $_GET['status'] : '';
        $message = isset($_GET['message']) ? $_GET['message'] : '';

        ?>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "party";


        $conn = new mysqli($servername, $username, $password, $dbname);


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $themes = [];
        $sql_themes = "SELECT id, name FROM theme";
        $result_themes = $conn->query($sql_themes);
        if ($result_themes->num_rows > 0) {
            while ($row = $result_themes->fetch_assoc()) {
                $themes[] = $row;
            }
        }


        $vendors = [];
        $sql_vendors = "SELECT id, name FROM vendor";
        $result_vendors = $conn->query($sql_vendors);
        if ($result_vendors->num_rows > 0) {
            while ($row = $result_vendors->fetch_assoc()) {
                $vendors[] = $row;
            }
        }


        $venues = [];
        $sql_venues = "SELECT id, name FROM venue";
        $result_venues = $conn->query($sql_venues);
        if ($result_venues->num_rows > 0) {
            while ($row = $result_venues->fetch_assoc()) {
                $venues[] = $row;
            }
        }
        ?>

        <form id="reservationForm" action="process_reservation.php" method="POST">
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <div class="form-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            <label for="theme">Event Theme</label>
                        </div>
                        <select id="theme" name="theme_id" required>
                            <option value="" disabled selected>Select an event theme</option>
                            <?php foreach ($themes as $theme): ?>
                                <option value="<?= $theme['id'] ?>"><?= htmlspecialchars($theme['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="error" id="themeError"></div>
                    </div>
                </div>

                <div class="form-col">
                    <div class="form-group">
                        <div class="form-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                            <label for="vendor">Vendor</label>
                        </div>
                        <select id="vendor" name="vendor_id" required>
                            <option value="" disabled selected>Select a vendor</option>
                            <?php foreach ($vendors as $vendor): ?>
                                <option value="<?= $vendor['id'] ?>"><?= htmlspecialchars($vendor['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="error" id="vendorError"></div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <div class="form-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <label for="venue">Venue</label>
                        </div>
                        <select id="venue" name="venue_id" required>
                            <option value="" disabled selected>Select a venue</option>
                            <?php foreach ($venues as $venue): ?>
                                <option value="<?= $venue['id'] ?>"><?= htmlspecialchars($venue['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="error" id="venueError"></div>
                    </div>
                </div>

                <div class="form-col">
                    <div class="form-group">
                        <div class="form-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <label for="date">Event Date</label>
                        </div>
                        <input type="date" id="date" name="event_date" required min="" />
                        <div class="error" id="dateError"></div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <div class="form-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <label for="time">Event Time</label>
                        </div>
                        <select id="time" name="event_time" required>
                            <option value="" disabled selected>Select a time</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="13:00">1:00 PM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="16:00">4:00 PM</option>
                            <option value="17:00">5:00 PM</option>
                            <option value="18:00">6:00 PM</option>
                            <option value="19:00">7:00 PM</option>
                            <option value="20:00">8:00 PM</option>
                            <option value="21:00">9:00 PM</option>
                            <option value="22:00">10:00 PM</option>
                        </select>
                        <div class="error" id="timeError"></div>
                    </div>
                </div>

                <div class="form-col">
                    <div class="form-group">
                        <div class="form-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <label for="guests">Number of Guests</label>
                        </div>
                        <input type="number" id="guests" name="guests" min="1" max="500" required placeholder="Enter number of guests" />
                        <div class="error" id="guestsError"></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                    </svg>
                    <label for="description">Event Description</label>
                </div>
                <textarea id="description" name="description" placeholder="Provide details about your event" required></textarea>
                <div class="error" id="descriptionError"></div>
            </div>

            <button type="submit" id="submitBtn">Submit Reservation</button>
        </form>

        <div class="confirmation" id="confirmationMessage">
            <h2>Reservation Submitted Successfully!</h2>
            <p>We'll contact you shortly to confirm your event details.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const today = new Date().toISOString().split('T')[0];
            document.getElementById('date').min = today;


            const form = document.getElementById('reservationForm');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                if (validateForm()) {
                    simulateFormSubmission();
                }
            });

            function validateForm() {
                let isValid = true;


                const errorElements = document.querySelectorAll('.error');
                errorElements.forEach(el => el.textContent = '');


                const theme = document.getElementById('theme');
                if (!theme.value) {
                    document.getElementById('themeError').textContent = 'Please select an event theme';
                    isValid = false;
                }


                const vendor = document.getElementById('vendor');
                if (!vendor.value) {
                    document.getElementById('vendorError').textContent = 'Please select a vendor';
                    isValid = false;
                }


                const venue = document.getElementById('venue');
                if (!venue.value) {
                    document.getElementById('venueError').textContent = 'Please select a venue';
                    isValid = false;
                }


                const date = document.getElementById('date');
                if (!date.value) {
                    document.getElementById('dateError').textContent = 'Please select a date';
                    isValid = false;
                }


                const time = document.getElementById('time');
                if (!time.value) {
                    document.getElementById('timeError').textContent = 'Please select a time';
                    isValid = false;
                }


                const guests = document.getElementById('guests');
                if (!guests.value) {
                    document.getElementById('guestsError').textContent = 'Please enter number of guests';
                    isValid = false;
                } else if (parseInt(guests.value) < 1) {
                    document.getElementById('guestsError').textContent = 'Number of guests must be at least 1';
                    isValid = false;
                } else if (parseInt(guests.value) > 500) {
                    document.getElementById('guestsError').textContent = 'Maximum capacity is 500 guests';
                    isValid = false;
                }


                const description = document.getElementById('description');
                if (!description.value.trim()) {
                    document.getElementById('descriptionError').textContent = 'Please provide an event description';
                    isValid = false;
                } else if (description.value.trim().length < 10) {
                    document.getElementById('descriptionError').textContent = 'Description is too short';
                    isValid = false;
                }

                return isValid;
            }

            function simulateFormSubmission() {
                const submitBtn = document.getElementById('submitBtn');
                submitBtn.textContent = 'Processing...';
                submitBtn.disabled = true;


                const formData = new FormData(form);


                fetch('process_reservation.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {

                            form.style.display = 'none';
                            document.getElementById('confirmationMessage').style.display = 'block';
                            document.querySelector('.progress-bar').style.display = 'none';
                        } else {

                            submitBtn.textContent = 'Submit Reservation';
                            submitBtn.disabled = false;
                            alert('Error: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        submitBtn.textContent = 'Submit Reservation';
                        submitBtn.disabled = false;
                        alert('An error occurred while processing your reservation. Please try again.');
                    });
            }


            const inputs = document.querySelectorAll('input, select, textarea');

            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-3px)';
                    this.parentElement.style.transition = 'all 0.3s ease';
                    this.parentElement.style.boxShadow = '0 5px 15px rgba(0,0,0,0.05)';
                });

                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                    this.parentElement.style.boxShadow = 'none';
                });
            });


            function createParticles() {
                const container = document.querySelector('.container');
                const particlesCount = 15;

                for (let i = 0; i < particlesCount; i++) {
                    const particle = document.createElement('div');
                    particle.classList.add('particle');


                    particle.style.position = 'absolute';
                    particle.style.width = Math.random() * 10 + 5 + 'px';
                    particle.style.height = particle.style.width;
                    particle.style.background = Math.random() > 0.5 ?
                        'rgba(232, 62, 140, ' + (Math.random() * 0.1) + ')' :
                        'rgba(139, 92, 246, ' + (Math.random() * 0.1) + ')';
                    particle.style.borderRadius = '50%';
                    particle.style.top = Math.random() * 100 + '%';
                    particle.style.left = Math.random() * 100 + '%';
                    particle.style.pointerEvents = 'none';
                    particle.style.zIndex = '-1';


                    particle.style.animation = 'floatParticle ' + (Math.random() * 10 + 10) + 's linear infinite';
                    particle.style.opacity = '0';

                    container.appendChild(particle);
                }
            }

            const styleSheet = document.createElement('style');
            styleSheet.type = 'text/css';
            styleSheet.innerHTML = `
                @keyframes floatParticle {
                    0% { transform: translateY(0) rotate(0); opacity: 0; }
                    10% { opacity: 1; }
                    90% { opacity: 1; }
                    100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
                }
            `;
            document.head.appendChild(styleSheet);

            createParticles();
        });
    </script>
</body>

</html>