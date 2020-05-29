<?php 
    session_start();
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
            <img id="play" class="icons" src="pics/play.png" alt="">
            <img id="computer" class="icons" src="pics/computer.png" alt="">
            <img id="brain" class="icons" src="pics/brain.png" alt="">
            <img id="book" class="icons" src="pics/book.png" alt="">
            <img id="headphones" class="icons" src="pics/headphones.png" alt="">
            <img id="mouse" class="icons" src="pics/mouse.png" alt="">
            <div class="mainContent">
                <h1><span class="emphasize">Learn</span> how<br> to build<br> <span class="emphasize">databases</span></h1>
                <p>Aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est. t. </p>
                <button class="btn">Get started</button>
            </div>
        </div>
    </main>
    <section id="information">
        <div class="contentContainer">
            <div class="info-content">
                <div class="info-element">
                    <div class="info-element-header">
                        <img src="./pics/learning.png" alt="">
                        <h1>Overskrift</h1>
                    </div>
                    <div class="info-element-text">
                        <p>
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                            aut fugit, sed quia consequuntur magni dolores eos qui ratione
                            voluptatem sequi nesciunt. Neque porro quisquam est. t.
                        </p>
                    </div>
                </div>
                <hr>
                <div class="info-element">
                    <div class="info-element-header">
                        <img src="./pics/house.png" alt="house"/>
                        <h1>Overskrift</h1>
                    </div>
                    <div class="info-element-text">
                        <p>
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                            aut fugit, sed quia consequuntur magni dolores eos qui ratione
                            voluptatem sequi nesciunt. Neque porro quisquam est. t.
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
                <h1>Overskrift 1</h1>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est. t. </p>
                <div class="stars">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                </div>
            </div>
            <div class="mainContent slide">
                <h1>Overskrift 2</h1>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est. t. </p>
                <div class="stars">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                    <img src="pics/star.png">
                </div>
            </div>
            <div class="mainContent slide">
                <h1>Overskrift 3</h1>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est. t. </p>
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
    <script src="slideshow.js"></script>
</body>
</html>