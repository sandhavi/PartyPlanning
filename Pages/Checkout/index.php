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

    <div class="checkout">
      <div class="div">
        <div class="overlap">
          <div class="rectangle"></div>
          <div class="rectangle-2"></div>
          <div class="text-wrapper">Payment options</div>
          <div class="frame">
            <div class="text-wrapper-2">Email address</div>
          </div>
          <div class="div-wrapper">
            <div class="text-wrapper-2">Email address</div>
          </div>
          <div class="frame-2">
            <div class="text-wrapper-2">Email address</div>
          </div>
          <div class="frame-3">
            <div class="text-wrapper-2">Email address</div>
          </div>
          <div class="frame-4">
            <div class="text-wrapper-3">Month</div>
            <img class="arrow-down" src="img/arrow-down-1.svg" alt="new" />
          </div>
          <div class="frame-5">
            <div class="text-wrapper-3">Year</div>
            <img class="arrow-down" src="img/arrow-down-1.svg" alt="new" />
          </div>
          <div class="text-wrapper-4">Name on card</div>
          <div class="text-wrapper-5">Debit/Credit card number</div>
          <div class="text-wrapper-6">Security Code</div>
          <div class="text-wrapper-7">Billing Zip code</div>
          <div class="text-wrapper-8">Expiration Date</div>
          <img class="img" src="img/card-tick-1.svg" alt="new" />
          <div class="rectangle-3"></div>
          <div class="frame-6">
            <div class="frame-7">
              <div class="frame-8">
                <div class="text-wrapper-9">Debit/Credit Card</div>
              </div>
              <div class="rectangle-4"></div>
            </div>
            <div class="frame-7">
              <div class="frame-8">
                <div class="text-wrapper-9">Paypal</div>
              </div>
              <div class="rectangle-5"></div>
            </div>
            <div class="frame-7">
              <div class="frame-8">
                <div class="text-wrapper-9">Bank transfer</div>
              </div>
              <div class="rectangle-5"></div>
            </div>
          </div>
          <div class="rectangle-6"></div>
          <div class="rectangle-7"></div>
          <div class="rectangle-8"></div>
          <div class="rectangle-9"></div>
          <img class="image" src="img/image-6.png" alt="new" />
          <img class="image-2" src="img/image-7.png" alt="new" />
          <img class="image-3" src="img/image-8.png" alt="new" />
          <img class="image-4" src="img/image-10.png" alt="new" />
        </div>
        <div class="overlap-group">
          <div class="rectangle-10"></div>
          <div class="rectangle-11"></div>
          <p class="p">Important information about your booking</p>
          <p class="by-clicking-the">
            <span class="span"
              >By clicking the button below, I acknowledge that I have reviewed
              the
            </span>
            <span class="text-wrapper-10">Privacy Statement</span>
            <span class="span"> and have reviewd and accept the </span>
            <span class="text-wrapper-10">Rules and Restrictions</span>
            <span class="span"> and</span>
            <span class="text-wrapper-10"> Terms of Use</span>
            <span class="span">.</span>
          </p>
          <p class="text-wrapper-11">
            We use secure transmission and encrypted storage to protect your
            personal information
          </p>
          <img class="lock-circle" src="img/lock-circle-1.svg" alt="new" />
          <div class="frame-9">
            <div class="text-wrapper-12"><a href="" style="color:aliceblue; font-size:large;  text-decoration: none;">Complete Booking</a></div>
          </div>
          <footer class="footer">
            <div class="overlap-2">
              <div class="background"></div>
              <img class="background-2" src="img/background.svg" alt="new" />
              <div class="copyright">
                <img class="line" src="img/line.svg" alt="new" />
                <div class="copyright-partypro-wrapper">
                  <p class="copyright-partypro">
                    <span class="text-wrapper-13"
                      >Copyright © PartyPRO | Designed by XXX - Powered by
                      XXX.</span
                    >
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
                    <div class="name">
                      <div class="overlap-group-2">
                        
                        <input 
                            class="text-wrapper-14"
                            placeholder="Email here*"
                      /> 
                    
                      </div>
                    </div>
                    <button class="button">
                      <button class="button-2">
                        
                        <input type="submit" class="text-wrapper-15" value="Send Now">
                      </button>
                      <a href="https://www.linkedin.com"><img class="follow" src="img/follow.svg" alt="new" /></a>
                    </button>
                  </div>
                </div>
                <div class="logo">
                  <div class="text-wrapper-16">PartyPRO</div>
                  <div class="pattern"></div>
                  <div class="pattern-2"></div>
                  <div class="pattern-3"></div>
                  <div class="pattern-4"></div>
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
                        ><div class="text-wrapper-17">
                          Email<br />contact@partyprocom
                        </div></a
                      >
                      <div class="icon">
                        <div class="vector-wrapper">
                          <img
                            class="vector"
                            src="img/vector-1.svg"
                            alt="new"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="call">
                      <p class="text-wrapper-17">
                        Call Us <br />(00) 112 365 489
                      </p>
                      <div class="icon">
                        <img class="vector-2" src="img/vector.svg" alt="new" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <img class="image-5" src="img/image.png" alt="new" />
            </div>
          </footer>
        </div>
        <div class="div-2">
          <div class="rectangle-12"></div>
          <div class="div-2">
            <div class="overlap-group-3">
              <div class="header">
                <div class="logo-header">
                  <div class="logo-2">
                    <div class="text-wrapper-16">PartyPRO</div>
                    <div class="pattern"></div>
                    <div class="pattern-2"></div>
                    <div class="pattern-3"></div>
                    <div class="pattern-4"></div>
                  </div>
                </div>
              </div>
              <div class="menu">
                <div class="menu-2">
                  <div class="text-wrapper-18"><a href="../Home/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Home</a></div>
                  <div class="about">
                    <div class="text-wrapper-19"><a href="../aboutus/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">About Us</a></div>
                    <img class="line-2" src="img/line-4.svg" alt="new" />
                  </div>
                  <div class="pages-2">
                    <div class="pages-3">
                      <div class="text-wrapper-20"><a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Pricing</a></div>
                    </div>
                    <img class="line-2" src="img/line-4.svg" alt="new" />
                  </div>
                  <div class="project">
                    <div class="text-wrapper-19"><a href="../my projects/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">My Projects</a></div>
                    <img class="line-2" src="img/line-4.svg" alt="new" />
                  </div>
                  <div class="contact">
                    <div class="text-wrapper-19"><a href="../Login/Loginuser.php" style="color:aliceblue; font-size:large;  text-decoration: none;">SignIn</a></div>
                    <img class="line-2" src="img/line-4.svg" alt="new" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-wrapper-21">Secure your reservation</div>
        <div class="overlap-3">
          <p class="check-the-latest">
            <span class="text-wrapper-22"
              >Check the latest COVID-19 restrictions before you travel.
            </span>
            <span class="text-wrapper-23">Learn more</span>
          </p>
          <img class="danger" src="img/danger-1.svg" alt="new" />
        </div>
        <div class="overlap-4">
          <div class="overlap-5">
            <div class="text-wrapper-24">Basic</div>
            <img class="img" src="img/security-user-1.svg" alt="new" />
            <div class="text-wrapper-25">(Three Months)</div>
          </div>
          <div class="frame-10">
            <div class="text-wrapper-2">Email address</div>
          </div>
          <div class="frame-11">
            <img class="image-6" src="img/image-5.png" alt="new" />
            <div class="text-wrapper-26">+61</div>
            <img class="arrow-down" src="img/arrow-down-1-2.svg" alt="new" />
          </div>
          <div class="frame-12">
            <div class="text-wrapper-2">Email address</div>
          </div>
          <div class="frame-13">
            <div class="text-wrapper-2">Email address</div>
          </div>
          <div class="text-wrapper-27">First name</div>
          <div class="text-wrapper-28">Mobile number</div>
          <div class="text-wrapper-29">Last name</div>
          <div class="rectangle-13"></div>
          <p class="text-wrapper-30">Receive text alerts about this trip.</p>
        </div>
        <div class="overlap-6">
          <img class="rectangle-14" src="img/rectangle-68.png" alt="new" />
          <div class="non-refundable-wrapper">
            <div class="non-refundable">&nbsp;&nbsp; Non refundable</div>
          </div>
          <div class="text-wrapper-31">Basic</div>
          <div class="group">
            <div class="text-wrapper-32">4.5 (1200 Reviews)</div>
            <img class="group-2" src="img/group-5.png" alt="new" />
          </div>
        </div>
        <div class="overlap-7">
          <div class="frame-14">
            <div class="text-wrapper-33">Price Details</div>
          </div>
          <div class="text-wrapper-34">Total</div>
          <div class="text-wrapper-35">Basic (3 months)</div>
          <div class="text-wrapper-36">$ 39.00</div>
          <div class="text-wrapper-37">$39</div>
          <p class="text-wrapper-38">
            Use a coupon, credit or promotional code
          </p>
          <img class="vector-3" src="img/vector-2-1.svg" alt="new" />
          <div class="frame-15">
            <div class="text-wrapper-2">Email address</div>
          </div>
          <div class="text-wrapper-39">Coupon code</div>
          <div class="frame-16">
            <div class="text-wrapper-12">Apply Coupon</div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
