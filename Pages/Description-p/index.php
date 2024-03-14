<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Description Box</title>
    <style>
    
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }

    
        .description-box {
            width: 300px; 
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

      
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            font-size: large;
            border-radius: 4px;
            width: calc(100% - 22px); 
            height: 100px; 
            resize: vertical;
        }

    
        button {
            padding: 10px;
            background-color: #9C55BA;
            color: white;
            border: none;
            width:auto;
            font-size: large;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #560743;
        }

     
    </style>
</head>
<body>

<div class="description-box">
<form action="savedes.php" method="POST">
    <h1>Tell me more about your function. Anything additional things we need to know?</h1>
    <textarea id="description" name="description" placeholder="Add a description..."></textarea>
    <button onclick="goToNextPage()">Next</button>
    </form>
    
</div>

<script>
    function goToNextPage() {
        window.location.href = '#';
    }
</script>

</body>
</html>
