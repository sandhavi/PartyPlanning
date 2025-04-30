<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        :root {
            --primary-color: #6C63FF;
            --secondary-color: #4A45B2;
            --background-color: #F5F7FB;
            --card-color: #FFFFFF;
            --text-primary: #333333;
            --text-secondary: #666666;
            --success-color: #28C76F;
            --warning-color: #FF9F43;
            --danger-color: #EA5455;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--background-color);
            background-image: linear-gradient(to bottom right, rgba(108, 99, 255, 0.05), rgba(74, 69, 178, 0.05));
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
        }

        .main-content {
            flex: 1;
            padding: 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
            border-bottom: 2px solid rgba(108, 99, 255, 0.2);
            padding-bottom: 1.5rem;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 1px;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .action-button {
            padding: 0;
            border-radius: 16px;
            background-color: var(--card-color);
            border: none;
            cursor: pointer;
            color: var(--text-primary);
            font-size: 1.2rem;
            font-weight: 600;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 120px;
            overflow: hidden;
        }

        .action-button:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(108, 99, 255, 0.25);
        }

        .action-button.primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
        }

        .action-button.secondary {
            background-color: white;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .action-button.accent {
            background: linear-gradient(135deg, var(--success-color) 0%, #1EA059 100%);
            color: white;
        }

        .action-button a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
            width: 100%;
            height: 100%;
            padding: 0 2rem;
        }

        .button-icon {
            min-width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            font-size: 1.8rem;
        }

        .primary .button-icon {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .secondary .button-icon {
            background-color: rgba(108, 99, 255, 0.1);
        }

        .accent .button-icon {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: var(--success-color);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            transform: translateX(200%);
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification-icon {
            margin-right: 12px;
            font-size: 1.2rem;
        }

        .logout {
            background-color: var(--danger-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .main-content {
                padding: 2rem 1.5rem;
            }

            .header h1 {
                font-size: 2rem;
            }

            .action-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <button class="logout" style="padding: 0.5rem 1rem; font-size: 1rem; margin-left: auto;">
                <a href="../../index.php" style="color: inherit; text-decoration: none;">Logout</a>
            </button>
        </div>


        <!-- Main Action Buttons -->
        <h2>Quick Actions</h2>
        <div class="action-buttons">
            <button class="action-button primary">
                <a href="./newReservation.php">
                    <div class="button-icon">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <span>Create New Reservation</span>
                </a>
            </button>

            <button class="action-button secondary">
                <a href="./viewReservation.php">
                    <div class="button-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <span>View Upcoming Reservation</span>
                </a>
            </button>

            <button class="action-button accent">
                <a href="./feedback.php">
                    <div class="button-icon">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <span>Feedback</span>
                </a>
            </button>
        </div>
    </div>

    <!-- Notification component -->
    <div class="notification" id="notification">
        <i class="fas fa-check-circle notification-icon"></i>
        <span id="notification-message">Action completed successfully!</span>
    </div>

    <!-- JavaScript for notification functionality -->
    <script>
        // Show notification function
        function showNotification(message) {
            const notification = document.getElementById('notification');
            const messageEl = document.getElementById('notification-message');

            messageEl.textContent = message;
            notification.classList.add('show');

            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }
    </script>
</body>

</html>