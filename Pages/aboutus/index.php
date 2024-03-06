<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    
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
              <div class="div-wrapper"><div class="text-wrapper">What We Do</div></div>
            </div>
            <div class="text-wrapper-2">About Us</div>
          </div>
        </div>
        <div class="div-2">
          <div class="div-2">
            <div class="header">
              <div class="overlap-group">
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
          </div>
          <div class="menu">
            <div class="menu-2">
              <div class="text-wrapper-4"><a href="../Home/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Home</a>
</div>
              <div class="about">
                <div class="text-wrapper-5"><a href="../aboutus/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">About Us</a>
</div>
                <img class="line" src="img/line-1.svg" />
              </div>
              <div class="pages">
                <div class="pages-2"><div class="text-wrapper-6"><a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Pricing</a>
</div></div>
                <img class="line" src="img/line-2.svg" />
              </div>
              <div class="project">
                <div class="text-wrapper-5"><a href="../my projects/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">My Projects</a></div>
                <img class="line" src="img/line-3.svg" />
              </div>
              <div class="contact">
                <div class="text-wrapper-5"><a href="../help/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Help</a>
</div>
                <img class="line" src="img/line-4-1.svg" />
              </div>
              <div class="contact-2">
                <div class="text-wrapper-5"><a href="../Login/Loginuser.php" style="color:aliceblue; font-size:large;  text-decoration: none;">SignIn</a>
