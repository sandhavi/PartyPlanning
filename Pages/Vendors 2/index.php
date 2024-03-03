<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="icon" type="image/x-icon" href="../../Include/favicon-icon.svg">
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
    <div class="vendors">
      <div class="div">
        <div class="overlap">
          <div class="frame">
            <div class="frame-2">
              <div class="div-wrapper">
                <div class="text-wrapper">Overview</div>
              </div>
              <div class="rectangle"></div>
            </div>
            <div class="frame-2">
              <div class="div-wrapper">
                <div class="text-wrapper">Prices</div>
              </div>
              <div class="rectangle-2"></div>
            </div>
            <div class="frame-2">
              <div class="div-wrapper">
                <div class="text-wrapper">Guest Reviews</div>
              </div>
              <div class="rectangle-2"></div>
            </div>
          </div>
        </div>
        <div class="overlap-group">
          <img class="img" src="img/rectangle-28.png" alt="new" />
          <img class="rectangle-3" src="img/rectangle-29.png" alt="new" />
          <img class="rectangle-4" src="img/rectangle-30.png" alt="new" />
        </div>
        <img class="rectangle-5" src="img/rectangle-65.png" alt="new" />
        <div class="text-wrapper-2">The Crystal Ballroom</div>
        <img class="location" src="img/location-1.svg" alt="new" />
        <p class="p">Lorem ipsum road, Tantruim-2322, Melbourne, Australia</p>
        <div class="group">
          <div class="text-wrapper-3">4.5 (1200 Reviews)</div>
          <img class="group-2" src="img/group-5.png" alt="new" />
        </div>
        <div class="overlap-2">
          <div class="text-wrapper-4">Top facilities</div>
          <div class="text-wrapper-5">Overview</div>
          <div class="text-wrapper-6">Free wifi</div>
          <img class="wind" src="img/wind-1.svg" alt="new" />
          <div class="text-wrapper-7">Air Conditioning</div>
          <img class="car" src="img/car-1.svg" alt="new" />
          <div class="text-wrapper-8">Parking available</div>
          <div class="frame-3">
            <img class="img-2" src="img/bag-tick-2-1-2.svg" alt="new" />
            <div class="text-wrapper-9">Business Services</div>
          </div>
          <div class="frame-4">
            <img class="img-2" src="img/lifebuoy-1-2.svg" alt="new" />
            <div class="text-wrapper-9">Swimming pool</div>
          </div>
          <div class="frame-5">
            <img class="img-2" src="img/like-1-1-2.svg" alt="new" />
            <div class="text-wrapper-9">Top rated in area</div>
          </div>
          <img class="home-wifi" src="img/home-wifi-1.svg" alt="new" />
          <img class="vector" src="img/vector-1-1.svg" alt="new" />
          <p class="located-in-the-heart">
            Located in the heart of downtown, The Crystal Ballroom stands as a
            beacon of elegance and sophistication in the bustling cityscape.
            This iconic venue exudes timeless charm and grandeur, boasting
            exquisite architectural details and opulent interiors that captivate
            the senses. <br /><br />From its majestic crystal chandeliers that
            cast a warm glow over the expansive dance floor to its panoramic
            views of the city skyline, every corner of The Crystal Ballroom is
            designed to inspire awe and enchantment. <br /><br />With its
            versatile event spaces and impeccable service, The Crystal Ballroom
            sets the stage for unforgettable weddings, galas, corporate events,
            and special occasions of all kinds. Whether you&#39;re planning an
            intimate gathering or a lavish celebration, The Crystal Ballroom
            offers an unparalleled experience where every moment is infused with
            magic and splendor.
          </p>
        </div>
        <div class="overlap-3">
          <img class="frame-6" src="img/frame.svg" alt="new" />
          <p class="element-off-use">
            <span class="span"
              >20% off<br />Use Promotional Coupon Code:<br
            /></span>
            <span class="text-wrapper-10">Orlando</span>
          </p>
          <div class="frame-7">
            <img
              class="bxs-plane-alt"
              src="img/bxs-plane-alt-1.svg"
              alt="new"
            />
            <div class="text-wrapper-11">my Dream Place</div>
          </div>
        </div>
        <div class="overlap-4">
          <div class="frame-8">
            <div class="frame-9">
              <img class="img-3" src="img/bag-tick-2-1.svg" alt="new" />
              <div class="text-wrapper-12">Riverside Views</div>
            </div>
            <div class="frame-9">
              <img class="img-3" src="img/lifebuoy-1.svg" alt="new" />
              <div class="text-wrapper-12">Grand Ballroom</div>
            </div>
            <div class="frame-9">
              <img class="img-3" src="img/like-1-1.svg" alt="new" />
              <div class="text-wrapper-12">Gourmet Dining</div>
            </div>
          </div>
          <div class="frame-10">
            <div class="text-wrapper-13"><input type="submit"value="Reserve suite"></div>
          </div>
          <img class="rectangle-6" src="img/rectangle-70.png" alt="new" />
          <p class="text-wrapper-14">Standard twin ben, Multiple beds</p>
        </div>
        <div class="overlap-5">
          <div class="frame-11">
            <div class="frame-9">
              <img class="img-3" src="img/bag-tick-2-1.svg" alt="new" />
              <div class="text-wrapper-12">Panoramic Sunset Views</div>
            </div>
            <div class="frame-9">
              <img class="img-3" src="img/lifebuoy-1.svg" alt="new" />
              <div class="text-wrapper-12">Modern Event Spaces</div>
            </div>
            <div class="frame-9">
              <img class="img-3" src="img/like-1-1.svg" alt="new" />
              <div class="text-wrapper-12">Personalized Service</div>
            </div>
          </div>
          <div class="frame-12">
            <div class="text-wrapper-13"><input type="submit"value="Reserve suite"></div>
          </div>
          <img class="rectangle-7" src="img/rectangle-71.png" alt="new" />
          <p class="text-wrapper-15">Standard twin ben, 1 Queen bed</p>
        </div>
        <div class="text-wrapper-16">Explore the area</div>
        <img class="vector-2" src="img/vector-2-1.svg" alt="new" />
        <div class="frame-13">
          <div class="frame-14">
            <img class="img-3" src="img/bxs-plane-alt-2.svg" alt="new" />
            <div class="text-wrapper-17">Hotel Penselvenyia</div>
            <div class="text-wrapper-18">2 min drive</div>
          </div>
          <div class="frame-14">
            <img class="img-3" src="img/bxs-map-1.svg" alt="new" />
            <div class="text-wrapper-17">Travis Bakery store house</div>
            <div class="text-wrapper-18">10 min drive</div>
          </div>
          <div class="frame-14">
            <img class="img-3" src="img/bxs-map-1.svg" alt="new" />
            <div class="text-wrapper-17">Olivia Johnson Garden</div>
            <div class="text-wrapper-18">15 min drive</div>
          </div>
          <div class="frame-14">
            <img class="img-3" src="img/bxs-map-1.svg" alt="new" />
            <div class="text-wrapper-17">Norman Opera Circus</div>
            <div class="text-wrapper-18">18 min drive</div>
          </div>
          <div class="frame-14">
            <img class="img-3" src="img/bxs-map-1.svg" alt="new" />
            <div class="text-wrapper-17">Rockdeset hotel</div>
            <div class="text-wrapper-18">32 min drive</div>
          </div>
        </div>
        <footer class="footer">
          <div class="overlap-6">
            <div class="background"></div>
            <img class="background-2" src="img/background-1.svg" alt="new" />
            <div class="copyright">
              <img class="line" src="img/line.svg" alt="new" />
              <div class="copyright-partypro-wrapper">
                <p class="copyright-partypro">
                  <span class="text-wrapper-19"
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
                            class="text-wrapper-20"
                            placeholder="Email here*"
                      />  </div>
                  </div>
                  <button class="button">
                    <button class="button-2">
                      <input type="submit" class="text-wrapper-21" value="Send Now">
                    
                    </button>
                    <a href="https://www.linkedin.com"><img class="follow" src="img/follow.svg" alt="new" /></a>
                 
                  </button>
                </div>
              </div>
              <div class="logo">
                <div class="text-wrapper-22">PartyPRO</div>
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
                      ><div class="text-wrapper-23">
                        Email<br />contact@partyprocom
                      </div></a
                    >
                    <div class="icon">
                      <div class="vector-wrapper">
                        <img
                          class="vector-3"
                          src="img/vector-1.svg"
                          alt="new"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="call">
                    <p class="text-wrapper-23">
                      Call Us <br />(00) 112 365 489
                    </p>
                    <div class="icon">
                      <img class="vector-4" src="img/vector.svg" alt="new" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <img class="image" src="img/image.png" alt="new" />
          </div>
        </footer>
        <div class="div-2">
          <div class="div-2">
            <div class="header">
              <div class="logo-header-wrapper">
                <div class="logo-header">
                  <div class="logo-2">
                    <div class="text-wrapper-22">PartyPRO</div>
                    <div class="pattern"></div>
                    <div class="pattern-2"></div>
                    <div class="pattern-3"></div>
                    <div class="pattern-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="menu">
            <div class="menu-2">
              <div class="text-wrapper-24"><a href="./index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">
                    Home
                </a></div>
              <div class="about">
                <div class="text-wrapper-25"><a href="../about us/index.html" style="color:aliceblue; font-size:large;  text-decoration: none;">
                    About
                </a></div>
                <img class="line-2" src="img/line-4.svg" alt="new" />
              </div>
              <div class="pages-2">
                <div class="pages-3">
                  <div class="text-wrapper-26"> <a href="../Pricing/index.html" style="color:aliceblue; font-size:large;  text-decoration: none;">
                        Pricing
                    </a></div>
                </div>
                <img class="line-2" src="img/line-4.svg" alt="new" />
              </div>
              <div class="project">
                <div class="text-wrapper-25"> <a href="../my projects/index.html" style="color:aliceblue; font-size:large;  text-decoration: none;">
                    My Projects
                </a></div>
                <img class="line-2" src="img/line-4.svg" alt="new" />
              </div>
              <div class="contact">
                <div class="text-wrapper-25">Features</div>
                <img class="line-2" src="img/line-4.svg" alt="new" />
              </div>
              <div class="contact-2">
                <div class="text-wrapper-25"><a href="../my projects/index.html" style="color:aliceblue; font-size:large;  text-decoration: none;">
                    <?php echo $userName; ?>
                </a></div>
                <img class="line-2" src="img/line-4.svg" alt="new" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
