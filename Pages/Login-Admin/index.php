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
    <div class="login-admin">
      <div class="div">
        <div class="overlap">
          <div class="group"><div class="group-2"></div></div>
          <div class="back-to-website">
            <div class="text-wrapper">
              <a href="../../index.php" style="color: whitesmoke"
                >Back to the website</a
              >
            </div>
            <img
              class="icon-left"
              src="img/icon-left.svg"
              alt="new"
              alt="new"
            />
          </div>
        </div>
        <div class="group-3">
          <div class="group-4">
            <div class="group-5">
              <div class="text-wrapper-2">Sign in</div>
              <div class="group-6">
                <p class="p">Login using your admin email address</p>
                <div class="text-wrapper-3">and the password</div>
              </div>
            </div>
            <form action="../../Backend/adminlogin.php" method="post">
              <div class="group-7">
                <div class="group-8">
                  <div class="group-9">
                    <div class="text-wrapper-4">Username</div>
                    <div class="text-wrapper-5">
                      <input
                        placeholder="Enter your Username"
                        type="text"
                        name="username"
                        style="border: none"
                      />
                    </div>
                    <div class="rectangle"></div>
                    <img
                      class="message"
                      src="img/message-1.svg"
                      alt="new"
                      alt="new"
                    />
                  </div>
                  <div class="group-10">
                    <div class="text-wrapper-6">Password</div>
                    <div class="rectangle-2"></div>
                    <div class="group-11">
                      <div class="text-wrapper-7">
                        <input
                          placeholder="Enter Your Password"
                          type="password"
                          name="password"
                          style="border: none"
                        />
                      </div>
                      <img
                        class="padlock"
                        src="img/padlock-1.svg"
                        alt="new"
                        alt="new"
                      />
                    </div>
                  </div>
                </div>
                <div class="group-12"></div>
                <div class="overlap-group-wrapper">
                  <button type="submit" class="overlap-group">
                    <div class="text-wrapper-10">Login</div>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
