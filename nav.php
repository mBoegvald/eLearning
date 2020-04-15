<?php 
  
  // Get the users status/mode
  $mode = 'none';
  if(isset($_SESSION['bAdmin'])){
      if($_SESSION['bAdmin']){
        $mode = 'admin';
      }else{
          $mode = 'user';
      }
  }

  // Create arrays for the 3 different options

$navOptions = [
  'none' => [
    '<div class="navbar-collapse">',
    '<a href="#" class="red-btn">Sign up</a>',
    '<a href="#" class="red-btn">Login</a>',
    '</div>'
  ],
  'user' => [
    '<div class="navbar-collapse">',
    '<a href="#" class="red-btn">Sign up</a>',
    '<a href="#" class="red-btn">Log out</a>',
    '</div>'
  ],
  'admin' => [
    '<div class="navbar-collapse">',
    '<a href="#" class="red-btn">Sign up</a>',
    '<a href="#" class="red-btn">Log out</a>',
    '</div>'
  ]
];
  ?>
    <nav>
      <div id="mobile-container">
        <div class="logo">
          <a href="#"><img src="burger.png" alt="" /></a>
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
