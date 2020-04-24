<?php 

 // Initiating database connection
 require_once('db/db.php');
try{

    if(isset($_POST['endCourse'])) {
    //$userID = $_SESSION['sUserId'];
    //$courseID = $_GET['iCourseID'];
    $sUserID = 'a8da11787dfgfdkmgldfjiofsdfjiofjipsd3801b28';
    $iCourseID = 4;

    // $coursesQ = $db->prepare('SELECT * FROM course');
    // $coursesQ->execute();
    // $coursesData = $coursesQ->fetchAll();

    $courseProgressQ = $db->prepare("SELECT * from course_progress");
    $courseProgressQ->execute();
    $courseProgressData = $courseProgressQ->fetchAll();
    $boolean = 0;
    
    foreach($courseProgressData as $course) {
       if ($course->userID == $sUserID && $course->courseID == $iCourseID){ // If user doesn't exist in the course_progress database create him/her
            $boolean = 1;
            break;
        } 
    }
    if($boolean === 0) {
        // $userProgress = $db->prepare("INSERT INTO `course_progress` (`courseID`, `courseCompleted`,`userID`) 
        // VALUES ('$iCourseID', 1,'$sUserID')");
        // $userProgress->execute();
    }
}
}catch(PDOException $ex){
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
    ?>
    <video id="courseVideo" width="320" height="240" controls>
        <source src="oke.mp4" type="video/mp4">
    </video>
        <form action="single-course.php" method="POST">
            <button type="submit" class="btn red-btn" name="endCourse">Course completed</button>
        </form>
    <?php
        include_once("components/footer.html");
    ?>
    <script src="single-course.js"></script>
</body>
</html>