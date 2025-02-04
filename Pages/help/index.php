<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width = 1" />
  <link rel="icon" type="image/x-icon" href="../../Include/favicon-icon.svg">
  <link rel="stylesheet" href="globals.css" />
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
  <div class="help">
    <div class="div">
      <div class="header">
        <div class="overlap">
          <div class="header">
            <div class="overlap-group">
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
            <div class="menu-2">
              <div class="text-wrapper-2"><a href="../Home/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Home</a></div>
              <div class="about">
                <div class="text-wrapper-3"><a href="../aboutus/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">About Us</a></div>
                <img class="line" src="img/line-4-1.svg" alt="new" />
              </div>
              <div class="pages">
                <div class="div-wrapper">
                  <div class="text-wrapper-4"><a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Pricing</a></div>
                </div>
                <img class="line" src="img/line-4-1.svg" alt="new" />
              </div>
              <div class="project">
                <div class="text-wrapper-3"><a href="../theme-p/displayBoxes.php" style="color:aliceblue; font-size:large;  text-decoration: none;">My Projects</a></div>
                <img class="line" src="img/line-4-1.svg" alt="new" />
              </div>
              <div class="contact">
                <div class="text-wrapper-3"><a href="../Login/Loginuser.php" style="color:aliceblue; font-size:large;  text-decoration: none;">SignIn</a></div>
                <img class="line" src="img/line-4-1.svg" alt="new" />
              </div>
            </div>
            <div class="text"></div>
          </div>
        </div>
      </div>
      <div class="how-can-we-help-wrapper">
        <p class="how-can-we-help">How can we help ?</p>
      </div>
      <div class="qustions">
        <div class="faq">
          <div class="div-wrapper-2">
            <div class="text-wrapper-5">Project related questions</div>
          </div>
          <div class="div-2">
            <img class="image" src="img/image-2.png" alt="new" />
            <div class="content">
              <div class="element">
                <div class="title">
                  <div class="name">
                    <p class="p">
                      How can I involve my guests in the party <br />planning
                      process?
                    </p>
                  </div>
                  <img class="img" src="img/5.png" alt="new" />
                </div>
                <img class="line-2" src="img/line-7.svg" alt="new" />
              </div>
              <div class="element-2">
                <div class="content-2">
                  <div class="title-2">
                    <div class="name-2">
                      <p class="text-wrapper-6">
                        How do I start planning my party?
                      </p>
                    </div>
                    <img class="img-2" src="img/8.png" alt="new" />
                  </div>
                  <p class="text-wrapper-7">
                    We recommend starting by determining the date, budget, and
                    approximate number of guests. From there, you can begin
                    selecting a theme, venue, and vendors.
                  </p>
                </div>
                <img class="line-2" src="img/line-7.svg" alt="new" />
              </div>
              <div class="element">
                <div class="title-3">
                  <div class="what-are-the-key-wrapper">
                    <p class="p">
                      What are the key elements to consider <br />when
                      planning a party?
                    </p>
                  </div>
                  <img class="img-3" src="img/5.png" alt="new" />
                </div>
                <img class="line-2" src="img/line-7.svg" alt="new" />
              </div>
              <div class="element-3">
                <div class="title-4">
                  <div class="what-are-some-cost-wrapper">
                    <p class="p">
                      What are some cost-effective ways to <br />decorate for
                      my party?
                    </p>
                  </div>
                  <img class="img-4" src="img/5.png" alt="new" />
                </div>
                <img class="line-2" src="img/line-7.svg" alt="new" />
              </div>
              <div class="element-3">
                <div class="title-5">
                  <p class="text-wrapper-8">
                    What are some fun and interactive activities <br />I can
                    incorporate?
                  </p>
                  <img class="img-5" src="img/5.png" alt="new" />
                </div>
                <img class="line-2" src="img/line-7.svg" alt="new" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="head">
        <div class="text-wrapper-5">Need more help?</div>
      </div>
      <div class="faq-wrapper">
        <div class="faq">
          <div class="div-wrapper-2">
            <div class="text-wrapper-5">Every Question Answered</div>
          </div>
          <div class="div-2">
            <div class="content">
              <div class="element">
                <div class="title-6">
                  <div class="how-far-in-advance-wrapper">
                    <p class="p">
                      How far in advance should I book your service <br />for
                      my event?
                    </p>
                  </div>
                  <img class="img-6" src="img/2x.png" alt="new" />
                </div>
                <img class="line-2" src="img/line-2.svg" alt="new" />
              </div>
              <div class="element-2">
                <div class="content-2">
                  <div class="title-7">
                    <div class="name-3">
                      <p class="text-wrapper-9">
                        What types of events do you specialize in planning?
                      </p>
                    </div>
                    <img class="img-7" src="img/3.png" alt="new" />
                  </div>
                  <p class="text-wrapper-7">
                    We specialize in planning a wide range of events,
                    including weddings, birthday parties, corporate events,
                    anniversaries, and more. Our experienced team can tailor
                    our services to meet the specific needs and preferences of
                    any type of event.
                  </p>
                </div>
                <img class="line-2" src="img/line-2.svg" alt="new" />
              </div>
              <div class="element">
                <div class="title-8">
                  <div class="how-involved-will-i-wrapper">
                    <p class="p">
                      How involved will I need to be in the <br />planning
                      process?
                    </p>
                  </div>
                  <img class="img-8" src="img/2x.png" alt="new" />
                </div>
                <img class="line-2" src="img/line-2.svg" alt="new" />
              </div>
              <div class="element-3">
                <div class="title-9">
                  <div class="what-types-of-wrapper">
                    <p class="p">
                      What types of packages do you offer, and what
                      <br />services are included?
                    </p>
                  </div>
                  <img class="img-9" src="img/2x.png" alt="new" />
                </div>
                <img class="line-2" src="img/line-2.svg" alt="new" />
              </div>
              <div class="element-3">
                <div class="title-10">
                  <p class="text-wrapper-8">
                    What is your policy on cancellations or <br />rescheduling
                    of events?
                  </p>
                  <img class="img-8" src="img/2x.png" alt="new" />
                </div>
                <img class="line-2" src="img/line-2.svg" alt="new" />
              </div>
            </div>
            <img class="image" src="img/image-1.png" alt="new" />
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="overlap-2">
          <div class="background"></div>
          <img class="background-2" src="img/background-1.svg" alt="new" />
          <div class="copyright">
            <img class="line-3" src="img/line.svg" alt="new" />
            <div class="copyright-partypro-wrapper">
              <p class="copyright-partypro">
                <span class="span">USCS | GROUP 22 IS BATCH 20</span>
              </p>
            </div>
          </div>
          <div class="content-3">
            <div class="about-us-our-team-wrapper">
              <p class="about-us-our-team">
                <a href="../aboutus/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">About Us</a> <br />
                <a href="../Vendors 1/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Our Team</a> <br />
                <a href="../my projects/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">OurProject</a><br />
                <a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Pricing</a><br />
                <a href="../Help/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Contact</a>
              </p>
            </div>
            <div class="subscribe">
              <div class="content-4">
                <div class="overlap-group-wrapper">
                  <div class="overlap-group-2">
                    <input class="text-wrapper-10" placeholder="Email here*" />
                  </div>
                </div>
                <button class="button">
                  <button class="button-2">
                    <input type="submit" class="text-wrapper-11" value="Send Now">
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
            <div class="content-5">
              <p class="join-the-partypro">
                Join the PartyPRO community for exclusive tips, inspiration,
                and offers to make your celebrations truly unforgettable.
                Let&#39;s create memories together!
              </p>
              <div class="address">
                <div class="email">
                  <a href="mailto:contact@hvcargologistics.com" target="_blank" rel="noopener noreferrer">
                    <div class="text-wrapper-12">
                      Email<br />contact@partyprocom
                    </div>
                  </a>
                  <div class="icon">
                    <div class="vector-wrapper">
                      <img class="vector" src="img/vector-1.svg" alt="new" />
                    </div>
                  </div>
                </div>
                <div class="call">
                  <p class="text-wrapper-12">
                    Call Us <br />(00) 112 365 489
                  </p>
                  <div class="icon">
                    <img class="vector-2" src="img/vector.svg" alt="new" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <img class="image-2" src="img/image.png" alt="new" />
        </div>
      </footer>
      <div class="form-wrapper">
        <div class="form">
          <div class="content-6">
            <div class="title-wrapper">
              <div class="title-11">
                <div class="sub-text">
                  <div class="pattern-5"></div>
                  <div class="contact-2">
                    <div class="text-wrapper-13">Contact</div>
                  </div>
                </div>
                <p class="text-wrapper-14">Get in touch with us</p>
              </div>
            </div>
            <div class="mail">
              <div class="icon-2">
                <div class="vector-wrapper">
                  <img class="vector" src="img/vector-1.svg" alt="new" />
                </div>
              </div>
              <a href="mailto:contact@hvcargologistics.com" target="_blank" rel="noopener noreferrer">
                <div class="email-contact">
                  Email<br />contact@partypro.com
                </div>
              </a>
            </div>
            <div class="call-2">
              <div class="icon-2">
                <img class="vector-2" src="img/vector.svg" alt="new" />
              </div>
              <p class="call-us">Call Us <br />(00) 112 365 489</p>
            </div>
          </div>
          <div class="form-2">
            <div class="form-3">
              <div class="element-4">
                <div class="overlap-group-wrapper-2">
                  <div class="overlap-group-3">
                    <input type="text" class="text-wrapper-15" placeholder="Your name*" />
                  </div>
                </div>
                <div class="overlap-wrapper">
                  <div class="overlap-group-3">

                    <input type="text" class="text-wrapper-16" placeholder="Email*" />
                  </div>
                </div>
              </div>
              <div class="element-4">
                <div class="overlap-group-wrapper-2">
                  <div class="overlap-group-3">

                    <input type="text" class="text-wrapper-15" placeholder="Phone Number*" />
                  </div>
                </div>
                <div class="overlap-wrapper">
                  <div class="overlap-group-3">

                    <input type="text" class="text-wrapper-16" placeholder="Country*" />
                  </div>
                </div>
              </div>
              <div class="element-5">
                <div class="message">
                  <div class="overlap-group-4">

                    <input type="text" class="text-wrapper-17" placeholder="Your Message" />
                  </div>
                </div>
                <button class="button-3">
                  <div class="text-wrapper-11"></div>
                  <input type="submit" class="text-wrapper-11" value="Submit Message" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
