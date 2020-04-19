<?php
  // Initiating database connection
    require_once('db_crud.php');

  // Validation
  if( isset($_POST['txtEmail']) && 
      isset($_POST['txtPassword']) &&
      isset($_POST['txtName'])
  ){
    // Defining Post Variables for sign up
    $sUserName         = $_POST['txtName'];
    $sUserEmail         = $_POST['txtEmail'];
    $sUserPassword      = $_POST['txtPassword'];
      // Inserting new user into crud database
      $sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`) 
      VALUES (NULL, '$sUserName', '$sUserEmail', '$sUserPassword')";
      $db->exec($sql);

      echo "New user created successfully";
      // To start using sessions/cookies 
      session_start();
      // You can put anything in the session
      $_SESSION['sEmail'] = $sUserEmail;
      $_SESSION['sName'] = $sUserName;
      // header('Location: admin-dashboard.php');
      // exit();
  }

  // Testing database connection
  // $sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, 'B', '@B', 'passB')";
  // $db->exec($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/courses.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Lato&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap"
      rel="stylesheet"
    />
</head>
<body>
  <?php
          include_once("components/nav.php");
      ?>
  <div id="userLoginContainer">
    <div id="userLoginBox">

      <form id="userLoginForm" class="user-form" action="login.php" method="POST">
        <h1 class="form-h1">Login</h1>

        <label for="txtEmail">Email Address</label>
        <input name="txtEmail" type="text" placeholder="Email" value="">
        
        <label for="txtPassword">Password</label>
        <input name="txtPassword" type="password" placeholder="Password" value="">
        
        <button class="form-btn">Log In</button>
        <a class="login-helper" href="signup.php">Don't have an account? Sign Up.</a>
      </form>
      <a class="back-btn" href="index.php">← Back to ELEARN</a>
    </div>
    
  </div>
  <!-- <a href="signup.php">SIGN UP</a> -->
  <?php
        include_once("components/footer.html");
    ?>
</body>
</html>