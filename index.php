<?php 
    session_start();
    if(!isset($_SESSION['sUserId'])) {
        $buttonLink = 'signup';
    }
    else {
        $buttonLink = 'dashboard';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/icons.css" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/slideshow.css">
    <title>E-learning</title>
</head>
<body>
    <?php
        include_once("components/nav.php");
    ?>
    <main id="landing">
        <div class="contentContainer">
            <img id="play" class="icons" src="pics/play.svg" alt="">
            <img id="computer" class="icons" src="pics/computer.svg" alt="">
            <img id="brain" class="icons" src="pics/brain.svg" alt="">
            <img id="book" class="icons" src="pics/book.svg" alt="">
            <img id="headphones" class="icons" src="pics/headphones.svg" alt="">
            <img id="mouse" class="icons" src="pics/mouse.svg" alt="">
            <div class="mainContent">
                <h1><span class="emphasize">Learn</span> how<br> to build<br> <span class="emphasize">databases</span></h1>
                <p>Learn DB provides everything you need to know about databases and how to build databases from scratch. Start learning by signing up.</p>
                <button class="btn" onclick="window.location.href = '<?=$buttonLink?>.php'">Get started</button>
            </div>
        </div>
    </main>
    <section id="information">
        <div class="contentContainer">
            <div class="info-content">
                <div class="info-element">
                    <div class="info-element-header">
                        <img src="./pics/learning.svg" alt="">
                        <h1>Learning made easy</h1>
                    </div>
                    <div class="info-element-text">
                        <p>
                             Our goal is to make learning easy for everyone who wants to learn and understand how to build a database from the begining. Learn DB provides online courses with videoes that gives a lot of knowledge. 
                        </p>
                    </div>
                </div>
                <hr>
                <div class="info-element">
                    <div class="info-element-header">
                        <img src="./pics/house.svg" alt="house"/>
                        <h1>Learn from home</h1>
                    </div>
                    <div class="info-element-text">
                        <p>
                            Learn DB makes it possible for you,  to learn about databases from home or anywhere you prefer to study. Learn DB is on the go with you. 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="reviews">
        <div class="contentContainer">
            <h1>Here is what our users say</h1>
            <div class="mainContent slide">
                <h1>Great courses!</h1>
                <p>Learn DB makes it easy to learn about databases and i love that i can take the courses on my way to school.</p>
                <div class="stars">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                </div>
            </div>
            <div class="mainContent slide">
                <h1>Thank you Learn DB</h1>
                <p>I struggled a lot understanding databases but Learn DB made it easy for me to build databases.</p>
                <div class="stars">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                </div>
            </div>
            <div class="mainContent slide">
                <h1>Nice job</h1>
                <p>I already had knowledge about building database but after a few years away from it, Learn DB helped me to get back on track. Also the website is easy to use.</p>
                <div class="stars">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                </div>
            </div>
        </div>
        <div class="slideLines">
            <span class="line" onclick="currentSlide(1)"></span>
            <span class="line" onclick="currentSlide(2)"></span>
            <span class="line" onclick="currentSlide(3)"></span>
        </div>
    </section>
    <?php include_once("components/footer.html");?>
    <script src="js/slideshow.js"></script>
</body>
</html>