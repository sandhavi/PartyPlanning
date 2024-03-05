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
  //<?php
  //include '../../Template/navbar.php';
  //?>

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

  <div class="key-offerings">
    <div class="div">
      <div class="div-2">
        <div class="div-2">
          <div class="header">
            <div class="logo-header">
              <div class="logo">
                <div class="text-wrapper">PartyPRO</div>
                <div class="pattern"></div>
                <div class="pattern-2"></div>
                <div class="pattern-3"></div>
                <div class="pattern-4"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="menu">
          <!-- <div class="menu-2">
              <div class="text-wrapper-2">Home</div>
              <div class="about">
                <div class="text-wrapper-3">About</div>
                <img class="line" src="img/line-4.svg" alt="new" />
              </div>
              <div class="pages">
                <div class="div-wrapper">
                  <div class="text-wrapper-4">Pricing</div>
                </div>
                <img class="line" src="img/line-4.svg" alt="new" />
              </div>
              <div class="project">
                <div class="text-wrapper-3">My Projects</div>
                <img class="line" src="img/line-4.svg" alt="new" />
              </div>
              <div class="contact">
                <div class="text-wrapper-3">Features</div>
                <img class="line" src="img/line-4.svg" alt="new" />
              </div>
              <div class="contact-2">
                <div class="text-wrapper-3">SignIn</div>
                <img class="line" src="img/line-4.svg" alt="new" />
              </div>
            </div> -->
        </div>
      </div>
      <div class="banner">
        <div class="text">
          <div class="sub-text">
            <div class="pattern-5"></div>
            <div class="text-2">
              <div class="text-wrapper-5">What We Do</div>
            </div>
          </div>
          <div class="text-wrapper-6">Our Key Offerings</div>
        </div>
      </div>
      <div class="overlap">
        <div class="counter">
          <div class="element">
            <div class="text-wrapper-7">6448+</div>
            <div class="text-wrapper-8">Users</div>
          </div>
          <div class="element-2">
            <div class="text-wrapper-9">650+</div>
            <div class="sub-text-2">
              <div class="text-wrapper-10">Ongoing Parties</div>
            </div>
          </div>
          <div class="element-3">
            <div class="text-wrapper-9">7543+</div>
            <div class="sub-text-3">
              <div class="text-wrapper-10">Planned Parties</div>
            </div>
          </div>
          <div class="element-4">
            <div class="text-wrapper-9">653+</div>
            <div class="sub-text-4">
              <div class="text-wrapper-10">Vendors</div>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="text-3">
          <div class="services-wrapper">
            <div class="services">SERVICES</div>
          </div>
          <p class="p">
            Get Control Over Your Business I take your finance to next level
          </p>
        </div>
        <div class="content-2">
          <div class="element-5">
            <div class="content-wrapper">
              <div class="content-3">
                <div class="title">
                  <div class="icon">
                    <div class="overlap-wrapper">
                      <div class="overlap-group">
                        <div class="ellipse"></div>
                        <img class="star" src="img/star-13-5.svg" alt="new" />
                        <img class="polygon" src="img/polygon-1-5.svg" alt="new" />
                        <div class="ellipse-2"></div>
                        <div class="overlap-group-wrapper">
                          <div class="overlap-group-2">
                            <img class="img" src="img/ellipse-12.svg" alt="new" />
                            <img class="vector" src="img/vector-19.svg" alt="new" />
                            <img class="vector-2" src="img/vector-18.svg" alt="new" />
                            <img class="vector-3" src="img/vector-17.svg" alt="new" />
                            <img class="vector-3" src="img/vector-16.svg" alt="new" />
                            <img class="vector-4" src="img/vector-15.svg" alt="new" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-wrapper-11">Event Planning Wizard</div>
                </div>
                <p class="text-wrapper-12">
                  Plan your party seamlessly with our intuitive event planner,
                  complete with customizable options to fit your needs.
                </p>
              </div>
            </div>
            <div class="element-6">
              <div class="content-3">
                <div class="title">
                  <div class="icon-wrapper">
                    <div class="icon-2">
                      <div class="overlap-2">
                        <div class="icon-3">
                          <div class="overlap-group-3">
                            <div class="ellipse-3"></div>
                            <img class="star-2" src="img/star-13-4.svg" alt="new" />
                            <div class="ellipse-4"></div>
                          </div>
                          <img class="polygon-2" src="img/polygon-1-4.svg" alt="new" />
                        </div>
                        <img class="icon-4" src="img/icon-2.png" alt="new" />
                      </div>
                    </div>
                  </div>
                  <div class="text-wrapper-13">Venue Finder</div>
                </div>
                <p class="text-wrapper-14">
                  Explore our curated selection of top-rated venues to find
                  the perfect setting for your celebration.
                </p>
              </div>
            </div>
            <div class="element-7">
              <div class="content-3">
                <div class="title">
                  <div class="icon-5">
                    <div class="icon-6">
                      <div class="div-3">
                        <div class="div-3">
                          <div class="overlap-group-4">
                            <div class="ellipse-5"></div>
                            <div class="ellipse-6"></div>
                          </div>
                          <img class="star-3" src="img/star-13-3.svg" alt="new" />
                          <img class="polygon-3" src="img/polygon-1-3.svg" alt="new" />
                        </div>
                        <img class="icon-7" src="img/icon-1.png" alt="new" />
                      </div>
                      <img class="vector-5" src="img/vector-14.png" alt="new" />
                    </div>
                  </div>
                  <div class="text-wrapper-15">Vendor Marketplace</div>
                </div>
                <p class="text-wrapper-12">
                  Discover a diverse marketplace of trusted vendors for
                  catering, entertainment, and more.
                </p>
              </div>
            </div>
          </div>
          <div class="element-5">
            <div class="content-wrapper">
              <div class="content-3">
                <div class="title">
                  <div class="icon-8">
                    <div class="icon-9">
                      <div class="overlap-group-5">
                        <div class="ellipse-7"></div>
                        <img class="star-4" src="img/star-13-2.svg" alt="new" />
                        <img class="polygon-4" src="img/polygon-1-2.svg" alt="new" />
                        <div class="ellipse-8"></div>
                        <img class="icon-10" src="img/icon.png" alt="new" />
                      </div>
                    </div>
                  </div>
                  <div class="text-wrapper-16">Budget Tracker</div>
                </div>
                <p class="text-wrapper-12">
                  Manage your party expenses effortlessly with our integrated
                  budget tracker, ensuring you stay within budget while still
                  creating an unforgettable event.
                </p>
              </div>
            </div>
            <div class="content-wrapper">
              <div class="content-3">
                <div class="title">
                  <div class="icon-11">
                    <div class="icon-12">
                      <div class="overlap-3">
                        <div class="ellipse-9"></div>
                        <img class="polygon-5" src="img/polygon-1-1.svg" alt="new" />
                        <div class="icon-13">
                          <div class="overlap-group-6">
                            <div class="rectangle"></div>
                            <div class="rectangle-2"></div>
                            <img class="vector-6" src="img/vector-13.svg" alt="new" />
                            <img class="vector-7" src="img/vector-12.svg" alt="new" />
                            <img class="vector-8" src="img/vector-11.svg" alt="new" />
                            <img class="vector-9" src="img/vector-10.svg" alt="new" />
                          </div>
                        </div>
                      </div>
                      <img class="star-5" src="img/star-13-1.svg" alt="new" />
                      <div class="ellipse-10"></div>
                    </div>
                  </div>
                  <div class="text-wrapper-17">RSVP Management</div>
                </div>
                <p class="text-wrapper-12">
                  Easily manage your guest list and track RSVPs in real-time,
                  simplifying communication and coordination with your
                  attendees.
                </p>
              </div>
            </div>
            <div class="element-7">
              <div class="content-3">
                <div class="title">
                  <div class="icon-14">
                    <div class="icon-15">
                      <div class="overlap-4">
                        <div class="ellipse-11"></div>
                        <img class="polygon-6" src="img/polygon-1.svg" alt="new" />
                        <div class="group-wrapper">
                          <div class="group">
                            <div class="overlap-group-7">
                              <div class="rectangle-3"></div>
                              <img class="vector-10" src="img/vector-9.svg" alt="new" />
                              <img class="vector-11" src="img/vector-8.svg" alt="new" />
                              <img class="vector-12" src="img/vector-7.svg" alt="new" />
                              <img class="vector-13" src="img/vector-6.svg" alt="new" />
                              <img class="vector-14" src="img/vector-5.svg" alt="new" />
                              <img class="vector-15" src="img/vector-4.svg" alt="new" />
                              <img class="vector-16" src="img/vector-3.svg" alt="new" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <img class="star-6" src="img/star-13.svg" alt="new" />
                      <div class="ellipse-12"></div>
                    </div>
                  </div>
                  <div class="text-wrapper-16">Custom Themes</div>
                </div>
                <p class="text-wrapper-12">
                  Personalize your party with ease using our selection of
                  customizable themes and decor, allowing you to create a
                  unique atmosphere .
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="overlap-5">
          <div class="background"></div>
          <img class="background-2" src="img/background-1.svg" alt="new" />
          <div class="copyright">
            <img class="line-2" src="img/line.svg" alt="new" />
            <div class="copyright-partypro-wrapper">
              <p class="copyright-partypro">
                <span class="span">Copyright © PartyPRO | Designed by XXX - Powered by
                  XXX.</span>
              </p>
            </div>
          </div>
          <div class="content-4">
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
              <div class="content-5">
                <div class="name">
                  <div class="overlap-group-8">
                  <input 
                            class="text-wrapper-18"
                            placeholder="Email here*"
                      /> 
                  </div>
                </div>
                <button class="button">
                  <button class="button-2">
                  <input type="submit" class="text-wrapper-19" value="Send Now">
                  </button>
                  <a href="https://www.linkedin.com"><img class="follow" src="img/follow.svg" alt="new" /></a>
                </button>
              </div>
            </div>
            <div class="logo-2">
              <div class="text-wrapper">PartyPRO</div>
              <div class="pattern"></div>
              <div class="pattern-2"></div>
              <div class="pattern-3"></div>
              <div class="pattern-4"></div>
            </div>
            <div class="content-6">
              <p class="join-the-partypro">
                Join the PartyPRO community for exclusive tips, inspiration,
                and offers to make your celebrations truly unforgettable.
                Let&#39;s create memories together!
              </p>
              <div class="address">
                <div class="email">
                  <a href="mailto:contact@hvcargologistics.com" target="_blank" rel="noopener noreferrer">
                    <div class="text-wrapper-20">
                      Email<br />contact@partyprocom
                    </div>
                  </a>
                  <div class="icon-16">
                    <div class="vector-wrapper">
                      <img class="vector-17" src="img/vector-1.svg" alt="new" />
                    </div>
                  </div>
                </div>
                <div class="call">
                  <p class="text-wrapper-20">
                    Call Us <br />(00) 112 365 489
                  </p>
                  <div class="icon-16">
                    <img class="vector-18" src="img/vector.svg" alt="new" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <img class="image" src="img/image.png" alt="new" />
        </div>
      </footer>
    </div>
  </div>
</body>

</html>