</div>
                <img class="line" src="img/line-4.svg" />
              </div>
            </div>
          </div>
        </div>
        <div class="overlap-2">
          <footer class="footer">
            <div class="overlap-3">
              <div class="background"></div>
              <img class="img" src="img/background.svg" />
              <div class="copyright">
                <img class="line-2" src="img/line.svg" />
                <div class="copyright-partypro-wrapper">
                  <p class="copyright-partypro">
                    <span class="span">Copyright © PartyPRO | Designed by XXX - Powered by XXX.</span>
                  </p>
                </div>
              </div>
              <div class="content">
                <div class="about-us-our-team-wrapper">
                  <p class="about-us-our-team"><a href="../aboutus/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">About Us</a> <br />
                    <a href="../Vendors 1/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Our Team</a> <br />
                    <a href="../my projects/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">OurProject</a><br />
                    <a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Pricing</a><br />
                    <a href="../Help/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Contact</a></p>
                </div>
                <div class="subscribe">
                  <div class="content-2">
                    <div class="name">
                      <div class="overlap-group-2"><input 
                        class="text-wrapper-7"
                        placeholder="Email here*"
                  /></div>
                    </div>
                    <button class="button">
                      <button class="button-2"><input type="submit" class="text-wrapper-8" value="Send Now"></button>
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
                    Join the PartyPRO community for exclusive tips, inspiration, and offers to make your celebrations
                    truly unforgettable. Let&#39;s create memories together!
                  </p>
                  <div class="address">
                    <div class="email">
                      <a href="mailto:contact@hvcargologistics.com" target="_blank" rel="noopener noreferrer"
                        ><div class="text-wrapper-9">Email<br />contact@partyprocom</div></a
                      >
                      <div class="icon">
                        <div class="vector-wrapper"><img class="vector" src="img/vector-7.svg" /></div>
                      </div>
                    </div>
                    <div class="call">
                      <p class="text-wrapper-9">Call Us <br />(00) 112 365 489</p>
                      <div class="icon"><img class="vector-2" src="img/vector-6.svg" /></div>
                    </div>
                  </div>
                </div>
              </div>
              <img class="image" src="img/image-4.png" />
            </div>
          </footer>
          <div class="services">
            <div class="element">
              <div class="element-2">
                <div class="sub-content">
                  <div class="text-wrapper-10">Theme Selection</div>
                  <p class="p">
                    Choose from a wide array of themes tailored to your event, ensuring a cohesive and memorable
                    experience.
                  </p>
                </div>
                <button class="button-3">
                  <div class="text-wrapper-11">Read More</div>
                  <img class="vector-3" src="img/vector-5.svg" />
                </button>
              </div>
              <div class="element-2">
                <div class="sub-content">
                  <div class="text-wrapper-10">Venue Sourcing</div>
                  <p class="p">
                    Discover the perfect venue for your celebration, whether it&#39;s a cozy intimate space or a grand
                    ballroom.
                  </p>
                </div>
                <button class="button-3">
                  <div class="text-wrapper-11">Read More</div>
                  <img class="vector-3" src="img/vector-4.svg" />
                </button>
              </div>
              <div class="element-2">
                <div class="sub-content">
                  <div class="text-wrapper-10">Vendor Coordination</div>
                  <p class="p">
                    Extensive network of trusted vendors, from caterers to decorators, ensuring top-notch services for
                    your event.
                  </p>
                </div>
                <button class="button-3">
                  <div class="text-wrapper-11">Read More</div>
                  <img class="vector-3" src="img/vector-3.svg" />
                </button>
              </div>
            </div>
            <div class="element-3">
              <div class="element-2">
                <div class="sub-content">
                  <div class="text-wrapper-10">Budget Management</div>
                  <p class="p">
                    Stay on track with your budget using our intuitive budget management tools and expert financial
                    guidance.
                  </p>
                </div>
                <button class="button-3">
                  <div class="text-wrapper-11">Read More</div>
                  <img class="vector-4" src="img/vector-2.svg" />
                </button>
              </div>
              <div class="content-wrapper">
                <div class="content-4">
                  <div class="sub-content-2">
                    <div class="text-wrapper-12">Personalized Planning</div>
                    <p class="text-wrapper-13">
                      Receive personalized attention and support from our experienced team, guiding you through every
                      step of the planning process.
                    </p>
                  </div>
                  <button class="button-3">
                    <div class="text-wrapper-14">Read More</div>
                    <img class="vector-4" src="img/vector-1.svg" />
                  </button>
                </div>
              </div>
              <div class="element-2">
                <div class="sub-content">
                  <div class="text-wrapper-10">Memorable Experiences</div>
                  <p class="p">
                    Let us handle the details while you focus on creating memories that will ensure a stress-free event.
                  </p>
                </div>
                <button class="button-3">
                  <div class="text-wrapper-11">Read More</div>
                  <img class="vector-4" src="img/vector.svg" />
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="quotes">
          <div class="overlap-4">
            <div class="content-5">
              <div class="text-wrapper-15">“</div>
              <div class="comment">
                <p class="text-wrapper-16">
                  Our mission is to make every event memorable, stress-free, and fun-filled.
                </p>
                <div class="text-wrapper-17">CEO, PartyPRO</div>
              </div>
            </div>
            <img class="pattern-6" src="img/pattern.png" />
          </div>
        </div>
        <div class="overlap-5">
          <div class="heading"><div class="text-wrapper-18">What do we do?</div></div>
          <div class="how-we-work">
            <div class="content-6">
              <div class="heading-2">
                <div class="text-wrapper-19">Why Chose PartyPRO</div>
                <p class="it-is-a-long">
                  It is a long established fact&nbsp;&nbsp;will be distracted.Lorem Ipsum is simply dummy text of the
                  printing and typesetting industry.
                </p>
              </div>
              <div class="works">
                <div class="element-4">
                  <img class="image-2" src="img/image-3.png" />
                  <div class="content-7">
                    <div class="icon-2">
                      <img class="icon-3" src="img/icon-3.svg" />
                      <div class="text-wrapper-20">01</div>
                    </div>
                    <div class="content-8">
                      <div class="text-wrapper-21">Expert Guidance</div>
                      <p class="benefit-from-our">
                        Benefit from our team&#39;s expert guidance and industry insights to bring your party vision to
                        life.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="element-5">
                  <div class="content-9">
                    <div class="icon-4">
                      <img class="icon-5" src="img/icon-2.png" />
                      <div class="text-wrapper-22">02</div>
                    </div>
                    <div class="sub-content-3">
                      <div class="text-wrapper-23">Streamlined Solutions</div>
                      <p class="text-wrapper-24">
                        Enjoy streamlined party planning with our user-friendly platform and intuitive tools.
                      </p>
                    </div>
                  </div>
                  <img class="image-2" src="img/image-2.png" />
                </div>
                <div class="element-4">
                  <img class="image-2" src="img/image-1.png" />
                  <div class="content-10">
                    <div class="icon-6">
                      <img class="icon-7" src="img/icon-1.svg" />
                      <div class="text-wrapper-25">03</div>
                    </div>
                    <div class="sub-content-4">
                      <div class="text-wrapper-26">Curated Inspiration</div>
                      <p class="text-wrapper-27">
                        Access a curated collection of themes, decor ideas, and vendor recommendations to make your
                        event extraordinary.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="element-6">
                  <div class="content-11">
                    <div class="icon-8">
                      <img class="icon-9" src="img/icon.svg" />
                      <div class="text-wrapper-28">04</div>
                    </div>
                    <div class="sub-content-3">
                      <div class="text-wrapper-29">Dedicated Support</div>
                      <p class="text-wrapper-24">
                        Receive dedicated support every step of the way, ensuring your event is seamless and
                        stress-free.
                      </p>
                    </div>
                  </div>
                  <img class="image-2" src="img/image.png" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
