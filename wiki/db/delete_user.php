<?php
    include './connection.php';
    if(isset($_GET['source'])){
        $id = $_GET['source'];

       $query =  "DELETE FROM users WHERE `users`.`id` = {$id}" ;

       $delete__element = mysqli_query($connection, $query);

       echo $delete__element;

       header('Location: ../index.php?source_page=add_user');
       

    }

?>