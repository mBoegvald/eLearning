<?php
  // Initiating database connection
    require_once('db/db.php');

  // Validation
  if( isset($_POST['txtEmail']) && 
      isset($_POST['txtPassword']) &&
      isset($_POST['txtFirstName']) &&
      isset($_POST['txtLastName'])

  ){
    // Defining Post Variables for sign up
    $sUserFirstName = $_POST['txtFirstName'];
    $sUserLastName = $_POST['txtLastName'];
    $sUserEmail = $_POST['txtEmail'];
    $sUserPassword = $_POST['txtPassword'];
    $sUserID = bin2hex(random_bytes(8));
      // Inserting new user into crud database
    $q = $db->prepare("INSERT INTO `user` (`userID`, `firstname`,`lastname`, `email`, `password`) 
      VALUES ('$sUserID', '$sUserFirstName','$sUserLastName', '$sUserEmail', '$sUserPassword')");
    $q->execute();

      // To start using sessions/cookies 
      session_start();
      // You can put anything in the session
      $_SESSION['sEmail'] = $sUserEmail;
      $_SESSION['sFirstName'] = $sUserFirstName;
      
      header('Location: login.php');
      exit();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
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
  <main id="signup">
    <div class="contentContainer">
      <form class="signup-form" onsubmit="return validate()" action="signup.php" method="POST">
        <h1 class="form-h1">Sign Up</h1>

        <div style="display:grid">
          <label for="txtFirstName">Name</label>
          <input oninput="validate()" type="text" data-validate="string" name="txtFirstName" placeholder="First Name" required>
          <label for="txtLastName">Lastname</label>
          <input oninput="validate()" type="text" data-validate="string" name="txtLastName" type="text" placeholder="Last Name" required>
        </div>

        <label for="txtEmail">Email Address</label>
        <input oninput="validate()" data-validate="email" name="txtEmail" type="email" placeholder="Email" required>

        <label for="txtPassword">Password <span class="label-span">(must be 8-32 characters and include a number)</span></label>
        <input oninput="validate()" data-validate="password" name="txtPassword" type="password" placeholder="Password" required>

        <button class="btn form-btn">Sign Up</button>
        <a class="login-helper" href="login.php">Already have an account? Login.</a>
          
      </form>
    </div>
  </main>
 
  <?php
    include_once("components/footer.html");
  ?>
  <script src="js/validate.js"></script>
</body>
</html>