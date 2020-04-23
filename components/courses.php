<div class="courses-container">
  <?php 
    require_once('./db/db.php');
  try{
    $q = $db->prepare('SELECT * FROM course');
    $q->execute();
    $data = $q->fetchAll();
    $sCourseDiv = '';
    foreach($data as $course) {
      $sCourseDiv .= "
        <div class='course'>
          <img src='./pics/placeholder.jpg' alt='$course->alt' />
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
  }catch(PDOException $ex){
    echo $ex;
  }
  ?>
  
