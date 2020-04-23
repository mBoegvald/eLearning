<?php
  // Initiating database connection
    require_once('db/db.php');

  // Validation
  if( isset($_POST['txtEmail']) && 
      isset($_POST['txtPassword']) &&
      isset($_POST['txtName'])
  ){
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
  <title>User Login</title>
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
      <form id="userProfileSettingsForm" class="user-form" action="profile-settings.php" method="POST">
        <h1 class="form-h1">Profile Settings</h1>

        <div style="display:grid">
          <label for="txtName">Name</label>
          <input name="txtName" type="text" placeholder="Name">
          <label for="txtLastName">Lastname</label>
          <input name="txtLastName" type="text" placeholder="Last Name">
        </div>

        <label for="txtEmail">Email Address</label>
        <input name="txtEmail" type="text" placeholder="Email">

        <label for="txtPassword">Password</label>
        <input name="txtPassword" type="password" placeholder="Password">

        <p id="DeleteProfileBtn" href="#">Delete your account</p>
        <p class="delete-helper">You will receive an email to bla bla blaa</p>

        <div class="profile-settings-form-btns">
          <button class="form-btn-secondary">Cancel</button>
          <button class="form-btn">Save</button>
        </div>

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