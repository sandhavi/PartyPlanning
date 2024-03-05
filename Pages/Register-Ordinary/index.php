<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <link rel="icon" type="image/x-icon" href="../../Include/favicon-icon.svg">
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style.css" />


  </head>
  <body>
    <div class="register-ordinary">
      <div class="div">
        <div class="overlap">
          <div class="group"><div class="group-2"></div></div>
          <div class="back-to-website">
            <div class="text-wrapper">
              <a href="../Home/index.php" style="color: aliceblue;">
                Back to the website
              </a>
              
            </div>
            <img class="icon-left" src="img/icon-left.svg" alt="new" />
          </div>
        </div>
        <div class="group-3">
          <form action="../../Backend/usersave.php" method="post">
            <div class="group-4">
              <div class="text-wrapper-2">Sign up</div>
              <div class="group-5">
                <p class="p">If you already have an account register</p>
                <p class="you-can-login-here">
                  <span class="span">You can&nbsp;&nbsp; </span>
                  <span class="text-wrapper-3">
                    <a href="../Login/LoginUser.php">
                      Login here !
                    </a>
                  </span>
                </p>
              </div>
            </div>
            <div class="group-6">
              <div class="text-wrapper-4">Username</div>
              <input
                class="text-wrapper-5"
                placeholder="Enter your Email"
                type="text"
                name="email"
                style="border:none;"
              />
              <div class="rectangle"></div>
              <img class="message" src="img/message-1.svg" alt="new" />
            </div>
            <div class="group-7">
              <div class="text-wrapper-6">Confrim Password</div>
              <div class="rectangle-2"></div>
              <div class="group-8">
                <input
                  class="text-wrapper-7"
                  placeholder="Confrim Your Password"
                  type="password"
                  name="cpassword"
                  style="border:none;"
                />
                <img class="padlock" src="img/padlock-1-1.svg" alt="'new" />
              </div>
            </div>
            <div class="group-9">
              <div class="text-wrapper-6">Password</div>
              <div class="rectangle-2"></div>
              <div class="group-10">
                <input
                  class="text-wrapper-7"
                  placeholder="Enter your Password"
                  type="password"
                  name="password"
                  style="border:none;"
                />
                <img class="img" src="img/padlock-1.svg" alt="new" />
              </div>
            </div>
            <div class="overlap-group-wrapper">
              <button type="submit" class="overlap-group">
                <div class="text-wrapper-10" style="color: aliceblue; font-size: x-large;">Login</div>
              </button>
            </div>
            <div class="overlap-wrapper">
              <div class="overlap-2">
                <div class="group-11">
                  <div class="text-wrapper-4">Username</div>
                  <input
                    class="text-wrapper-5"
                    placeholder="Enter your User Name"
                    type="text"
                    name="username"
                    style="border:none;"
                  />
                  <div class="rectangle-3"></div>
                </div>
                <img class="user" src="img/user-1.svg" alt="" new />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    
  </body>
</html>
