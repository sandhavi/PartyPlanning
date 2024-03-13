<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Back Button</title>
    <style>
        .go-back-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }

        .go-back-btn:hover {
            background-color: #2980b9;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    $previousPage = "javascript:goBack()";
    ?>
    <a href="<?= $previousPage ?>" class="go-back-btn">&#x2190; Back</a>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>