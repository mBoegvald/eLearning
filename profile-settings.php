<?php
  require_once('has-access.php');
  // Initiating database connection
  require_once('db/db.php');
  
  $sUserID = $_SESSION['sUserId'];

  // Validation
  if( isset($_POST['txtEmail']) && 
      isset($_POST['txtPassword']) &&
      isset($_POST['txtFirstName']) &&
      isset($_POST['txtLastName'])
  ){
    $sFirstName = $_POST['txtFirstName'];
    $sLastName = $_POST['txtLastName'];
    $sEmail = $_POST['txtEmail'];
    $sPassword = $_POST['txtPassword'];
    $updateQ = $db->prepare(
      "UPDATE `user` 
      SET `firstname`='$sFirstName', `lastname`='$sLastName', `email`='$sEmail', `password`='$sPassword' 
      WHERE userID = '$sUserID'");
    $updateQ->execute();
  }
  $q = $db->prepare("SELECT * FROM user WHERE userID = '$sUserID'");
  $q->execute();
    
  $data = $q->fetchAll();
  $foundUser = $data[0];
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/user.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/courses.css">
</head>
<body>
<?php
      include_once("components/nav.php");
?>
  <main id="profile">
    <div class="contentContainer">
      <form class="profile-form" action="profile-settings.php" method="POST">
        <h1 class="form-h1">Profile Settings</h1>

        <div class="form-name-container">
          <div>
            <label for="txtFirstName">Name</label>
            <input name="txtFirstName" type="text" placeholder="Name" value="<?= "$foundUser->firstname" ?>">
          </div>
          <div>
            <label for="txtLastName">Lastname</label>
            <input name="txtLastName" type="text" placeholder="Last Name" value="<?= "$foundUser->lastname" ?>">
          </div>
        </div>

        <label for="txtEmail">Email Address</label>
        <input name="txtEmail" type="text" placeholder="Email" value="<?= "$foundUser->email" ?>">

        <label for="txtPassword">Password</label>
        <input class="password" name="txtPassword" type="password" placeholder="Password" value="<?= "$foundUser->password" ?>">
        <button class="change-btn" onclick="togglePassword(); return false;">Show password</button>

        <button class="deleteProfileBtn" onclick="showDeletePopup(); return false;">Delete your account</button>
        
        <div class="profile-settings-form-btns">
          <a href="dashboard.php" class="btn form-btn-secondary">Cancel</a>
          <button class="btn form-btn">Save</button>
        </div>

      </form>
    </div>
  </main>

  <div id="deleteProfileModal" class="modal">
    <div class="modal-wrapper">
      <p class="modal-text">Are you sure you want to permanently delete your profile?</p>
      <div class="profile-settings-form-btns">
        <button class="btn form-btn-secondary" onclick="showDeletePopup()">Cancel</button>
        <button class="form-btn" onclick="window.location.href = 'delete-profile.php'";>Yes</button>    
      </div>
    </div>
  </div>
  <?php
        include_once("components/footer.html");
    ?>
    <script>
      function showDeletePopup() {
        document.querySelector('#deleteProfileModal').classList.toggle("show"); 
      }

      function togglePassword() {
        let myInput = document.querySelector(".password");
        let changeButton = document.querySelector(".change-btn");
        
        if(myInput.type === "password") {
          myInput.type = "text"; 
          changeButton.textContent = "Hide password"
        } else {
          myInput.type = "password";
          changeButton.textContent = "Show password"};
      }
    </script>

</body>
</html>