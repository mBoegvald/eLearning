<div class="courses-container">
<?php
require_once('db/db.php');
try{
    $q = $db->prepare('SELECT * FROM course');
    $q->execute();
    $data = $q->fetchAll(); // [{},{}]

    $userID = 111;
    $userQ = $db->prepare("SELECT * from course_progress where course_progress.userID = $userID");
    $userQ->execute();
    $userData = $userQ->fetchAll();
    $sCourseDiv = '';
    foreach($data as $course) {
        $sCourseDiv .= "
        <div class='course'>";
    
        foreach($userData as $user) {
            if ( $user->courseID == $course->courseID) {
            $sCourseDiv .= "SAME ID (PUT BADGE HERE)";
            }
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
        </div>
        ";
    }
    echo $sCourseDiv;
    // echo $data->name; // PDO::FETCH_OBJ
    // echo 'Hi '.$data[0]['name']; // PDO::FETCH_ASSOC

    // echo json_encode($data);
}catch(PDOException $ex){
    echo $ex;
}
