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
    <div class="DASHBOARD">
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
                <div class="text-wrapper-2"><a href="../Home/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Home</a>
</div>
                <div class="about">
                  <div class="text-wrapper-3"><a href="../aboutus/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">About Us</a></div>
                  <img class="line" src="img/line-1.svg" />
                </div>
                <div class="pages">
                  <div class="div-wrapper"><div class="text-wrapper-4"><a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">&nbsp; &nbsp; Pricing</a></div></div>
                  <img class="line" src="img/line-2.svg" />
                </div>
                <div class="project">
                  <div class="text-wrapper-3"><a href="../my projects/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">&nbsp; &nbsp; My Projects</a>
</div> 
                  <img class="line" src="img/line-3.svg" />
                </div>
                <div class="contact">
                  <div class="text-wrapper-3"><a href="../help/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">&nbsp; &nbsp; &nbsp; Help</a></div>
                  <img class="line" src="img/line-4.svg" />
                </div>
                <div class="contact-2">
                  <div class="text-wrapper-3"><a href="../Login/Loginuser.php" style="color:aliceblue; font-size:large;  text-decoration: none;">SignIn</a></div>
                  <img class="line" src="img/line-4-1.svg" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="overlap-2">
          <div class="frame">
            <div class="group">
              <div class="overlap-wrapper">
                <div class="overlap-3">
                  <div class="group-2">
                    <div class="overlap-group-wrapper">
                      <div class="overlap-4">
                        <div class="group-2">
                          <div class="overlap-5">
                            <div class="rectangle"></div>
                            <div class="group-3">
                              <div class="overlap-6">
                                <div class="text-wrapper-5">Full Name</div>
                                <div class="group-4">
                                  <div class="text-wrapper-6">Email Address</div>
                                  <img class="img" src="img/group-36.png" />
                                </div>
                                <div class="group-5">
                                  <div class="text-wrapper-7">Location</div>
                                  <img class="group-6" src="img/group-37.png" />
                                </div>
                                <div class="group-7">
                                  <div class="text-wrapper-8">Joined</div>
                                  <img class="group-8" src="img/group-37-1.png" />
                                </div>
                                <div class="group-9">
                                  <div class="text-wrapper-9">Permissions</div>
                                  <img class="group-10" src="img/group-37-3.png" />
                                </div>
                              </div>
                              <div class="text-wrapper-10">Show:</div>
                              <div class="frame-2">
                                <div class="text-wrapper-11">10 rows</div>
                                <img class="group-11" src="img/group-37-2.png" />
                              </div>
                            </div>
                          </div>
                          <div class="group-12">
                            <div class="text-wrapper-12">User Management</div>
                            <div class="frame-3"><div class="text-wrapper-13">Search items...</div></div>
                            <div class="frame-4">
                              <div class="text-wrapper-13">Joined</div>
                              <div class="text-wrapper-14">Anytime</div>
                              <div class="iconly-light-arrow"></div>
                            </div>
                            <div class="frame-5">
                              <div class="text-wrapper-13">Permissions</div>
                              <div class="text-wrapper-14">All</div>
                              <div class="iconly-light-arrow-2"></div>
                            </div>
                            <div class="frame-6">
                              <div class="text-wrapper-15">+</div>
                              <div class="text-wrapper-16">New User</div>
                            </div>
                            <div class="group-13">
                              <div class="overlap-group-2">
                                <div class="iconly-light-wrapper">
                                  <img class="iconly-light" src="img/iconly-light-category.png" />
                                </div>
                                <img class="more-square" src="img/more-square.png" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="group-wrapper">
                          <div class="group-14">
                            <img class="group-15" src="img/group-66.png" />
                            <div class="group-16">
                              <div class="text-wrapper-17">Leslie Maya</div>
                              <div class="text-wrapper-18">Mike Dean</div>
                              <div class="text-wrapper-19">Mateus Cunha</div>
                              <div class="text-wrapper-20">Nzola Uemo</div>
                              <div class="text-wrapper-21">Antony Mack</div>
                              <div class="text-wrapper-22">André da Silva</div>
                              <div class="text-wrapper-23">Jorge Ferreira</div>
                              <div class="text-wrapper-24">Alex Pfeiffer</div>
                              <div class="text-wrapper-25">Josie Deck</div>
                            </div>
                            <div class="group-17">
                              <div class="text-wrapper-26">leslie@gmail.com</div>
                              <div class="text-wrapper-27">mike@gmail.com</div>
                              <div class="text-wrapper-28">cunha@gmail.com</div>
                              <div class="text-wrapper-29">nzola@gmail.com</div>
                              <div class="text-wrapper-30">mack@gmail.com</div>
                              <div class="text-wrapper-31">andré@gmail.com</div>
                              <div class="text-wrapper-32">jorge@gmail.com</div>
                              <div class="text-wrapper-33">alex@gmail.com</div>
                              <div class="text-wrapper-34">josie@gmail.com</div>
                            </div>
                            <div class="overlap-7">
                              <div class="group-18">
                                <div class="text-wrapper-35">May 20, 2015</div>
                                <div class="text-wrapper-36">March 13, 2018</div>
                                <div class="text-wrapper-37">March 14, 2018</div>
                                <div class="text-wrapper-38">October 3, 2011</div>
                                <div class="text-wrapper-39">October 2, 2010</div>
                                <div class="text-wrapper-40">June 5, 2016</div>
                                <div class="text-wrapper-41">June 15, 2015</div>
                                <div class="text-wrapper-42">July 14, 2015</div>
                                <div class="text-wrapper-43">October, 2016</div>
                              </div>
                              <div class="group-19">
                                <div class="group-20">
                                  <p class="p">
                                    <span class="span">Los Angeles,</span> <span class="text-wrapper-44">CA</span>
                                  </p>
                                  <div class="location">
                                    <div class="ellipse-wrapper"><div class="ellipse"></div></div>
                                  </div>
                                </div>
                                <div class="group-21">
                                  <p class="p">
                                    <span class="span">Cheyenne,</span> <span class="text-wrapper-44">WY</span>
                                  </p>
                                  <div class="location">
                                    <div class="overlap-group-3"><div class="ellipse"></div></div>
                                  </div>
                                </div>
                                <div class="group-22">
                                  <p class="p">
                                    <span class="span">Cheyenne,</span> <span class="text-wrapper-44">WY</span>
                                  </p>
                                  <div class="location">
                                    <div class="overlap-group-4"><div class="ellipse"></div></div>
                                  </div>
                                </div>
                                <div class="group-23">
                                  <p class="p">
                                    <span class="span">Syracuse,</span> <span class="text-wrapper-44">NY</span>
                                  </p>
                                  <div class="location">
                                    <div class="overlap-group-5"><div class="ellipse"></div></div>
                                  </div>
                                </div>
                                <div class="group-24">
                                  <p class="p">
                                    <span class="span">Luanda,</span> <span class="text-wrapper-44">AN</span>
                                  </p>
                                  <div class="location">
                                    <div class="overlap-group-6"><div class="ellipse"></div></div>
                                  </div>
                                </div>
                                <div class="group-25">
                                  <p class="p">
                                    <span class="span">Lagos,</span> <span class="text-wrapper-44">NG</span>
                                  </p>
                                  <div class="location">
                                    <div class="overlap-group-7"><div class="ellipse"></div></div>
                                  </div>
                                </div>
                                <div class="group-26">
                                  <p class="p">
                                    <span class="span">London,</span> <span class="text-wrapper-44">ENG</span>
                                  </p>
                                  <div class="location">
                                    <div class="overlap-group-8"><div class="ellipse"></div></div>
                                  </div>
                                </div>
                                <div class="group-27">
                                  <p class="p">
                                    <span class="span">São Paulo,</span> <span class="text-wrapper-44">BR</span>
                                  </p>
                                  <div class="location">
                                    <div class="overlap-group-9"><div class="ellipse"></div></div>
                                  </div>
                                </div>
                                <div class="group-28">
                                  <p class="p">
                                    <span class="span">Huambo,</span> <span class="text-wrapper-44">Angola</span>
                                  </p>
                                  <div class="location">
                                    <div class="overlap-group-10"><div class="ellipse"></div></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="group-29">
                              <div class="group-30"><div class="ellipse-2"></div></div>
                              <div class="group-31">
                                <div class="overlap-group-11">
                                  <img class="ellipse-3" src="img/ellipse-8.svg" />
                                  <div class="ellipse-4"></div>
                                </div>
                              </div>
                              <div class="group-32">
                                <div class="overlap-group-11">
                                  <img class="ellipse-3" src="img/ellipse-7.svg" />
                                  <div class="ellipse-4"></div>
                                </div>
                              </div>
                              <div class="group-33"><div class="ellipse-2"></div></div>
                              <div class="group-34"><div class="ellipse-2"></div></div>
                              <div class="group-35"><div class="ellipse-2"></div></div>
                              <div class="group-36"><div class="ellipse-2"></div></div>
                              <div class="group-37"><div class="ellipse-2"></div></div>
                              <div class="group-38"><div class="ellipse-2"></div></div>
                            </div>
                            <div class="group-39">
                              <div class="group-40">
                                <div class="overlap-group-12">
                                  <div class="rectangle-2"></div>
                                  <div class="text-wrapper-45">Admin</div>
                                </div>
                              </div>
                              <div class="group-41">
                                <div class="overlap-group-12">
                                  <div class="rectangle-2"></div>
                                  <div class="text-wrapper-45">Admin</div>
                                </div>
                              </div>
                              <div class="group-42">
                                <div class="overlap-group-12">
                                  <div class="rectangle-3"></div>
                                  <div class="text-wrapper-45">Admin</div>
                                </div>
                              </div>
                              <div class="group-43">
                                <div class="overlap-group-12">
                                  <div class="rectangle-4"></div>
                                  <div class="text-wrapper-46">Viewer</div>
                                </div>
                              </div>
                              <div class="group-44">
                                <div class="overlap-8">
                                  <div class="rectangle-5"></div>
                                  <div class="text-wrapper-47">Contributor</div>
                                </div>
                              </div>
                              <div class="group-45">
                                <div class="overlap-8">
                                  <div class="rectangle-5"></div>
                                  <div class="text-wrapper-47">Contributor</div>
                                </div>
                              </div>
                              <div class="group-46">
                                <div class="overlap-8">
                                  <div class="rectangle-6"></div>
                                  <div class="text-wrapper-47">Contributor</div>
                                </div>
                              </div>
                              <div class="group-47">
                                <div class="overlap-8">
                                  <div class="rectangle-5"></div>
                                  <div class="text-wrapper-47">Contributor</div>
                                </div>
                              </div>
                              <div class="group-48">
                                <div class="overlap-8">
                                  <div class="rectangle-5"></div>
                                  <div class="text-wrapper-47">Contributor</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="group-49">
                    <div class="group-50">
                      <div class="group-51">
                        <img class="group-52" src="img/group-28.png" />
                        <div class="group-53">
                          <div class="overlap-group-13"><div class="text-wrapper-48">1</div></div>
                        </div>
                        <div class="group-54">
                          <div class="overlap-9"><div class="text-wrapper-48">2</div></div>
                        </div>
                        <div class="group-55">
                          <div class="overlap-9"><div class="text-wrapper-48">3</div></div>
                        </div>
                        <div class="group-56">
                          <div class="overlap-9"><div class="text-wrapper-48">4</div></div>
                        </div>
                        <div class="group-57">
                          <div class="overlap-10">
                            <div class="ellipse-5"></div>
                            <div class="text-wrapper-49">10</div>
                          </div>
                        </div>
                        <div class="iconly-light-arrow-wrapper">
                          <img class="iconly-light-arrow-3" src="img/iconly-light-arrow-left.png" />
                        </div>
                      </div>
                      <div class="stroke-wrapper"><img class="stroke" src="img/stroke-3.svg" /></div>
                    </div>
                    <img class="group-58" src="img/group-82.png" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="frame-7">
            <div class="text-wrapper-15">+</div>
            <div class="text-wrapper-16">Add Vendor</div>
          </div>
        </div>
        <footer class="footer">
          <div class="overlap-11">
            <div class="background"></div>
            <img class="background-2" src="img/background-1.svg" />
            <div class="copyright">
              <img class="line-2" src="img/line.svg" />
              <div class="copyright-partypro-wrapper">
                <p class="copyright-partypro">
                  <span class="text-wrapper-50">Copyright © PartyPRO | Designed by XXX - Powered by XXX.</span>
                </p>
              </div>
            </div>
            <div class="content">
              <div class="about-us-our-team-wrapper">
                <p class="about-us-our-team"><a href="../about us/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">About Us</a> <br />
                  <a href="../Vendors 1/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Our Team</a> <br />
                  <a href="../my projects/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">OurProject</a><br />
                  <a href="../Pricing/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Pricing</a><br />
                  <a href="../Help/index.php" style="color:aliceblue; font-size:large;  text-decoration: none;">Contact</a>
                </p>
              </div>
              <div class="subscribe">
                <div class="content-2">
                  <div class="name">
                    <div class="overlap-group-14">
                      <input 
                            class="text-wrapper-51"
                            placeholder="Email here*"
                      /> 
                    </div>
                  </div>
                  <button class="button">
                    <button class="button-2">
                      <input type="submit" class="text-wrapper-52" value="Send Now">
                    </button>
                     
                    <a href="https://www.linkedin.com"><img class="follow" src="img/follow.svg"  /></a>
                  
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
                  Join the PartyPRO community for exclusive tips, inspiration, and offers to make your celebrations
                  truly unforgettable. Let&#39;s create memories together!
                </p>
                <div class="address">
                  <div class="email">
                    <a href="mailto:contact@hvcargologistics.com" target="_blank" rel="noopener noreferrer"
                      ><div class="text-wrapper-53">Email<br />contact@partyprocom</div></a
                    >
                    <div class="icon">
                      <div class="vector-wrapper"><img class="vector" src="img/vector-1.svg" /></div>
                    </div>
                  </div>
                  <div class="call">
                    <p class="text-wrapper-53">Call Us <br />(00) 112 365 489</p>
                    <div class="icon"><img class="vector-2" src="img/vector-2.svg" /></div>
                  </div>
                </div>
              </div>
            </div>
            <img class="image" src="img/image.png" />
          </div>
        </footer>
      </div>
    </div>
  </body>
</html>
