<?php

include_once('db.php');
session_start();

if(isset($_GET['id'])){

    $id = $_GET['id'];
    

    $query ="DELETE FROM task WHERE id= ?"; 

    $resultado = $pdo->prepare($query);
    $resultado->execute([$id]);


    if(!$resultado){

        die('fail');
    }else {


         $_SESSION['message']= 'elimnado correctamente';
         $_SESSION['color'] = 'danger';
    }

    header('location:index.php');
    
}


