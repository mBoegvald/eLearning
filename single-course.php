<?php 
require_once('has-access.php');
 // Initiating database connection
require_once('db/db.php');
try{
    $sUserID = $_SESSION['sUserId'];
    $iCourseID = $_GET['courseID'];

    // Fetch courses
    $coursesQ = $db->prepare('SELECT * FROM course');
    $coursesQ->execute();
    $coursesData = $coursesQ->fetchAll();

    $sCourseDiv = '';
    foreach($coursesData as $singleCourse) {
        if($iCourseID == $singleCourse->courseID)
            $sCourseDiv .= "
                <h1>$singleCourse->header</h1>
                <p>
                $singleCourse->text
                </p>
                <div class='videoContainer'>
                    <video id='courseVideo' controls>
                        <source src='vids/$singleCourse->video.mp4' type='video/mp4'>
                    </video>
                </div>";
    }

    // Fetch users progress
    $courseProgressQ = $db->prepare("SELECT * from course_progress");
    $courseProgressQ->execute();
    $courseProgressData = $courseProgressQ->fetchAll();
    $boolean = 0;
    $completed = 0;
    // If user doesn't exist in the course_progress database create him/her
    foreach($courseProgressData as $course) {
       if ($course->userID == $sUserID && $course->courseID == $iCourseID){ 
            $boolean = 1;
            if($course->courseCompleted == 1) {
                $completed = 1;
            }
            break;
        } 
    }
    if($boolean === 0) {
        $userProgress = $db->prepare("INSERT INTO `course_progress` (`courseID`, `courseCompleted`,`userID`) 
        VALUES ('$iCourseID', 0,'$sUserID')");
        $userProgress->execute();
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
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/courses.css">
    <link rel="stylesheet" href="css/single-course.css">
    <title>Course</title>
</head>
<body>
    <?php
        include_once("components/nav.php");
    ?>
    <main id="single-course">
        <div class="contentContainer">
            <div class='courseContainer'>
                <?= $sCourseDiv; ?>
                <form class="single-course-form" action="dashboard.php" method="POST">
                    <a class="back-btn" href="dashboard.php">← Back <span id="single-course-back-btn">to courses</span></a>
                    <button <?php if($completed === 0){echo 'disabled';}?> type="submit" value="<?=$iCourseID?>" class="btn form-btn" name="endCourse">Finish course</button>
                </form>
            </div>
        </div>
    </main>
    <?php
        include_once("components/footer.html");
    ?>
    <script src="js/single-course.js"></script>
</body>
</html>