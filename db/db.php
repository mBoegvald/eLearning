<?php 
try{
    $dbUserName = 'mboegvald_dk_mydb';
    $dbPassword = 'adminadmin';
    $connection = 'mysql:host=mboegvald.dk.mysql; dbname=mboegvald_dk_mydb';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //TRY CATCH
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ //ALLOWS JSON
        // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //ALLOWS ASSOSIATIVE
    ];
    $db = new PDO($connection, $dbUserName, $dbPassword, $options);
    echo "123";
}catch(PDOExecption $ex){
echo $ex;

}