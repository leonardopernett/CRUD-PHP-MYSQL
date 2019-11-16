<?php  
session_start();
include_once('db.php');

    if(isset ($_POST['save'])){
        $title       =  $_POST['title'];
        $description =  $_POST['description'];

        
        $query = "INSERT INTO task(title, description) VALUES(?, ?)";

       $resultado = $pdo->prepare($query);
       $resultado->execute([$title,$description]);

       if(!$resultado){

          die('fail');
       }else{
             
             $_SESSION['message'] = 'save success';
             $_SESSION['color'] = 'success';
             header('location:index.php');
       }
    }
  

?>