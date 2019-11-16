
<?php
session_start();

  $usuario ='root';
  $pass = 'Admin09';

  try{
   
  $pdo = new PDO('mysql:host=localhost;dbname=php_mysql_crud', $usuario, $pass);
  
  }catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
  }



?>