<?php 

try{
    $dbUserName = 'root';
    $dbPassword = '';
    $connection = 'mysql:host=127.0.0.1; dbname=e_learning; charset=utf8mb4';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //TRY CATCH
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ //ALLOWS JSON
        // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //ALLOWS ASSOSIATIVE
    ];
    $db = new PDO($connection, $dbUserName, $dbPassword, $options);

    // $query = $db->prepare('SELECT * FROM courses');
    // $query->execute();
    // $courses = $query->fetchAll();

    // $videoId = 2;

    // foreach($courses as $course) {
    //     if($course->courseId == $videoId) {
    //         $video =
    //         "<div class='videoContainer'>
    //         <h1>$course->courseName</h1>
    //         <iframe 
    //             src='$course->courseLink'
    //             frameborder='0'
    //             allow='accelerometer;
    //             autoplay; 
    //             encrypted-media;
    //             gyroscope;
    //             picture-in-picture'
    //             allowfullscreen>
    //         </iframe>
    //         </div>";
    //     }
    // } 

}catch(PDOExecption $ex){
echo $ex;
}

?>

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
    <title>Course</title>
</head>
<body>
    <?php
        include_once("components/nav.php");
        //echo $video;
        include_once("components/footer.html");
    ?>
</body>
</html>