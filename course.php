<?php 

$courseId = $_GET["videoId"];

if (!isset($courseId)) {
    header("Location: index.php");
    die();
}

$courses = [
    '1' => ['https://www.youtube.com/embed/dQw4w9WgXcQ'],
    '2' => ['https://www.youtube.com/embed/sQCfWXoMLi0'],
    '3' => ['https://www.youtube.com/embed/dQw4w9WgXcQ'],
    '4' => ['https://www.youtube.com/embed/dQw4w9WgXcQ'],
    '5' => ['https://www.youtube.com/embed/dQw4w9WgXcQ'],
    '6' => ['https://www.youtube.com/embed/dQw4w9WgXcQ']
];

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
    ?>
    <iframe width="1440" height="740" src="<?php foreach($courses[$courseId] as $video) {
    echo $video;
} ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php
        include_once("components/footer.html");
    ?>
</body>
</html>