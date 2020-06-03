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
    if(!isset($data[0])) {
      echo "<script type='text/javascript'>alert('Wrong email or password');</script>";
    }else {
      $foundUser = $data[0];
      if($foundUser->password == $_POST['txtPassword']) {
        session_start();
        $_SESSION['sEmail'] = $sUserEmail;
        $_SESSION['sFirstName'] = $foundUser->firstname;
        $_SESSION['sUserId'] = $foundUser->userID;
        header('Location: dashboard.php');
        exit();
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/user.css">
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/courses.css">
   
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
    </div>
  </main>
  
  <?php
        include_once("components/footer.html");
    ?>
</body>
</html>