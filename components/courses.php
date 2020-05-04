<div class="courses-container">
  <?php 
    require_once('./db/db.php');
    try{
    
      // Get userID from session
      if(!isset($_SESSION['sUserId'])) {
        $userID = null;
      }else {
        $userID = $_SESSION['sUserId'];
      }

      // Prepare info for courses
      $coursesQ = $db->prepare('SELECT * FROM course');
      $coursesQ->execute();
      $coursesData = $coursesQ->fetchAll();
      
      // Prepare info for course_progress
      $courseProgressQ = $db->prepare("SELECT * from course_progress where course_progress.userID = '$userID'");
      $courseProgressQ->execute();
      $courseProgressData = $courseProgressQ->fetchAll();
      
      $sCourseDiv = '';

      foreach($coursesData as $course) {
        $sCourseDiv .= "
        <div class='course'>
          <div class='img-container'>";

        foreach($courseProgressData as $courseProgress) {
            
            if ($courseProgress->courseID == $course->courseID && $courseProgress->courseCompleted == 1) {
                $sCourseDiv .= "<img class='badge' src='pics/badge.png'/>";
            }
          }
            $sCourseDiv .= "
              <img src='pics/placeholder.jpg' alt='$course->alt' />
            </div>
            <div class='course-text'>
                <h3>$course->header</h3>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi cupiditate asperiores corrupti natus. Eum modi doloremque libero soluta itaque iste dolores ipsum quibusdam numquam. Fuga dolores magni maiores reiciendis dolore!
                </p>
            </div>
            <div class='course-link'>
                <a href='single-course.php?courseID=$course->courseID'>Start learning</a>
            </div>
        </div>";
    }
    echo $sCourseDiv;

    }catch(PDOException $ex){
      echo $ex;
    }
?>
  
