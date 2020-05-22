<?php
  // Initiating database connection
    require_once('db/db.php');

  // Validation
  if( isset($_POST['txtEmail']) && 
      isset($_POST['txtPassword'])
  ){
    // Defining Post Variables for sign up
    $sUserEmail = $_POST['txtEmail'];
    $sUserPassword = $_POST['txtPassword'];
    $q = $db->prepare("SELECT * FROM user WHERE email = '$sUserEmail'");
    $q->execute();
    $data = $q->fetchAll();
    $foundUser = $data[0];
    if($foundUser->password == $_POST['txtPassword']) {
      session_start();
      $_SESSION['sEmail'] = $sUserEmail;
      $_SESSION['sFirstName'] = $foundUser->firstname;
      $_SESSION['sUserId'] = $foundUser->userID;
      echo "Hello, User ID: $foundUser->userID. Your Name is $foundUser->firstname, your email is $sUserEmail and your password is correct.";
      header('Location: dashboard.php');
      exit();
    }
      
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
    <link rel="stylesheet" href="css/user.css">
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
  <main id="login">
    <div class="contentContainer">
      <form class="login-form" action="login.php" method="POST">
        <h1 class="form-h1">Login</h1>
        
        <label for="txtEmail">Email</label>
        <input name="txtEmail"  required>

        <label for="txtPassword">Password</label>
        <input name="txtPassword" type="password" required>

        <button class="btn form-btn">Log In</button>
        <a class="login-helper" href="signup.php">Don't have an account? Sign Up.</a>
      </form>
      <a class="back-btn" href="index.php">← Back to ELEARN</a>
    </div>
  </main>
  <!-- <div id="userLoginContainer">
    <div id="userLoginBox">

      <form id="userLoginForm" class="user-form" action="login.php" method="POST">
        <h1 class="form-h1">Login</h1>

        <label for="txtEmail">Email Address</label>
        <input name="txtEmail" type="email" placeholder="Email" required>

        <label for="txtPassword">Password</label>
        <input name="txtPassword" type="password" placeholder="Password" required>
        
        <button class="form-btn">Log In</button>
        <a class="login-helper" href="signup.php">Don't have an account? Sign Up.</a>
      </form>
      <a class="back-btn" href="index.php">← Back to ELEARN</a>
    </div>
    
  </div> -->
  <!-- <a href="signup.php">SIGN UP</a> -->
  <?php
        // include_once("components/footer.html");
    ?>
</body>
</html>