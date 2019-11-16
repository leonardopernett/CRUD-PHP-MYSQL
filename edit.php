<?php

include_once('db.php');
session_start();


    $id = $_GET['id'];
    $title = $_GET['title'];
    $description = $_GET['description'];

    $query ="UPDATE task SET title =?, description= ? WHERE id= ?"; 

    $resultado = $pdo->prepare($query);
    $resultado->execute([$title,$description, $id]);



         $_SESSION['message']= 'editado correctamente';
         $_SESSION['color'] = 'warning';
   

    header('location:index.php');
    


