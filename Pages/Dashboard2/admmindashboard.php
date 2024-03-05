<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/x-icon" href="../../Include/favicon-icon.svg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      <div class="text-wrapper">Users</div>
      <div class="student-list">
        <div class="students-list">
          <div class="navbar">
            <div class="check"></div>
            <div class="text-wrapper-2">ID</div>
            <div class="text-wrapper-3">Name</div>
            <div class="text-wrapper-4">Membership</div>
            <div class="text-wrapper-5">Last LogIn</div>
            <div class="text-wrapper-6">Email</div>
            <div class="text-wrapper-7">City</div>
            <div class="text-wrapper-8">Contact</div>
            <div class="text-wrapper-9">Action</div>
          </div>
          <div class="pagination">

            <div class="page">
              <img class="dropdown" src="img/dropdown.svg" alt="new" alt="new" />
              <div class="element">
                <div class="overlap-group">
                  <div class="text-wrapper-11">1</div>
                </div>
              </div>
              <div class="overlap-wrapper">
                <div class="overlap">
                  <div class="text-wrapper-12">2</div>
                </div>
              </div>
              <div class="overlap-wrapper">
                <div class="overlap">
                  <div class="text-wrapper-12">3</div>
                </div>
              </div>
              <img class="dropdown" src="img/dropdown-2.svg" alt="new" alt="new" />
            </div>
          </div>
          <div class="overlap-2">
            <div class="border">
              <div class="border-2"></div>
              <div class="border-3"></div>
              <div class="border-4"></div>
              <div class="border-5"></div>
              <div class="border-6"></div>
              <div class="border-7"></div>
            </div>
            <div class="list">
              <div class="overlap-group-wrapper">
                <div class="overlap-3">
                  <div class="contact">
                    <div class="div-wrapper">
                      <div class="overlap-group-2">
                        <div class="placeholder"></div>
                        <img class="img" src="img/call.svg" alt="new" alt="new" />
                      </div>
                    </div>
                    <div class="div-wrapper">
                      <div class="overlap-group-2">
                        <div class="placeholder"></div>
                        <img class="img" src="img/email.svg" alt="new" alt="new" />
                      </div>
                    </div>
                  </div>
                  <div class="selected"></div>
                  <div class="checkedbox">
                    <img class="vector" src="img/vector-8.svg" alt="new" alt="new" />
                  </div>
                  <div class="customer">
                    <div class="placeholder-2"></div>
                    <div class="name">
                      <div class="text-wrapper-13">Samanta William</div>
                    </div>
                  </div>
                  <div class="text-wrapper-14">March 25, 2021</div>
                  <div class="text-wrapper-15">Mana William</div>
                  <div class="text-wrapper-16">Jakarta</div>
                  <div class="text-wrapper-17">#123456789</div>
                  <div class="status">
                    <div class="content">
                      <div class="text-wrapper-18">Basic</div>
                    </div>
                  </div>
                  <img class="dots" src="img/dots.svg" alt="new" alt="new" />
                </div>
              </div>
              <div class="overlap-group-wrapper">
                <div class="overlap-3">
                  <div class="contact">
                    <div class="div-wrapper">
                      <div class="overlap-group-2">
                        <div class="placeholder"></div>
                        <img class="img" src="img/call.svg" alt="new" alt="new" />
                      </div>
                    </div>
                    <div class="div-wrapper">
                      <div class="overlap-group-2">
                        <div class="placeholder"></div>
                        <img class="img" src="img/email.svg" alt="new" alt="new" />
                      </div>
                    </div>
                  </div>
                  <div class="text-wrapper-16">Jakarta</div>
                  <div class="content-wrapper">
                    <div class="content-2">
                      <div class="text-wrapper-18">Standard</div>
                    </div>
                  </div>
                  <div class="text-wrapper-15">James Soap</div>
                  <div class="check-2"></div>
                  <div class="customer">
                    <div class="placeholder-2"></div>
                    <div class="name">
                      <div class="text-wrapper-13">Tony Soap</div>
                    </div>
                  </div>
                  <div class="text-wrapper-14">March 25, 2021</div>
                  <div class="text-wrapper-17">#123456789</div>
                  <img class="dots" src="img/dots.svg" alt="new" alt="new" />
                </div>
              </div>
              <div class="overlap-group-wrapper">
                <div class="overlap-3">
                  <div class="contact">
                    <div class="div-wrapper">
                      <div class="overlap-group-2">
                        <div class="placeholder"></div>
                        <img class="img" src="img/call.svg" alt="new" alt="new" />
                      </div>
                    </div>
                    <div class="div-wrapper">
                      <div class="overlap-group-2">
                        <div class="placeholder"></div>
                        <img class="img" src="img/email.svg" alt="new" alt="new" />
                      </div>
                    </div>
                  </div>
                  <div class="selected"></div>
                  <div class="checkedbox">
                    <img class="vector" src="img/vector-8.svg" alt="new" alt="new" />
                  </div>
                  <div class="customer">
                    <div class="placeholder-2"></div>
                    <div class="name">
                      <div class="text-wrapper-13">Karen Hope</div>
                    </div>
                  </div>
                  <div class="text-wrapper-14">March 25, 2021</div>
                  <div class="text-wrapper-15">Justin Hope</div>
                  <div class="text-wrapper-16">Jakarta</div>
                  <div class="text-wrapper-17">#123456789</div>
                  <div class="status-2">
                    <div class="content">
                      <div class="text-wrapper-18">Premium</div>
                    </div>
                  </div>
                  <img class="dots" src="img/dots.svg" alt="new" alt="new" />
                </div>
              </div>
              <div class="overlap-group-wrapper">
                <div class="overlap-3">
                  <div class="contact">
                    <div class="div-wrapper">
                      <div class="overlap-group-2">
                        <div class="placeholder"></div>
                        <img class="img" src="img/call.svg" alt="new" alt="new" />
                      </div>
                    </div>
                    <div class="div-wrapper">
                      <div class="overlap-group-2">
                        <div class="placeholder"></div>
                        <img class="img" src="img/email.svg" alt="new" alt="new" />
                      </div>
                    </div>
                  </div>
                  <div class="text-wrapper-16">Jakarta</div>
                  <div class="content-wrapper">
                    <div class="content-2">
                      <div class="text-wrapper-18">Standard</div>
                    </div>
                  </div>
                  <div class="text-wrapper-15">Amanda Nico</div>
                  <div class="check-2"></div>
                  <div class="customer">
                    <div class="placeholder-2"></div>
                    <div class="name">
                      <div class="text-wrapper-13">Jordan Nico</div>
                    </div>
                  </div>
                  <div class="text-wrapper-14">March 25, 2021</div>
                  <div class="text-wrapper-17">#123456789</div>
                  <img class="dots" src="img/dots.svg" alt="new" alt="new" />
                </div>
              </div>
              <div class="overlap-group-wrapper">
                <div class="overlap-3">
                  <div class="contact">
                    <div class="div-wrapper">
                      <div class="overlap-group-2">
                        <div class="placeholder"></div>
                        <img class="img" src="img/call.svg" alt="new" alt="new" />
                      </div>
                    </div>
                    <div class="div-wrapper">
                      <div class="overlap-group-2">
                        <div class="placeholder"></div>
                        <img class="img" src="img/email.svg" alt="new" alt="new" />
                      </div>
                    </div>
                  </div>
                  <div class="selected"></div>
                  <div class="checkedbox">
                    <img class="vector" src="img/vector-8.svg" alt="new" alt="new" />
                  </div>
                  <div class="customer">
                    <div class="placeholder-2"></div>
                    <div class="name">
                      <div class="text-wrapper-13">Nadila Adja</div>
                    </div>
                  </div>
                  <div class="text-wrapper-14">March 25, 2021</div>
                  <div class="text-wrapper-15">Jack Adja</div>
                  <div class="text-wrapper-16">Jakarta</div>
                  <div class="text-wrapper-17">#123456789</div>
                  <div class="status">
                    <div class="content">
                      <div class="text-wrapper-18">Basic</div>
                    </div>
                  </div>
                  <img class="dots" src="img/dots.svg" alt="new" alt="new" />
                </div>
              </div>
              <div class="overlap-group-wrapper">
                <div class="overlap-3">
                  <div class="contact">
                    <div class="div-wrapper">
                      <div class="overlap-group-2">
                        <div class="placeholder"></div>
                        <img class="img" src="img/call.svg" alt="new" alt="new" />
                      </div>
                    </div>
                    <div class="div-wrapper">
                      <div class="overlap-group-2">
                        <div class="placeholder"></div>
                        <img class="img" src="img/email.svg" alt="new" alt="new" />
                      </div>
                    </div>
                  </div>
                  <div class="text-wrapper-16">Jakarta</div>
                  <div class="content-wrapper">
                    <div class="content-2">
                      <div class="text-wrapper-18">Standard</div>
                    </div>
                  </div>
                  <div class="text-wrapper-15">Danny Ahmad</div>
                  <div class="check-2"></div>
                  <div class="customer">
                    <div class="placeholder-2"></div>
                    <div class="name">
                      <div class="text-wrapper-13">Johnny Ahmad</div>
                    </div>
                  </div>
                  <div class="text-wrapper-14">March 25, 2021</div>
                  <div class="text-wrapper-17">#123456789</div>
                  <img class="dots" src="img/dots.svg" alt="new" alt="new" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="student-menu">
        <div class="new-student-button">
          <div class="content-3">
            <img class="img-2" src="img/image.svg" alt="new" alt="new" />
            <div class="text-wrapper-19">New Student</div>
          </div>
        </div>
        <div class="sort">
          <div class="content-4">
            <div class="text-wrapper-20">Newest</div>
            <img class="dropdown" src="img/dropdown-1.svg" alt="new" alt="new" />
          </div>
        </div>
        <div class="search-bar">
          <div class="frame">
            <img class="search" src="img/search.svg" alt="new" alt="new" />
            <div class="text-wrapper-21">Search here...</div>
          </div>
        </div>
      </div>
      <div class="menu">
        <div class="placeholder-3"></div>
        <div class="name-2">
          <div class="text-wrapper-22">Sandhavi</div>
          <div class="text-wrapper-23">Admin</div>
        </div>
        <div class="notification">
          <div class="overlap-group-3">
            <img class="bell" src="img/bell.svg" alt="new" alt="new" />
            <div class="ellipse"></div>
          </div>
        </div>
        <div class="setting">
          <img class="gear" src="img/gear.svg" alt="new" alt="new" />
        </div>
      </div>
    </div>
  </div>
</body>

</html>
