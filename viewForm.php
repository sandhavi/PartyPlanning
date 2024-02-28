<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data</title>
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

        .delete-btn,
        .update-btn {
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <?php
    // Include the database connection file
    include './Include/connectin.php';

    // Process delete form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_form'])) {
        $deleteFormId = $_POST['delete_form_id'];

        $deleteSql = "DELETE FROM form WHERE id = $deleteFormId";

        if ($conn->query($deleteSql) === TRUE) {
            $deleteMessage = 'Row Deleted Successfully';
        } else {
            $deleteMessage = 'Error deleting record: ' . $conn->error;
        }
    }

    // Query the database for form data
    $formSql = "SELECT * FROM form";
    $formResult = $conn->query($formSql);

    // Process the results
    $formRows = array();
    if ($formResult->num_rows > 0) {
        while ($formRow = $formResult->fetch_assoc()) {
            $formRows[] = $formRow;
        }
    }

    // Close the connection
    $conn->close();
    ?>

    <h2>Form Data</h2>
    <?php if (!empty($formRows)) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Message</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Customer ID</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($formRows as $formRow) : ?>
                <tr>
                    <td><?php echo $formRow['id']; ?></td>
                    <td><?php echo $formRow['name']; ?></td>
                    <td><?php echo $formRow['message']; ?></td>
                    <td><?php echo $formRow['p_numeber']; ?></td>
                    <td><?php echo $formRow['email']; ?></td>
                    <td><?php echo $formRow['customer_id']; ?></td>
                    <td>
                        <!-- Delete button with onclick event to delete row -->
                        <button class="delete-btn" onclick="deleteFormRow(<?php echo $formRow['id']; ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>

    <!-- JavaScript code for handling delete and update actions -->
    <script>
        function deleteFormRow(formId) {
            if (confirm('Are you sure you want to delete this row?')) {
                // Create a form dynamically to submit the delete action
                var deleteForm = document.createElement('form');
                deleteForm.method = 'post';
                deleteForm.action = '<?php echo $_SERVER['PHP_SELF']; ?>';

                // Create an input field for form ID
                var formIdInput = document.createElement('input');
                formIdInput.type = 'hidden';
                formIdInput.name = 'delete_form_id';
                formIdInput.value = formId;

                // Create a submit button
                var submitBtn = document.createElement('button');
                submitBtn.type = 'submit';
                submitBtn.name = 'delete_form';
                submitBtn.style.display = 'none'; // Hide the button
                deleteForm.appendChild(formIdInput);
                deleteForm.appendChild(submitBtn);

                // Append the form to the body and submit it
                document.body.appendChild(deleteForm);
                submitBtn.click();
            }
        }
    </script>
</body>

</html>