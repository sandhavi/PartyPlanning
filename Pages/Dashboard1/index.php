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
    <div class="admin-dashboard">
      <div class="div">
        <div class="side-menu">
          <div class="list">
            <div class="dashboard">
              <img class="home" src="img/home.svg" alt="new" />
              <div class="text-wrapper">Dashboard</div>
            </div>
            <div class="div-2">
              <img class="student" src="img/student.svg" alt="new" />
              <div class="email">Users</div>
            </div>
            <div class="food"></div>
            <div class="div-2"><div class="student"></div></div>
          </div>
          <div class="logo">
            <div class="text-wrapper-2">PartyPRO</div>
            <div class="pattern"></div>
            <div class="pattern-2"></div>
            <div class="pattern-3"></div>
            <div class="pattern-4"></div>
          </div>
        </div>
        <div class="overlap">
          <div class="content">
            <div class="overlap-group">
              <div class="text-wrapper-3">Dashboard</div>
              <div class="search-bar">
                <div class="frame">
                  <img class="search" src="img/search.svg" alt="new" />
                  <div class="text-wrapper-4">Search here...</div>
                </div>
              </div>
              <div class="overview">
                <div class="content-2">
                  <div class="element">
                    <div class="text">
                      <div class="text-wrapper-5">Users</div>
                      <div class="text-wrapper-6">932</div>
                    </div>
                    <div class="icon">
                      <img class="img" src="img/student-1.svg" alt="new" />
                    </div>
                  </div>
                  <div class="element-2">
                    <div class="text-2">
                      <div class="text-wrapper-5">Total Parties</div>
                      <div class="text-wrapper-6">754</div>
                    </div>
                    <div class="icon-2"></div>
                  </div>
                  <div class="element-3">
                    <div class="text-3">
                      <div class="text-wrapper-5">Completed</div>
                      <div class="text-wrapper-6">700</div>
                    </div>
                    <div class="calendar-wrapper">
                      <div class="calendar">
                        <img
                          class="order-completed"
                          src="img/order-completed.png"
                          alt="new"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="element-4">
                    <div class="text-4">
                      <div class="text-wrapper-5">Ongoing</div>
                      <div class="text-wrapper-6">54</div>
                    </div>
                    <div class="icon-3"></div>
                  </div>
                </div>
              </div>
              <div class="school-performance">
                <div class="overlap-2">
                  <div class="text-wrapper-7">Subscription Payment Summary</div>
                  <div class="chart">
                    <div class="overlap-3">
                      <div class="month">
                        <img class="line" src="img/line.png" alt="new" />
                        <div class="month-2">
                          <div class="text-wrapper-8">Jan</div>
                          <div class="text-wrapper-8">Feb</div>
                          <div class="text-wrapper-8">Mar</div>
                          <div class="text-wrapper-8">Apr</div>
                          <div class="text-wrapper-8">May</div>
                          <div class="text-wrapper-8">Jun</div>
                          <div class="text-wrapper-9">Jul</div>
                          <div class="text-wrapper-8">Aug</div>
                          <div class="text-wrapper-8">Sep</div>
                          <div class="text-wrapper-8">Oct</div>
                          <div class="text-wrapper-8">Nov</div>
                          <div class="text-wrapper-8">Dec</div>
                        </div>
                      </div>
                      <div class="chart-orange-wrapper">
                        <div class="chart-orange">
                          <div class="overlap-group-2">
                            <img
                              class="line-2"
                              src="img/line-1.svg"
                              alt="new"
                            />
                            <img
                              class="line-3"
                              src="img/line-2.svg"
                              alt="new"
                            />
                            <div class="ellipse"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="number">
                      <div class="text-wrapper-5">100</div>
                      <div class="text-wrapper-10">75</div>
                      <div class="text-wrapper-11">50</div>
                      <div class="text-wrapper-12">25</div>
                      <div class="text-wrapper-13">0</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="unpaid-student">
                <div class="overlap-4">
                  <div class="text-wrapper-14">Subscription Payments</div>
                  <div class="list-2">
                    <div class="overlap-group-wrapper">
                      <div class="overlap-group-3">
                        <div class="profile-picture"></div>
                        <div class="text-wrapper-15">Samantha William</div>
                        <div class="INV">ID 123456789</div>
                        <div class="date">$ 50.00</div>
                        <div class="class">
                          <div class="user-wrapper">
                            <img class="img-2" src="img/user-4.svg" alt="new" />
                          </div>
                        </div>
                        <img class="menu" src="img/menu-4.png" alt="new" />
                      </div>
                    </div>
                    <div class="overlap-group-wrapper">
                      <div class="overlap-group-3">
                        <div class="profile-picture"></div>
                        <div class="text-wrapper-15">Tony Soap</div>
                        <div class="INV">ID 123456789</div>
                        <div class="date-2">$ 30.00</div>
                        <div class="class">
                          <div class="user-wrapper">
                            <img class="img-2" src="img/user-4.svg" alt="new" />
                          </div>
                        </div>
                        <img class="menu" src="img/menu-4.png" alt="new" />
                      </div>
                    </div>
                    <div class="overlap-group-wrapper">
                      <div class="overlap-group-3">
                        <div class="profile-picture"></div>
                        <div class="text-wrapper-15">Jordan Nico</div>
                        <div class="INV">ID 123456789</div>
                        <div class="date">$ 45.00</div>
                        <div class="class">
                          <div class="user-wrapper">
                            <img class="img-2" src="img/user-4.svg" alt="new" />
                          </div>
                        </div>
                        <img class="menu" src="img/menu-4.png" alt="new" />
                      </div>
                    </div>
                    <div class="overlap-group-wrapper">
                      <div class="overlap-group-3">
                        <div class="profile-picture"></div>
                        <div class="text-wrapper-15">Karen Hope</div>
                        <div class="INV">ID 123456789</div>
                        <div class="date-3">$ 28.00</div>
                        <div class="class">
                          <div class="user-wrapper">
                            <img class="img-2" src="img/user-4.svg" alt="new" />
                          </div>
                        </div>
                        <img class="menu" src="img/menu-4.png" alt="new" />
                      </div>
                    </div>
                    <div class="overlap-group-wrapper">
                      <div class="overlap-group-3">
                        <div class="profile-picture"></div>
                        <div class="text-wrapper-15">Nadila Adja</div>
                        <div class="INV">ID 123456789</div>
                        <div class="date">$ 84.00</div>
                        <div class="class">
                          <div class="user-wrapper">
                            <img class="img-2" src="img/user-4.svg" alt="new" />
                          </div>
                        </div>
                        <img class="menu" src="img/menu-4.png" alt="new" />
                      </div>
                    </div>
                  </div>
                  <div class="pagination">
                    <p class="showing-from">
                      <span class="span">Showing </span>
                      <span class="text-wrapper-16">1-5 </span>
                      <span class="span">from</span>
                      <span class="text-wrapper-16"> 100 </span>
                      <span class="span">data</span>
                    </p>
                    <div class="page">
                      <img class="dropdown" src="img/dropdown.svg" alt="new" />
                      <div class="div-wrapper">
                        <div class="overlap-group-4">
                          <div class="text-wrapper-17">1</div>
                        </div>
                      </div>
                      <div class="overlap-wrapper">
                        <div class="overlap-5">
                          <div class="text-wrapper-18">2</div>
                        </div>
                      </div>
                      <div class="overlap-wrapper">
                        <div class="overlap-5">
                          <div class="text-wrapper-18">3</div>
                        </div>
                      </div>
                      <img
                        class="dropdown"
                        src="img/dropdown-1.svg"
                        alt="new"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="right-menu">
            <div class="menu-2">
              <div class="placeholder"></div>
              <div class="name">
                <div class="text-wrapper-19">Sandhavi</div>
                <div class="text-wrapper-20">Admin</div>
              </div>
              <div class="notification">
                <div class="overlap-group-5">
                  <img class="bell" src="img/bell.svg" alt="new" />
                  <div class="ellipse-2"></div>
                </div>
              </div>
              <div class="setting">
                <img class="gear" src="img/gear.svg" alt="new" />
              </div>
            </div>
            <div class="contact">
              <div class="btn-cta">
                <div class="overlap-group-6">
                  <div class="text-wrapper-21">+</div>
                </div>
              </div>
              <div class="title">
                <div class="text-wrapper-22">Recent Users</div>
              </div>
              <div class="element-5">
                <div class="mail-button">
                  <img class="email-2" src="img/email.svg" alt="new" />
                </div>
                <div class="text-5">
                  <div class="text-wrapper-19">Sasanka</div>
                  <div class="text-wrapper-23">‘23 Graduation Party</div>
                </div>
                <div class="profile-picture-2"></div>
              </div>
              <div class="element-6">
                <div class="email-wrapper">
                  <img class="img-2" src="img/email-1.svg" alt="new" />
                </div>
                <div class="text-6">
                  <div class="text-wrapper-19">Sandewmi</div>
                  <div class="text-wrapper-23">21st Birthday</div>
                </div>
                <div class="profile-picture-2"></div>
              </div>
              <div class="element-7">
                <div class="mail-button">
                  <img class="email-2" src="img/email-4.svg" alt="new" />
                </div>
                <div class="text-7">
                  <div class="text-wrapper-19">Kasundie</div>
                  <div class="text-wrapper-23">Farewell Party</div>
                </div>
                <div class="profile-picture-2"></div>
              </div>
              <div class="element-8">
                <div class="mail-button">
                  <img class="email-2" src="img/email-4.svg" alt="new" />
                </div>
                <div class="text-8">
                  <div class="text-wrapper-19">Oshadha</div>
                  <div class="text-wrapper-23">Wedding</div>
                </div>
                <div class="profile-picture-2"></div>
              </div>
              <div class="element-9">
                <div class="mail-button">
                  <img class="email-2" src="img/email-4.svg" alt="new" />
                </div>
                <div class="text-7">
                  <div class="text-wrapper-19">Lakshan</div>
                  <div class="text-wrapper-23">Cocktail Party</div>
                </div>
                <div class="profile-picture-2"></div>
              </div>
              <button class="btn-viewmore">
                <div class="overlap-6">
                  <div class="text-wrapper-24">View More</div>
                </div>
              </button>
            </div>
            <div class="foods-menu">
              <div class="text-wrapper-25">Today’s Events</div>
              <button class="button">
                <div class="overlap-group-7">
                  <div class="text-wrapper-24">View More</div>
                </div>
              </button>
              <div class="list-3">
                <div class="placeholder-2"></div>
                <div class="text-9">
                  <div class="text-wrapper-26">Midnight Masquerade Ball</div>
                  <div class="text-wrapper-27">PartyAnimal23</div>
                </div>
              </div>
              <div class="list-4">
                <div class="placeholder-2"></div>
                <div class="text-10">
                  <div class="text-wrapper-26">BBQ Bash</div>
                  <div class="text-wrapper-27">BBQBOB</div>
                </div>
              </div>
              <div class="list-5">
                <div class="placeholder-2"></div>
                <div class="text-11">
                  <div class="text-wrapper-26">Pizza Party</div>
                  <div class="text-wrapper-27">Social Sally</div>
                </div>
              </div>
            </div>
          </div>
          <div class="school-calendar">
            <div class="overlap-7">
              <div class="overlap-8">
                <div class="text-wrapper-28">Events</div>
                <div class="month-3">
                  <div class="title-2">March 2024</div>
                  <img class="dropdown-2" src="img/dropdown-2.svg" alt="new" />
                </div>
              </div>
              <div class="overlap-9">
                <div class="week">
                  <div class="week-2">
                    <div class="date-4">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-29">4</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-6">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-30">31</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-7">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-31">1</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-8">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-32">2</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-9">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-33">3</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-wrapper">
                      <div class="date-10">
                        <div class="text-wrapper-29">5</div>
                      </div>
                    </div>
                    <div class="date-11">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-34">6</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                  </div>
                  <div class="week-3">
                    <div class="date-4">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-29">11</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-6">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-35">7</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-7">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="tag">
                            <div class="overlap-group-9">
                              <div class="text-wrapper-36">8</div>
                            </div>
                          </div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-8">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-37">9</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-9">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-38">10</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-12">
                      <div class="date-13">
                        <div class="text-wrapper-39">12</div>
                      </div>
                    </div>
                    <div class="date-11">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-40">13</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                  </div>
                  <div class="week-4">
                    <div class="date-4">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-41">18</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-6">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-42">14</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-7">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-43">15</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-8">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-44">16</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-9">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-45">17</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-12">
                      <div class="date-13">
                        <div class="text-wrapper-41">19</div>
                      </div>
                    </div>
                    <div class="date-11">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="tag">
                            <div class="overlap-group-10">
                              <div class="text-wrapper-46">20</div>
                            </div>
                          </div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                  </div>
                  <div class="week-5">
                    <div class="date-4">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-47">25</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-6">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-48">21</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-7">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-49">22</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-8">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="group">
                            <div class="overlap-group-11">
                              <div class="text-wrapper-50">23</div>
                            </div>
                          </div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-9">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-51">24</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-12">
                      <div class="date-13">
                        <div class="text-wrapper-47">26</div>
                      </div>
                    </div>
                    <div class="date-11">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-49">27</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                  </div>
                  <div class="week-6">
                    <div class="date-4">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-52">1</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-6">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-53">28</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-7">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-54">29</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-8">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-55">30</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-9">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-56">31</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                    <div class="date-12">
                      <div class="date-13">
                        <div class="text-wrapper-57">2</div>
                      </div>
                    </div>
                    <div class="date-11">
                      <div class="overlap-group-8">
                        <div class="date-5">
                          <div class="text-wrapper-58">3</div>
                        </div>
                        <div class="background"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="days">
                  <div class="sunday">
                    <div class="text-wrapper-59">Sun</div>
                  </div>
                  <div class="monday">
                    <div class="text-wrapper-60">Mon</div>
                  </div>
                  <div class="tuesday">
                    <div class="text-wrapper-61">Tue</div>
                  </div>
                  <div class="wednesday">
                    <div class="text-wrapper-62">Wed</div>
                  </div>
                  <div class="thursday">
                    <div class="text-wrapper-61">Thu</div>
                  </div>
                  <div class="friday">
                    <div class="text-wrapper-8">Fri</div>
                  </div>
                  <div class="saturday">
                    <div class="text-wrapper-63">Sat</div>
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
