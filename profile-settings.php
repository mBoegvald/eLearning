<?php
  require_once('has-access.php');
  // Initiating database connection
  require_once('db/db.php');
  try{
    $sUserID = $_SESSION['sUserId'];

    // Validation
    if( isset($_POST['txtEmail']) && 
        isset($_POST['txtPassword']) &&
        isset($_POST['txtFirstName']) &&
        isset($_POST['txtLastName'])
    ){
      $firstname = $_POST['txtFirstName'];
      $lastname = $_POST['txtLastName'];
      $email = $_POST['txtEmail'];
      $password = $_POST['txtPassword'];
      
        $updateQ = $db->prepare(
        "UPDATE `user` SET `firstname`='$firstname', `lastname`='$lastname', `email`='$email', `password`='$password' 
        WHERE userID='$sUserID'");
        $updateQ->execute();

    }

    $q = $db->prepare("SELECT * FROM user WHERE userID = '$sUserID'");
    $q->execute();
    $data = $q->fetchAll();

    $foundUser = $data[0];
  }catch(PDOException $ex) {
    echo $ex;
  }

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
          <label for="txtFirstName">Firstname</label>
          <input name="txtFirstName" type="text" placeholder="First Name" value="<?= "$foundUser->firstname" ?>">

          <label for="txtLastName">Lastname</label>
          <input name="txtLastName" type="text" placeholder="Last Name" value="<?= "$foundUser->lastname" ?>">
        </div>

        <label for="txtEmail">Email Address</label>
        <input name="txtEmail" type="text" placeholder="Email" value="<?= "$foundUser->email" ?>">

        <label for="txtPassword">Password</label>
        <input name="txtPassword" type="password" placeholder="Password" value="<?= "$foundUser->password" ?>">

        <button id="deleteProfileBtn" onclick="showDeletePopup(); return false;">Delete your account</button>

        <div class="profile-settings-form-btns">
          <button class="form-btn-secondary">Go Back</button>
          <button class="form-btn">Save</button>
        </div>

      </form>
      <a class="back-btn" href="index.php">← Back to ELEARN</a>
    </div>
    
  </div>
  <div id="deleteProfileModal" class="modal">
    <div class="modal-wrapper">
      <p class="modal-text">Are you sure you want to permanently delete your profile?</p>
      <div class="profile-settings-form-btns">
      <button class="form-btn-secondary" onclick="showDeletePopup()">Cancel</button>
      <button class="form-btn" onclick="window.location.href = 'delete-profile.php'";>Yes</button>
        
           
      </div>
  </div>
  </div>
  <!-- <a href="signup.php">SIGN UP</a> -->
  <?php
        include_once("components/footer.html");
    ?>
  <script src='profile-settings.js'></script>
</body>
</html>