<?php 
require_once('db/db.php');
session_start();
if(isset($_SESSION['sUserId'])){
    $sUserID = $_SESSION['sUserId'];
    $sFirstName = $_SESSION['sFirstName'];
    if (isset($_POST['endCourse'])) {
        $iCourseID = $_POST['endCourse'];
        $updateQ = $db->prepare(
            "UPDATE `course_progress` SET `courseCompleted`=1 WHERE userID = '$sUserID' AND courseID = '$iCourseID'");
        $updateQ->execute();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/courses.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php include_once("components/nav.php");?>
    <main id="courses">
        <div class="contentContainer">
            <div class="courses-intro"><h1>Welcome<?php 
                    if(!isset($sFirstName)){
                        echo "";
                    }if(isset($sFirstName)){
                        echo " ".$sFirstName;
                    }
                ?>, what do you want to learn today?</h1>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut aut inventore exercitationem necessitatibus repellendus mollitia ratione iure debitis, fuga est cupiditate eum, quasi velit praesentium ad corrupti modi aperiam dolore!
                </p>
            </div>
            <?php include_once("components/courses.php");?>
        </div>
    </main>
    <?php include_once("components/footer.html");?>
</body>
</html>