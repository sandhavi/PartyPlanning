<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/x-icon" href="../../Include/favicon-icon.svg">
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
    <div class="add-vendors">
      <div class="div">
        <footer class="footer">
          <div class="overlap">
            <div class="background"></div>
            <img class="img" src="img/background.svg" />
            <div class="copyright">
              <img class="line" src="img/line.svg" />
              <div class="copyright-partypro-wrapper">
                <p class="copyright-partypro">
                  <span class="text-wrapper">Copyright © PartyPRO | Designed by XXX - Powered by XXX.</span>
                </p>
              </div>
            </div>
            <div class="content">
              <div class="pages">
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
                  <div class="name"><input class="overlap-group" placeholder="Email here*" type="email" />
                    </div>
                  <button class="button">
                    <button class="div-wrapper">
                      <input type="submit" class="text-wrapper-2" value="Send Now">
                    </button>
                    
                    <a href="https://www.linkedin.com"><img class="follow" src="img/follow.svg"/></a>
                  </button>
                </div>
              </div>
              <div class="logo">
                <div class="text-wrapper-3">PartyPRO</div>
                <div class="pattern"></div>
                <div class="pattern-2"></div>
                <div class="pattern-3"></div>
                <div class="pattern-4"></div>
              </div>
              <div class="content-3">
                <p class="join-the-partypro">
                  Join the PartyPRO community for exclusive tips, inspiration, and offers to make your celebrations
                  truly unforgettable. Let&#39;s create memories together!
                </p>
                <div class="address">
                  <div class="email">
                    <a
                    href="mailto:contact@hvcargologistics.com"
                    target="_blank"
                    rel="noopener noreferrer"
                    ><div class="email-contact">
                      Email<br />contact@partyprocom
                    </div></a
                  >
                    <div class="icon">
                      <div class="vector-wrapper"><img class="vector" src="img/vector-1.svg" /></div>
                    </div>
                  </div>
                  <div class="call">
                    <p class="call-us">Call Us <br />(00) 112 365 489</p>
                    <div class="icon"><img class="vector-2" src="img/vector.svg" /></div>
                  </div>
                </div>
              </div>
            </div>
            <img class="image" src="img/image.png" />
          </div>
        </footer>
        <div class="div-2">
          <div class="div-2">
            <div class="header">
              <div class="logo-header">
                <div class="logo-2">
                  <div class="text-wrapper-3">PartyPRO</div>
                  <div class="pattern"></div>
                  <div class="pattern-2"></div>
                  <div class="pattern-3"></div>
                  <div class="pattern-4"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="menu">
            <div class="menu-2">
              <div class="text-wrapper-4"><a href="../Home/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Home</a></div>
              <div class="about">
                <div class="text-wrapper-5"><a href="../aboutus/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">About Us</a></div>
                <img class="line-2" src="img/line-4.svg" />
              </div>
              <div class="pages-2">
                <div class="pages-3"><div class="text-wrapper-6"><a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;"><pre> &nbsp;&nbsp; Pricing</pre></a>
</div></div>
                <img class="line-2" src="img/line-4.svg" />
              </div>
              <div class="project">
                <div class="text-wrapper-5"><a href="../my projects/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;"> &nbsp; &nbsp; My Projects</a></div>
                <img class="line-2" src="img/line-4.svg" />
              </div>
              <div class="contact">
                <div class="text-wrapper-5"><a href="../help/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;"> &nbsp; &nbsp; &nbsp;&nbsp; Help</a>
</div>
                <img class="line-2" src="img/line-4.svg" />
              </div>
              <div class="contact-2">
                <div class="text-wrapper-5"><a href="../Login/Loginuser.php" style="color:aliceblue; font-size:large;  text-decoration: none;">SignIn</a>
</div>
                <img class="line-2" src="img/line-4.svg" />
              </div>
            </div>
          </div>
        </div>
        <div class="city">
          <div class="overlap-2">
            
            <select name ="Add Vendors" class="text-wrapper-7">
              <option> Venues</option> 
              <option> Entertainers</option>
              <option> Caters</option> 
              <option selected> Florists</option>
              <option> Event Planners</option>
              </select>
            <img class="keyboard-arrow-down" src="img/keyboard-arrow-down.svg" />
          </div>
          <div class="text-wrapper-8">Type of vendor</div>
          
        </div>
        <div class="email-2">
          <div class="overlap-3">
            
            <input type="email" class="text-wrapper-9" placeholder="shirohanas.business@gmail.com"/>
            <div class="group">
              <div class="overlap-group-2">
                <div class="rectangle"></div>
                <img class="check" src="img/check.svg" />
              </div>
            </div>
          </div>
            <div class="text-wrapper-10">Email</div>
            
        </div>
        <div class="address-2">
          <div class="overlap-4"><input type="text" name="address"  class="text-wrapper-11"placeholder="6/7, Ward Place, Colombo 00700"></div>
          <div class="text-wrapper-12">Address</div>
        </div>
        <div class="address-3">
          <div class="overlap-4"><div class="text-wrapper-11">
            <input type="text" name="contact" placeholder="0963689743"></div></div>
          <div class="text-wrapper-12">Contact Number</div>
        </div>
        <div class="lastname">
          <div class="overlap-5"><div class="text-wrapper-13"><input type="text" name="company" placeholder="Shirohanas"></div></div>
          <div class="text-wrapper-14">Company Name</div>
        </div>
        <div class="overlap-wrapper">
          <div class="overlap-6">
            
            
            <input type="submit" class="text-wrapper-15" value="Update">
          </div>
        </div>
        <div class="overlap-group-wrapper">
          <div class="overlap-7">
            <input type="submit" class="text-wrapper-15" value="Save">
            
          </div>
        </div>
        <div class="text-wrapper-17">Add Vendors</div>
      </div>
    </div>
  </body>
</html>
