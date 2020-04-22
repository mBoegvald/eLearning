<?php
  // Initiating database connection
    require_once('db_crud.php');

  // Validation
  if( isset($_POST['txtEmail']) && 
      isset($_POST['txtPassword']) &&
      isset($_POST['txtFirstName']) &&
      isset($_POST['txtLastName']) 
  ){
    // Defining Post Variables for sign up
    $sUserFirstName         = $_POST['txtFirstName'];
    $sUserLastName         = $_POST['txtLastName'];
    $sUserEmail         = $_POST['txtEmail'];
    $sUserPassword      = $_POST['txtPassword'];
      // Inserting new user into crud database
      $q = $db->prepare("INSERT INTO `user` (`userID`, `firstname`,`lastname`, `email`, `password`) 
      VALUES (NULL, '$sUserFirstName','$sUserLastName', '$sUserEmail', '$sUserPassword')");
      $q->execute();
      
      echo "New user created successfully";


      // To start using sessions/cookies 
      session_start();
      // You can put anything in the session
      $_SESSION['sEmail'] = $sUserEmail;
      $_SESSION['sFirstName'] = $sUserFirstName;
      
      header('Location: login.php');
      exit();
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
  <div id="userLoginContainer">
    <div id="userLoginBox">

      <form id="userSignupForm" class="user-form" action="signup.php" method="POST">
      <h1 class="form-h1">Sign Up</h1>

        <div style="display:grid">
          <label for="txtFirstName">Name</label>
          <input name="txtFirstName" type="text" placeholder="First Name" value="Joshua">
          <label for="txtLastName">Lastname</label>
          <input name="txtLastName" type="text" placeholder="Last Name" value="Kaplan">
        </div>

        <label for="txtEmail">Email Address</label>
        <input name="txtEmail" type="text" placeholder="Email" value="joshkap2015@gmail.com">

        <label for="txtPassword">Password</label>
        <input name="txtPassword" type="password" placeholder="Password" value="admin">

        <button class="form-btn">Sign Up</button>
        <a class="login-helper" href="login.php">Already have an account? Login.</a>
        
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