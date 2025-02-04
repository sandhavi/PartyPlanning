<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/x-icon" href="../../Include/favicon-icon.svg">
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="../Login-Admin/globals.css" />
    <link rel="stylesheet" href="../Login-Admin/styleguide.css" />
    <link rel="stylesheet" href="../Login-Admin/style.css" />
  </head>
  <body>

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
              src="../Login-Admin/img/icon-left.svg"
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
                <p class="p">If you don't have an account register</p>
                <div class="text-wrapper-3">
                  You can
                  <span style="font-size: large">
                    <a href="../Register-Ordinary/index.php">
                      Register Here !
                    </a>
                  </span>
                </div>
              </div>
            </div>
            <form action="../../Backend/login.php" method="post">
              <div class="group-7">
                <div class="group-8">
                  <div class="group-9">
                    <div class="text-wrapper-4">Username</div>
                    <div class="text-wrapper-5">
                      <input
                        placeholder="Enter your UserName"
                        type="text"
                        name="username"
                        style="border:none;"
                      />
                    </div>
                    <div class="rectangle"></div>
                    <img
                      class="message"
                      src="../Login-Admin/img/message-1.svg"
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
                          placeholder="Enter your Password"
                          type="password"
                          name="password"
                          style="border:none;"
                        />
                      </div>
                      <img
                        class="padlock"
                        src="../Login-Admin/img/padlock-1.svg"
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
