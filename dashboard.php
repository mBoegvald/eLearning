<?php 
require_once('has-access.php');
require_once('db/db.php');
if(isset($_SESSION['sUserId'])){
    $sUserID = $_SESSION['sUserId'];
    $sFirstName = $_SESSION['sFirstName'];
    if (isset($_POST['endCourse'])) {
        $iCourseID = $_POST['endCourse'];
        $updateQ = $db->prepare(
            "UPDATE `course_progress` SET `courseCompleted`=1 WHERE userID = '$sUserID' AND courseID = '$iCourseID'");
        $updateQ->execute();
    }  
} else {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/courses.css">
    <link rel="stylesheet" href="css/dashboard.css">

</head>
<body>
    <?php include_once("components/nav.php");?>
    <main id="dashboard">
        <section id="courses">
            <div class="courses-intro"><h1>Welcome <?=$sFirstName?>, what do you want to learn today?</h1>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut aut inventore exercitationem necessitatibus repellendus mollitia ratione iure debitis, fuga est cupiditate eum, quasi velit praesentium ad corrupti modi aperiam dolore!
                </p>
            </div>
            <?php include_once("components/courses.php");?>
        </section>
    </main>
    <?php include_once("components/footer.html");?>
</body>
</html>