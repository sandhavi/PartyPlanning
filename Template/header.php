<html>

<head>
    <link rel="stylesheet" href="../Pages/HomePage-Ordinary_User/index.css" />
    <link rel="stylesheet" href="../Pages/HomePage-Ordinary_User/global.css"" />
    <link rel=" stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,500;0,600;1,500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Post No Bills Jaffna Light:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=League Spartan:wght@400&display=swap" />
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION['id'])) {
        include '../Include/connectin.php';
        $userId = $_SESSION['id'];
        $sql = "SELECT name FROM customer WHERE id = $userId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User found, get the name
            $row = $result->fetch_assoc();
            $userName = $row['name'];
        } else {
            // User not found, set a default name
            $userName = "Log In";
        }
        $conn->close();
    } else {
        $userName = "Log In";
    }
    ?>

    <header class="header">
        <img class="background-icon" alt="" src="./public/background.svg" alt="new" />

        <div class="rectangle">
            <div class="pattern">
                <div class="pattern-parent">
                    <div class="pattern1"></div>
                    <div class="pattern2"></div>
                    <div class="pattern3"></div>
                    <div class="pattern4"></div>
                </div>
            </div>
            <h2 class="partypro">PartyPRO</h2>
        </div>
        <div class="line">
            <div class="home">
                <a href="../HomePage-Ordinary_User/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">
                    Home
                </a>
            </div>
            <div class="icon"></div>
            <div class="about">
                <a href="../about us/index.html" style="color:aliceblue; font-size:large;  text-decoration: none;">
                    About
                </a>
            </div>
            <div class="icon1"></div>
            <div class="email">
                <div class="pricing">
                    <a href="../Pricing/index.html" style="color:aliceblue; font-size:large;  text-decoration: none;">
                        Pricing
                    </a>
                </div>
            </div>
            <div class="icon2"></div>
            <div class="my-projects">
                <a href="../my projects/index.html" style="color:aliceblue; font-size:large;  text-decoration: none;">
                    My Projects
                </a>
            </div>
            <div class="icon3"></div>
            <div class="features">Features</div>
            <div class="icon4"></div>
            <div class="user-welcome">
                <a href="../userprofile_new/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">
                    <?php echo $userName; ?>
                </a>
            </div>
        </div>
    </header>
</body>

</html>