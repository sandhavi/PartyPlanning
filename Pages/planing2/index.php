<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
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
    <div class="planning-process">
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
            <div class="menu-2">
              <div class="text-wrapper-2"><a href="../Home/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">
                    Home
                </a></div>
              <div class="about">
                <div class="text-wrapper-3"><a href="../about us/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">About</a></div>
                <img class="line" src="img/line-4.svg" alt="new" />
              </div>
              <div class="pages">
                <div class="div-wrapper">
                  <div class="text-wrapper-4"><a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Pricing</a></div>
                </div>
                <img class="line" src="img/line-4.svg" alt="new" />
              </div>
              <div class="project">
                <div class="text-wrapper-3"><a href="../my projects/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">My Projects</a></div>
                <img class="line" src="img/line-4.svg" alt="new" />
              </div>
              <div class="contact">
                <div class="text-wrapper-3"><a href="../Help/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Help</a></div>
                <img class="line" src="img/line-4.svg" alt="new" />
              </div>
              <div class="contact-2">
                <div class="text-wrapper-3"><a href="../Login/Loginuser.php" style="color:aliceblue; font-size:large;  text-decoration: none;">SignIn</a></div>
                <img class="line" src="img/line-4.svg" alt="new" />
              </div>
            </div>
          </div>
        </div>
        <div class="overlap">
          <div class="overlap-group">
            <img class="img" src="img/schedule.png" alt="new" />
          </div>
          <div class="paint-palette-wrapper">
            <img class="img-2" src="img/paint-palette.png" alt="new" />
          </div>
          <div class="arena-wrapper">
            <img class="arena" src="img/arena.png" alt="new" />
          </div>
          <div class="inquiry-wrapper">
            <img class="inquiry" src="img/inquiry.png" alt="new" />
          </div>
          <div class="love-mail-wrapper">
            <img class="img" src="img/love-mail.png" alt="new" />
          </div>
          <div class="pass-fail-wrapper">
            <img class="img-2" src="img/pass-fail.png" alt="new" />
          </div>
          <div class="shredder-wrapper">
            <img class="img-2" src="img/shredder.png" alt="new" />
          </div>
          <div class="neutral-decision-wrapper">
            <img class="img-2" src="img/neutral-decision.png" alt="new" />
          </div>
          <div class="text-wrapper-5">Step 01</div>
          <p class="choose-time-date-no"><a href="../planing2/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Date, Time, Venue, No of Guests</a></p>
          <div class="text-wrapper-6">Step 02</div>
          <div class="text-wrapper-7"><a href="../planing3/planning-process-03.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Select theme</a></div>
          <div class="text-wrapper-8">Step 03</div>
          <div class="text-wrapper-9"><a href="../planing4/planning-process-04.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Choose venue</a></div>
          <div class="text-wrapper-10">Step 04</div>
          <div class="text-wrapper-11"><a href="../planing5/planning-process-05.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Decide culinary , decoration</a></div>
          <div class="text-wrapper-12">Step 05</div>
          <div class="text-wrapper-13"><a href="../planing6/planning-process-06.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Choose vendors</a></div>
          <div class="text-wrapper-14">Step 06</div>
          <div class="text-wrapper-15"><a href="../planing7/planning-process-07.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Invitation management</a></div>
          <div class="text-wrapper-16">Step 07</div>
          <div class="text-wrapper-17"><a href="../planing8/planning-process-08.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Create custom checklist</a></div>
          <div class="text-wrapper-18">Step 08</div>
          <div class="text-wrapper-19"><a href="../planing9/planning-process-09.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Generate printable plan</a></div>
        </div>
        <p class="set-the-scene">Set date, time, venue &amp; no of guests</p>
        <footer class="footer">
          <div class="overlap-2">
            <div class="background"></div>
            <img class="background-2" src="img/background.svg" alt="new" />
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
                            class="text-wrapper-20"
                            placeholder="Email here*"
                      /> 
                    </div>
                  </div>
                  <button class="button">
                    <button class="button-2">
                      <input type="submit" class="text-wrapper-21" value="Send Now">

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
                      ><div class="text-wrapper-22">
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
                    <p class="text-wrapper-22">
                      Call Us <br />(00) 112 365 489
                    </p>
                    <div class="icon">
                      <img class="vector-2" src="img/vector.svg" alt="new" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <img class="image" src="img/image.png" alt="new" />
          </div>
        </footer>
        <div class="button-row">
          <button class="label-wrapper">
            <div class="label"><a href="../planing3/planning-process-03.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Next: Select Theme</a></div>
          </button>
        </div>
        <div class="overlap-3">
          <div class="flight-search">
            <div class="text-input">
              <div class="base-text-input">
                <div class="union-wrapper">
                  <img class="union" src="img/union-2.svg" alt="new" />
                </div>
                <div class="label-2">Date</div>
              </div>
            </div>
            <div class="divider"></div>
            <div class="text-input">
              <div class="base-text-input">
                <div class="union-wrapper">
                  <img class="union-2" src="img/union.svg" alt="new" />
                </div>
              </div>
            </div>
            <div class="divider"></div>
            <div class="text-input-2">
              <div class="base-text-input">
                <img
                  class="calendar-date"
                  src="img/32-calendar-with-dates-2.svg"
                  alt="new"
                />
                <div class="label-2">Venue</div>
              </div>
            </div>
            <div class="divider"></div>
            <div class="text-input-3">
              <div class="base-text-input-2"></div>
            </div>
            <button class="button-3"><div class="label-3"><a href="../planing3/planning-process-03.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Search</a></div></button>
          </div>
          <div class="base-pill-chit">
            <div class="label-4">Times</div>
            <img
              class="element-chevron-down"
              src="img/18-chevron-down.svg"
              alt="new"
            />
          </div>
          <div class="base-text">
            <div class="text-input-4">
              <div class="base-text-input-3">
                <img
                  class="calendar-date"
                  src="img/32-person-solid-1.svg"
                  alt="new"
                />
                <div class="label-5">Guests</div>
              </div>
            </div>
            <div class="AL-wrapper">
              <div class="popover-increment">
                <div class="row">
                  <div class="label-6">Adults:</div>
                  <div class="incrementer">
                    <div class="increment">
                      <img
                        class="element-plus"
                        src="img/32-plus-5.svg"
                        alt="new"
                      />
                    </div>
                    <div class="text-wrapper-23">1</div>
                    <div class="increment">
                      <img
                        class="element-plus"
                        src="img/32-plus-10.svg"
                        alt="new"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="label-6">Minors:</div>
                  <div class="incrementer">
                    <div class="increment">
                      <img
                        class="element-plus"
                        src="img/32-plus-5.svg"
                        alt="new"
                      />
                    </div>
                    <div class="text-wrapper-23">0</div>
                    <div class="increment">
                      <img
                        class="element-plus"
                        src="img/32-plus-10.svg"
                        alt="new"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="base-date-picker">
            <img class="divider-2" src="img/divider.svg" alt="new" />
            <div class="calendar-section">
              <img
                class="element-chevron-left"
                src="img/32-chevron-left.svg"
                alt="new"
              />
              <div class="month">
                <div class="month-2">
                  <div class="month-year">March 2021</div>
                </div>
                <div class="calendar">
                  <div class="base-calendar-row">
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-7">S</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-7">M</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-7">T</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-7">W</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-7">T</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-7">F</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-7">S</div>
                      </div>
                    </div>
                  </div>
                  <div class="base-calendar-row">
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-8">28</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">1</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">2</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">3</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">4</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">5</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">6</div>
                      </div>
                    </div>
                  </div>
                  <div class="base-calendar-row">
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">7</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">8</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">9</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">10</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">11</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">12</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">13</div>
                      </div>
                    </div>
                  </div>
                  <div class="base-calendar-row">
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">14</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">15</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">16</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">17</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">18</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">19</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">20</div>
                      </div>
                    </div>
                  </div>
                  <div class="base-calendar-row">
                    <div class="calendar-date">
                      <div class="base-calendar-date-2">
                        <div class="label-10">21</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">22</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">23</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">24</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">25</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">26</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">27</div>
                      </div>
                    </div>
                  </div>
                  <div class="base-calendar-row">
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">28</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">29</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">30</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-9">31</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-8">1</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-8">2</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-8">3</div>
                      </div>
                    </div>
                  </div>
                  <div class="base-calendar-row">
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-8">3</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-8">4</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-8">5</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-8">6</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-8">7</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-8">8</div>
                      </div>
                    </div>
                    <div class="calendar-date">
                      <div class="base-calendar-date">
                        <div class="label-8">9</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <img
                class="element-chevron-right"
                src="img/32-chevron-right.svg"
                alt="new"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
