<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
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
    $sql = "SELECT username FROM customer WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
 
      $row = $result->fetch_assoc();
      $userName = $row['username'];
    } else {
     
      $userName = "Log In";
    }
  } else {
    $userName = "Log In";
  }
  ?>
  <div class="home-page">
    <div class="div">
      <footer class="footer">
        <div class="overlap">
          <div class="background"></div>
          <img class="img" src="img/background.svg" alt="new" />
          <div class="copyright">
            <img class="line" src="img/line-5.svg" alt="new" />
            <div class="copyright-partypro-wrapper">
              <p class="copyright-partypro">
                <span class="text-wrapper">USCS | GROUP 22 IS BATCH 20</span>
              </p>
            </div>
          </div>
          <div class="content">
            <div class="pages">
              <p class="about-us-our-team">
                About Us <br />Our Team <br />Our Project<br />Pricing
                <br />Contact
              </p>
            </div>
            <div class="subscribe">
              <div class="content-2">
                <div class="name">
                  <div class="overlap-group">
                    <div class="text-wrapper-2">Email here*</div>
                  </div>
                </div>
                <button class="button">
                  <button class="div-wrapper">
                    <div class="text-wrapper-3">Send Now</div>
                  </button>
                  <img class="follow" src="img/follow.svg" alt="new" />
                </button>
              </div>
            </div>
            <div class="logo">
              <div class="text-wrapper-4">PartyPRO</div>
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
                  <a href="mailto:contact@hvcargologistics.com" target="_blank" rel="noopener noreferrer">
                    <div class="text-wrapper-5">
                      Email<br />contact@partyprocom
                    </div>
                  </a>
                  <div class="icon">
                    <div class="vector-wrapper">
                      <img class="vector" src="img/vector-5.svg" alt="new" />
                    </div>
                  </div>
                </div>
                <div class="call">
                  <p class="text-wrapper-5">Call Us <br />(00) 112 365 489</p>
                  <div class="icon">
                    <img class="vector-2" src="img/vector-4.svg" alt="new" alt="image" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <img class="image" src="img/image-2.png" alt="new" alt="image" />
        </div>
      </footer>
      <div class="overlap-2">
        <div class="why-choose-us">
          <img class="pattern-5" src="img/pattern.svg" alt="new" alt="image" />
          <img class="unsplash-MD" src="img/unsplash-md-ha01bk7c.png" alt="new" alt="image" />
        </div>
        <div class="project">
          <img class="background-2" src="img/background-3.svg" alt="new" alt="image" />
          <div class="content-4">
            <div class="text-wrapper-6">Party Planning Roadmap</div>
          </div>
        </div>
        <div class="about">
          <div class="overlap-wrapper">
            <div class="overlap-3">
              <img class="background-3" src="img/background-2.png" alt="new" alt="image" />
              <div class="overlap-group-wrapper">
                <div class="overlap-4">
                  <div class="background-4"></div>
                  <div class="content-5">
                    <div class="content-6">
                      <div class="text">
                        <div class="sub-text">
                          <div class="div-2"></div>
                          <div class="frame">
                            <div class="text-wrapper-7">About Us</div>
                          </div>
                        </div>
                        <div class="text">
                          <div class="text-wrapper-8">
                            Where Every Occasion Sparkles!
                          </div>
                          <p class="p">
                            Your go-to destination for seamless party
                            planning. We blend creativity and technology to
                            craft unforgettable events. With personalized
                            service and attention to detail, we make every
                            celebration special. From birthdays to weddings,
                            let us turn your vision into reality. Experience
                            the difference with PartyPRO today.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="images">
                      <div class="overlap-group-2">
                        <img class="image-2" src="img/image-1.png" alt="new" />
                        <img class="image-3" src="img/image.png" alt="new" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="frame-2"></div>
        </div>
    
        <div class="group">
          <div class="services">
            <div class="heading">
              <div class="text-wrapper-10">Unlock Your Party Potential</div>
              <div class="sub-text-2">
                <div class="div-2"></div>
                <div class="overlap-group-3">
                  <div class="text-wrapper-11">What we do</div>
                </div>
              </div>
            </div>
            <div class="group-2">
              <div class="element">
                <div class="text-2">
                  <div class="text-3">
                    <div class="text-wrapper-12">Family Collaboration</div>
                    <p class="text-wrapper-13">
                      Plan with loved ones! Coordinate tasks, share lists, and
                      chat together.
                    </p>
                  </div>
                  <img class="line-2" src="img/line.svg" alt="new" />
                </div>
              </div>
              <div class="icon-wrapper">
                <div class="line-wrapper">
                  <img class="line-3" src="img/line.svg" alt="new" />
                </div>
              </div>
              <div class="text-4">
                <div class="text-wrapper-14">Custom Timeline</div>
                <p class="text-wrapper-13">
                  Your schedule, your way! Create a personalized timeline for
                  your event.
                </p>
              </div>
              <div class="element-2">
                <div class="text-2">
                  <div class="text-3">
                    <div class="text-wrapper-14">Vendor Selection</div>
                    <p class="text-wrapper-13">
                      Discover top vendors! Compare services and request
                      quotes effortlessly.
                    </p>
                  </div>
                  <img class="line-2" src="img/line.svg" alt="new" />
                </div>
              </div>
              <div class="element-3">
                <div class="text-5">
                  <div class="text-6">
                    <div class="text-wrapper-14">Budget Tracker</div>
                    <p class="text-wrapper-13">
                      Stay on track financially! Monitor expenses and manage
                      your budget easily.
                    </p>
                  </div>
                  <img class="line-2" src="img/line.svg" alt="new" />
                </div>
                <div class="icon-2"></div>
              </div>
            </div>
            <img class="icon-park-solid-time" src="img/icon-park-solid-time.png" alt="new" />
          </div>
          <img class="mask-group" src="img/mask-group.png" alt="new" />
        </div>
        <img class="tdesign-money" src="img/tdesign-money.svg" alt="new" />
        <div class="content-7">
          <div class="image-4">
            <div class="img-wrapper">
              <img class="text-7" src="img/text.png" alt="new" />
            </div>
            <div class="element-4">
              <div class="text-8">
                <div class="text-wrapper-15">STEP 02</div>
                <div class="text-wrapper-16">Set Your Budget</div>
              </div>
            </div>
            <div class="element-5">
              <div class="text-9">
                <div class="text-wrapper-15">STEP&nbsp;&nbsp;03</div>
                <p class="text-wrapper-17">Choose Your Venue and Date</p>
              </div>
            </div>
            <div class="element-6">
              <div class="text-9">
                <div class="text-wrapper-15">STEP 04</div>
                <div class="text-wrapper-16">Plan Your Details</div>
              </div>
            </div>
            <div class="element-7">
              <div class="text-9">
                <div class="text-wrapper-15">STEP 05</div>
                <div class="text-wrapper-16">Lights, Camera, Action</div>
              </div>
            </div>
          </div>
          <img class="rectangle" src="img/rectangle-31.png" alt="new" />
        </div>
        <div class="text-wrapper-18">Crafting Moments, Creating Memories</div>
      </div>
      <div class="testimonial">
        <div class="title">
          <div class="title-2">
            <div class="sub-text-3">
              <div class="div-2"></div>
              <div class="text-10">
                <div class="text-wrapper-7">Testimonial</div>
              </div>
            </div>
            <div class="text-wrapper-19">What Our Customers Say</div>
          </div>
          <div class="aerrow">
            <div class="overlap-group-wrapper-2">
              <div class="overlap-group-4">
                <img class="vector-3" src="img/vector-3.svg" alt="new" />
                <img class="vector-4" src="img/vector-2.svg" alt="new" />
              </div>
            </div>
            <div class="overlap-wrapper-2">
              <div class="overlap-5">
                <div class="background-5"></div>
                <img class="vector-5" src="img/vector-1.svg" alt="new" />
                <img class="vector-6" src="img/vector.svg" alt="new" />
              </div>
            </div>
          </div>
        </div>
        <div class="user">
          <div class="review-wrapper">
            <div class="review">
              <div class="user-2">
                <div class="user-3">
                  <img class="user-4" src="img/user-1.png" alt="new" />
                  <div class="name-2">
                    <div class="text-wrapper-20">Kathleen Smith</div>
                    <div class="text-wrapper-21">From Germany</div>
                  </div>
                </div>
                <div class="image-wrapper">
                  <img class="image-5" src="img/1.svg" alt="new" />
                </div>
              </div>
              <div class="text-11">
                <p class="i-had-the-most">
                  &#34;I had the most amazing experience planning my party
                  with this platform! The family collaboration feature made it
                  so easy for all of us to stay organized and on the same
                  page. Plus, the custom timeline feature helped me keep track
                  of every detail leading up to the big day. Highly recommend
                  for anyone looking to throw a stress-free and memorable
                  event!&#34;
                </p>
                <div class="star">
                  <img class="star-2" src="img/star-5.svg" alt="new" />
                  <img class="star-3" src="img/star-5.svg" alt="new" />
                  <img class="star-4" src="img/star-5.svg" alt="new" />
                  <img class="star-5" src="img/star-5.svg" alt="new" />
                  <img class="star-6" src="img/star-5.svg" alt="new" />
                </div>
              </div>
            </div>
          </div>
          <div class="element-8">
            <div class="review">
              <div class="user-2">
                <div class="user-3">
                  <img class="user-4" src="img/user.png" alt="new" />
                  <div class="name-2">
                    <div class="text-wrapper-15">John Martin</div>
                    <div class="text-wrapper-22">From Russia</div>
                  </div>
                </div>
                <div class="image-wrapper">
                  <img class="image-5" src="img/image.svg" alt="new" />
                </div>
              </div>
              <div class="text-11">
                <p class="i-was-blown-away-by">
                  &#34;I was blown away by the vendor selection feature on
                  this party planning website! It saved me so much time and
                  effort by providing a curated list of top vendors in my
                  area. From catering to decor, I found everything I needed to
                  make my party a success. The budget tracker feature was also
                  a lifesaver, helping me stay within my budget without
                  sacrificing quality. 5 stars all the way!&#34;
                </p>
                <div class="star">
                  <img class="star-2" src="img/star-5.svg" alt="new" />
                  <img class="star-3" src="img/star-5.svg" alt="new" />
                  <img class="star-4" src="img/star-5.svg" alt="new" />
                  <img class="star-5" src="img/star-5.svg" alt="new" />
                  <img class="star-6" src="img/star-5.svg" alt="new" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="div-3">
        <div class="div-3">
          <div class="header">
            <div class="logo-header">
              <div class="logo-2">
                <div class="text-wrapper-4">PartyPRO</div>
                <div class="pattern"></div>
                <div class="pattern-2"></div>
                <div class="pattern-3"></div>
                <div class="pattern-4"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="menu">
          <div class="menu-wrapper">
            <div class="menu-2">
              <div class="menu-3">
                <div class="menu-4">
                  <div class="text-wrapper-23"><a href="./index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Home</a></div>
                  <div class="about-2">
                    <div class="text-wrapper-24"><a href="../aboutus/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">About Us</a></div>
                    <img class="line-4" src="img/line-4.svg" alt="new" />
                  </div>
                  <div class="pages-2">
                    <div class="pages-3">
                      <div class="text-wrapper-25"><a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Pricing</a></div>
                    </div>
                    <img class="line-4" src="img/line-4.svg" alt="new" />
                  </div>
                  <div class="project-2">
                    <div class="text-wrapper-24"><a href="../theme-p/displayBoxes.php" style="color:aliceblue; font-size:large;  text-decoration: none;">My Projects</a></div>
                    <img class="line-4" src="img/line-4.svg" alt="new" />
                  </div>
                  <div class="contact">
                    <div class="text-wrapper-24"><a href="../help/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Help</a></div>
                    <img class="line-4" src="img/line-4.svg" alt="new" />
                  </div>
                  <div class="pages-2">
                    <div class="pages-3">
                      <div class="text-wrapper-25"><a href="../UpdateProfile/update.php" style="color:aliceblue; font-size:large;  text-decoration: none;"><?php echo $userName ?></a></div>
                    </div>
                    <img class="line-4" src="img/line-4.svg" alt="new" />
                  </div>

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