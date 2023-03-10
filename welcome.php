<?php 
session_start();
if (!isset($_SESSION['U_name'])) {
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>welcome</title>
  <link rel="shortcut icon" href="images_used/depositphotos_237667928-stock-illustration-vector-folded-hands-icon.jpg" type="image/x-icon">
</head>
<link rel="stylesheet" href="welcome.css">

<body>
  <div class="log-out-section">
    <div class="container">
      <div class="log-out">
        <a href="logout.php">
        <button>
          <img src="images_used\96962878-shut-down-power-white-icon-with-shadow-on-transparent-background.webp" alt="Logout">
        </button>
        </a>
      </div>
    </div>
  </div>
  <div class="welcome-section">
    <div class="container">
      <div class="text">
        <h1>Welcome 
          <?php 
          if(isset($_SESSION['U_name'])){
          echo $_SESSION['U_name'];}
          ?>
        !</h1>
        <h2>Here you can view my assignments.</h2>
      </div>
    </div>
  </div>
  <div class="assignment-section">
    <div class="container">
      <ul>
        <span>Click to view</span>
        <li class="assignment-item">
          <a href="A1.php">First Assignment</a>
        </li>
        <li class="assignment-item">
        <a href="A2.php">Second Assignment</a>
        </li>
        <li class="assignment-item" id="a3">
        <a href="A3.php">Third Assignment</a>
        </li>
        <li class="assignment-item" id="a4">
        <a href="A4.php">Fourth Assignment</a>
        </li>
        <li class="assignment-item">
        <a href="A5.php">Fifth Assignment</a>
        </li>
        <li class="assignment-item" id="a6">
        <a href="A6.php">Sixth Assignment</a>
        </li>
      </ul>
    </div>
  </div>
  <form action="query.php" method="get" name="query"></form>

</body>

</html>