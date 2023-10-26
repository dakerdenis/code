<?php
    include './connection.php';
    if(isset($_GET['source'])){
        $id = $_GET['source'];

       $query =  "DELETE FROM category WHERE `category`.`id` = {$id}" ;

       $delete__element = mysqli_query($connection, $query);

       echo $delete__element;

       header('Location: ../index.php?source_page=add_category');
       

    }

?>