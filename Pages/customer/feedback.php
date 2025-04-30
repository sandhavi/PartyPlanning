<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        :root {
            --primary-color: #3498db;
            --text-color: #333;
            --background-color: #f9f9f9;
            --card-color: #ffffff;
            --error-color: #e74c3c;
            --success-color: #2ecc71;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background-color: var(--card-color);
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            padding: 25px 30px;
            text-align: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .header h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .header p {
            color: #666;
            font-size: 16px;
        }

        .form-container {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 15px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e1e1;
            border-radius: 6px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 20px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .error-message {
            color: var(--error-color);
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        .form-group.error .form-control {
            border-color: var(--error-color);
        }

        .form-group.error .error-message {
            display: block;
        }

        .success-message {
            background-color: var(--success-color);
            color: white;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 20px;
            display: none;
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>We'd Love to Hear From You</h2>
            <p>Send us your feedback, questions, or suggestions</p>
        </div>

        <div class="form-container">
            <div class="success-message" id="successMessage">
                Your feedback has been submitted successfully!
            </div>

            <form id="feedbackForm" action="process.php" method="POST">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name">
                    <small class="error-message">Please enter your name</small>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address">
                    <small class="error-message">Please enter a valid email address</small>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                    <small class="error-message">Please enter a valid phone number</small>
                </div>

                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea class="form-control" id="message" name="message" placeholder="Enter your message"></textarea>
                    <small class="error-message">Please enter your message</small>
                </div>

                <button type="submit" class="btn">Submit Feedback</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('feedbackForm');
            const successMessage = document.getElementById('successMessage');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                if (validateForm()) {
                   
                    const formData = new FormData(form);

                    fetch('process.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                showSuccessMessage();
                                form.reset();
                            } else {
                                alert('There was an error submitting your feedback. Please try again.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                          
                            showSuccessMessage();
                            form.reset();
                        });
                }
            });

            function validateForm() {
                let isValid = true;

                const formGroups = form.querySelectorAll('.form-group');
                formGroups.forEach(group => group.classList.remove('error'));

                const name = document.getElementById('name');
                if (name.value.trim() === '') {
                    setError(name, 'Please enter your name');
                    isValid = false;
                }

                const email = document.getElementById('email');
                if (!isValidEmail(email.value)) {
                    setError(email, 'Please enter a valid email address');
                    isValid = false;
                }

                const phone = document.getElementById('phone');
                if (!isValidPhone(phone.value)) {
                    setError(phone, 'Please enter a valid phone number');
                    isValid = false;
                }

                const message = document.getElementById('message');
                if (message.value.trim() === '') {
                    setError(message, 'Please enter your message');
                    isValid = false;
                }

                return isValid;
            }

            function setError(input, message) {
                const formGroup = input.parentElement;
                const errorMessage = formGroup.querySelector('.error-message');

                formGroup.classList.add('error');
                errorMessage.textContent = message;
            }

            function isValidEmail(email) {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            function isValidPhone(phone) {
             
                const re = /^\+?[0-9\s\-()]{10,}$/;
                return phone.trim() === '' || re.test(phone);
            }

            function showSuccessMessage() {
                successMessage.style.display = 'block';

               
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</body>

</html>