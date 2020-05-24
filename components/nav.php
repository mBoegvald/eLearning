<?php 
  
  // Get the users status/mode
  $mode = 'none';
  if(isset($_SESSION['sUserId'])){
      if($_SESSION['sUserId']){
        $mode = 'user';
      }
  }

  // Create arrays for the 3 different options

  $navOptions = [
    'none' => [
      '<div class="navbar-collapse">',
        '<ul>',
          '<li><a href="signup.php" class="red-btn">Sign up</a></li>',
          '<li><a href="login.php" class="red-btn">Login</a></li>',
        '</ul>',
      '</div>'
    ],
    'user' => [
      '<div class="navbar-collapse">',
        '<ul>',
          '<li><a href="dashboard.php">Dashboard</a></li>',
          '<li><a href="profile-settings.php">Profile</a></li>',
          '<li><a href="logout.php" class="red-btn">Log out</a></li>',
        '</ul>',
      '</div>'
    ]
    // ,
    // 'admin' => [
    //   '<div class="navbar-collapse">',
    //     '<ul>',
    //       '<li><a href="#">Dashboard</a></li>',
    //       '<li><a href="#">Profile</a></li>',
    //       '<li><a href="#" class="red-btn">Log out</a></li>',
    //     '</ul>',
    //   '</div>'
    // ]
  ];
  ?>
    <nav>
      <div id="mobile-container">
        <div class="logo">
          <a href="index.php"><img src="./pics/lightbulb.png" alt="">Learn<span class="emphasize">DB</span></a>
        </div>
        <div class="navbar-toggler">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </div>
      <?php 

      foreach ($navOptions[$mode] as $option){
        echo $option;
      }
      ?>
    </nav>

    <script>
      document
        .querySelector(".navbar-toggler")
        .addEventListener("click", () => {
          let navbarToggle = document.querySelector(".navbar-collapse");
          navbarToggle.classList.toggle("showCollapse");

          document.querySelector(".navbar-toggler").classList.toggle("change");
        });
    </script>
