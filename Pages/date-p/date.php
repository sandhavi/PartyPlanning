<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reservation Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #FDEEEE;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.5s ease-out;
        }

        label {
            font-weight: 700;
            margin-top: 20px;
        }

        input[type=date],
        input[type=time],
        input[type=number] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group i {
            position: absolute;
            top: 35px;
            left: 10px;
            color: #007bff;
        }

        input[type=date],
        input[type=time],
        input[type=number] {
            padding-left: 30px;
           
        }
    </style>
</head>

<body>

    <form action="saveDate.php" method="POST">
        <h2>Make a Reservation</h2>
        <div class="form-group">
            <label for="date"><i class="fas fa-calendar-alt"></i> Date:</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time"><i class="fas fa-clock"></i> Time:</label>
            <input type="time" id="time" name="time" required>
        </div>
        <div class="form-group">
            <label for="no_guests"><i class="fas fa-users"></i> Number of Guests:</label>
            <input type="number" id="no_guests" name="no_guests" required>
        </div>
        <button type="submit">Reserve</button>
    </form>
</body>

</html>