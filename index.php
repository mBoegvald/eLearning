<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>E-learning</title>
</head>
<body>
    <?php
        include_once("components/nav.php");
    ?>
    <main>
        <section id="intro">
            <div class="intro-content">
                <div class="intro-element">
                    <div class="intro-element-header">
                        <img src="./pics/learning.png" alt="">
                        <h1>Overskrift</h1>
                    </div>
                    <div class="intro-element-text">
                        <p>
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                            aut fugit, sed quia consequuntur magni dolores eos qui ratione
                            voluptatem sequi nesciunt. Neque porro quisquam est. t.
                        </p>
                    </div>
                </div>
                <div class="intro-element">
                    <div class="intro-element-header">
                    <img src="./pics/house.png" alt="house"/>
                    <h1>Overskrift</h1>
                    </div>
                    <div class="intro-element-text">
                        <p>
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                            aut fugit, sed quia consequuntur magni dolores eos qui ratione
                            voluptatem sequi nesciunt. Neque porro quisquam est. t.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section id="banner">
            <div class="banner-content">
                <div class="banner-text">
                    <h2>Overskrift</h2>
                    <p>
                        Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                        fugit, sed quia consequuntur magni dolores eos qui ratione
                        voluptatem sequi nesciunt. Neque porro quisquam est. t.
                    </p>
                </div>
                <div class="banner-buttons">
                    <button class="btn signup-button">Sign up</button>
                    <button class="btn read-more-button">Read more</button>
                </div>
            </div>
        </section>
        <section id="courses">
            <div class="courses-intro"><h1>Overskrift</h1>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut aut inventore exercitationem necessitatibus repellendus mollitia ratione iure debitis, fuga est cupiditate eum, quasi velit praesentium ad corrupti modi aperiam dolore!
                </p>
            </div>
            <?php 
                include_once("components/courses.html");
            ?>
        </section>
    </main>
    <?php
        include_once("components/footer.html");
    ?>
</body>
</html>