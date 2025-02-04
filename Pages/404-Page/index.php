<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="icon" type="image/x-icon" href="../../Include/favicon-icon.svg">
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style.css" />


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  </head>
  <body>
<?php
session_start();

if (isset($_SESSION['id'])) {
    include '../../Include/connectin.php';
    $userId = $_SESSION['id'];
    $sql = "SELECT name FROM customer WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
        $userName = $row['name'];
    } else {
        
        $userName = "Log In";
    }
    $conn->close();
} else {
    $userName = "Log In";
}
?>
    <div class="element">
      <div class="overlap-wrapper">
        <div class="overlap">
          <img class="background" src="img/background.png" alt="new" />
          <img class="banner" src="img/banner.png" alt="new" />
          <div class="header">
            <div class="overlap-group">
              <div class="logo-header-wrapper">
                <div class="logo-header">
                  <div class="logo">
                    <div class="text-wrapper">PartyPRO</div>
                    <div class="pattern"></div>
                    <div class="div"></div>
                    <div class="pattern-2"></div>
                    <div class="pattern-3"></div>
                  </div>
                </div>
              </div>
              <div class="menu">
                <div class="menu-2">
                  <div class="text-wrapper-2"><a href="../Home/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;"> Home </a></div>
                  <div class="about">
                    <div class="text-wrapper-3"><a href="../aboutus/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">
                    About Us
                </a></div>
                    <img class="line" src="img/line-4.svg" alt="new" />
                  </div>
                  <div class="pages">
                    <div class="div-wrapper">
                      <div class="text-wrapper-4"><a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">
                  Pricing
                </a></div>
                    </div>
                    <img class="line" src="img/line-4.svg" alt="new" />
                  </div>
                  <div class="project">

                    <div class="text-wrapper-3"><a href="../Help/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">
                    Help
                </a></div>
                    <img class="line" src="img/line-4.svg" alt="new" />
                  </div>

                  <div class="contact">
                    <div class="text-wrapper-3"><a href="../Login/Loginuser.php" style="color:aliceblue; font-size:large;  text-decoration: none;">SignIn</a></div>
                    <img class="line" src="img/line-4.svg" alt="new" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
