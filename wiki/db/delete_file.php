<?php
    include './connection.php';
    if(isset($_GET['file_id'])){
        $id =  $_GET['file_id'];
        $sub_id = $_GET['sub_id'];
        //found file data
        $query_file = "SELECT * FROM `files` WHERE `id` = '{$id}'";
        $found_file = mysqli_query($connection,$query_file);

        $row = mysqli_fetch_assoc($found_file);
        $filename = $row['name'];
        $filepass = "../files/" . $filename;
        unlink(realpath($filepass));




        $q = "DELETE FROM `files` WHERE `id`='{$id}'";
        $query__delete =  mysqli_query($connection, $q);

    
        header('Location: ../index.php?source_page=add_files&sub_id=' . $sub_id);
    }
?>