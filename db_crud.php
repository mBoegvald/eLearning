<?php 

try{
    $dbUserName = 'root';
    $dbPassword = '';
    $connection = 'mysql:host=127.0.0.1; dbname=elearning1; charset=utf8mb4';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // TRY-CATCH
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ //JSON 
    ];

    $db = new PDO($connection, $dbUserName, $dbPassword, $options);
    
    // Run code below to see if database successfully connects
    // echo 'database connected';
}catch(PDOException $ex){
    echo $ex;
}

// echo 'testing to see if require once works';

?>