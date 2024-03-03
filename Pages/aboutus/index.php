<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="icon" type="image/x-icon" href="../../Include/favicon-icon.svg">
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style.css" />
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

    <div class="about-us">
      <div class="div">
        <div class="overlap">
          <div class="text">
            <div class="sub-text">
              <div class="pattern"></div>
              <div class="div-wrapper">
                <div class="text-wrapper">What We Do</div>
              </div>
            </div>
            <div class="text-wrapper-2">About Us</div>
          </div>
        </div>
        <div class="div-2">
          <div class="div-2">
            <div class="header">
              <div class="logo-header">
                <div class="logo">
                  <div class="text-wrapper-3">PartyPRO</div>
                  <div class="pattern-2"></div>
                  <div class="pattern-3"></div>
                  <div class="pattern-4"></div>
                  <div class="pattern-5"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="menu">
            <div class="menu-2">
              <div class="text-wrapper-4"><a href="../Home/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Home</a>
</div>
              <div class="about">
                <div class="text-wrapper-5"><a href="./index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">About Us</a></div>
                <img class="line" src="img/line-4-1.svg" alt="new" />
              </div>
              <div class="pages">
                <div class="pages-2">
                  <div class="text-wrapper-4"><a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Pricing</a></div>
                </div>
                <img class="line" src="img/line-4-1.svg" alt="new" />
              </div>
              <div class="project">
                <div class="text-wrapper-5"><a href="../my projects/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">My Projects</a></div>
                <img class="line" src="img/line-4-1.svg" alt="new" />
              </div>
              <div class="contact">
                <div class="text-wrapper-5"><a href="../Key Offerings/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Features</a></div>
                <img class="line" src="img/line-4-1.svg" alt="new" />
              </div>
<div class="contact-2">
                <div class="text-wrapper-5"><a href="../help/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Help</a></div>
                <img class="line" src="img/line-4-1.svg" alt="new" />
              </div>
              <div class="contact-2">
                <div class="text-wrapper-5"><a href="../Login/Loginuser.php" style="color:aliceblue; font-size:large;  text-decoration: none;">SignIn</a></div>
                <img class="line" src="img/line-4-1.svg" alt="new" />
              </div>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class="overlap-group">
            <div class="background"></div>
            <img class="img" src="img/background-1.svg" alt="new" />
            <div class="copyright">
              <img class="line-2" src="img/line.svg" alt="new" />
              <div class="copyright-partypro-wrapper">
                <p class="copyright-partypro">
                  <span class="span"
                    >Copyright © PartyPRO | Designed by XXX - Powered by
                    XXX.</span
                  >
                </p>
              </div>
            </div>
            <div class="content">
              <div class="about-us-our-team-wrapper">
                <p class="about-us-our-team">
                  <a href="../about us/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">About Us</a> <br />
                  <a href="../Vendors 1/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Our Team</a> <br />
                  <a href="../my projects/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">OurProject</a><br />
                  <a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Pricing</a><br />
                  <a href="../Help/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Contact</a>
                
                </p>
              </div>
              <div class="subscribe">
                <div class="content-2">
                  <div class="name">
                    <div class="overlap-group-2">
                      
                      <input 
                            class="text-wrapper-7"
                            placeholder="Email here*"
                      /> 
                    </div>
                  </div>
                  <button class="button">
                    <button class="button-2">
                      
                      <input type="submit" class="text-wrapper-8" value="Send Now">
                    </button>
                     <a href="https://www.linkedin.com"><img class="follow" src="img/follow.svg" alt="new" /></a>
                  </button>
                </div>
              </div>
              <div class="logo-2">
                <div class="text-wrapper-3">PartyPRO</div>
                <div class="pattern-2"></div>
                <div class="pattern-3"></div>
                <div class="pattern-4"></div>
                <div class="pattern-5"></div>
              </div>
              <div class="content-3">
                <p class="join-the-partypro">
                  Join the PartyPRO community for exclusive tips, inspiration,
                  and offers to make your celebrations truly unforgettable.
                  Let&#39;s create memories together!
                </p>
                <div class="address">
                  <div class="email">
                    <a
                      href="mailto:contact@hvcargologistics.com"
                      target="_blank"
                      rel="noopener noreferrer"
                      ><div class="text-wrapper-9">
                        Email<br />contact@partyprocom
                      </div></a
                    >
                    <div class="icon">
                      <div class="vector-wrapper">
                        <img class="vector" src="img/vector-1.svg" alt="new" />
                      </div>
                    </div>
                  </div>
                  <div class="call">
                    <p class="text-wrapper-9">Call Us <br />(00) 112 365 489</p>
                    <div class="icon">
                      <img class="vector-2" src="img/vector-2.svg" alt="new" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <img class="image" src="img/image.png" alt="new" />
          </div>
        </footer>
        <div class="quotes">
          <div class="overlap-2">
            <div class="content-4">
              <div class="text-wrapper-10">“</div>
              <div class="comment">
                <p class="p">
                  Our mission is to make every event memorable, stress-free, and
                  fun-filled.
                </p>
                <div class="text-wrapper-11">CEO, PartyPRO</div>
              </div>
            </div>
            <img class="pattern-6" src="img/pattern.png" alt="new" />
          </div>
        </div>
        <div class="heading">
          <div class="text-wrapper-12">What do we do?</div>
        </div>
      </div>
    </div>
  </body>
</html>
