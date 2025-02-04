<!-- This is your index.php file -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="icon" type="image/x-icon" href="../../Include/favicon-icon.svg">
    <title>PartyPRO Dashboard</title>
    <style>
      body {
        font-family: "Poppins", sans-serif;
        background-color: #39004b; 
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
      }
      .card {
        background: white;
        border-radius: 10px;
        padding: 100px;
        margin: 10px;
        width: 200px;
        text-align: center;
        color: black;
        text-decoration: none;
      }
      .card img {
        width: 100%;
        height: auto;
        border-radius: 5px;
      }
      .container {
        display: flex;
        flex-direction: row;
      }
      a {
        color: inherit;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    
    <div class="container">
      <a href="../Login/LoginUser.php" class="card">
        <img
          src="img/friends-celebrating-christmas-at-party.png"
          alt="Party Planner"
        />
        <h2 style="padding-top: 30px">Party Planner</h2>
      </a>
      <a href="../Login-Admin/index.php" class="card">
        <img
          src="img/woman-connects-a-laptop-to-the-server.png"
          alt="Administrator"
        />
        <h2>Administrator</h2>
      </a>
    </div>
    <a
      href="../../index.php"
      style="color: white; position: absolute; top: 20px; left: 20px"
      >← Back to the website</a
    >
  </body>
</html>
