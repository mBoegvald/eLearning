<?php
  require_once('has-access.php');
  // Initiating database connection
  require_once('db/db.php');
  
  $sUserID = $_SESSION['sUserId'];

      $q = $db->prepare("SELECT * FROM user WHERE userID = '$sUserID'");
      $q->execute();

      $data = $q->fetchAll();
      $foundUser = $data[0];

  // Validation
  if( isset($_POST['txtEmail']) && 
      isset($_POST['txtPassword']) &&
      isset($_POST['txtFirstName']) &&
      isset($_POST['txtLastName'])
  ){
    $updateQ = $db->prepare(
      "UPDATE user WHERE userID = '$sUserID'");
    $updateQ->execute();
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
          <input name="txtName" type="text" placeholder="Name" value="<?= "$foundUser->firstname" ?>" disabled>
          <button class="change-btn" onclick="toggleInput(txtName); return false;">Change</button>

          <label for="txtLastName">Lastname</label>
          <input name="txtLastName" type="text" placeholder="Last Name" value="<?= "$foundUser->lastname" ?>" disabled>
          <button class="change-btn" onclick="toggleInput(txtLastName); return false;">Change</button>

        </div>

        <label for="txtEmail">Email Address</label>
        <input name="txtEmail" type="text" placeholder="Email" value="<?= "$foundUser->email" ?>" disabled>
        <button class="change-btn" onclick="toggleInput(txtEmail); return false;">Change</button>

        <label for="txtPassword">Password</label>
        <input name="txtPassword" type="password" placeholder="Password" value="<?= "$foundUser->password" ?>" disabled>
        <button class="change-btn" onclick="toggleInput(txtPassword); return false;">Change</button>

        <button id="DeleteProfileBtn" onclick="showDeletePopup(); return false;">Delete your account</button>
        <p class="delete-helper">You will receive an email to bla bla blaa</p>

        <div class="profile-settings-form-btns">
          <button class="form-btn-secondary">Go Back</button>
          <button class="form-btn">Save</button>
        </div>

      </form>
      <a class="back-btn" href="index.php">← Back to ELEARN</a>
    </div>
    
  </div>
  <div id="DeleteProfileModal" class="modal">
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
    <script>

      function toggleInput(input) {
        if (!input.disabled) {
          input.disabled = true;
        } else if (input.disabled) {
          input.disabled = false;
        }
      }

      function showDeletePopup() {
       
        document.querySelector('#DeleteProfileModal').classList.toggle("show");
        console.log (document.querySelector('#DeleteProfileModal'));
        
      }
    </script>
</body>
</html>