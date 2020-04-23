<?php
require_once('db/db.php');
$userID = 111;
$sCourseDiv = '';
$q = $db->prepare('SELECT * FROM course');
$q->execute();
$data = $q->fetchAll();

$userQ = $db->prepare("SELECT * from course_progress where course_progress.userID = $userID");
$userQ->execute();
$userData = $userQ->fetchAll();

foreach($data as $course) {
    $sCourseDiv .= "
    <div class='course'>";

    foreach($userData as $user) {
        if ( $user->courseID == $course->courseID) {
        $sCourseDiv .= "DE HAR SAMME ID";
        }
        $sCourseDiv .= "
        <img src='' alt='$course->alt' />
        <div class='course-text'>
            <h3>$course->header</h3>
            <p>
            $course->text
            </p>
        </div>
        <div class='course-link'>
            <a href='$course->courseID'>Start learning</a>
        </div>
        ";
    }
    $sCourseDiv .= "
    </div>
    ";
}
    // if(isset($userID)) {
    //     $q = $db->prepare("SELECT * from course_progress where course_progress.userID = $userID");
    //     $q->execute();
    //     $data = $q->fetchAll();
        
    //         $sCourseDiv .= "
            
    //         <p>$course->courseID</p>";
    //         if($course->courseCompleted == 1) {
    //             $sCourseDiv .= "
    //             <p>$course->courseCompleted</p>
    //             ";
    //         };
    //         $sCourseDiv .= "
    //         <p>$course->userID</p>
            
    //         ";
    //     }
    echo $sCourseDiv;