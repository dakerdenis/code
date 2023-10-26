<?php
include './connection.php';
if(isset($_POST['submit'])){
    $category_name = $_POST['category_name'];
    $category_access = 1;

    $query = " INSERT INTO `category` (`category_name`, `category_access`)  
    VALUES ('{$category_name}','{$category_access}')";

     echo $query;
     $addnew__category = mysqli_query($connection, $query);

     header('Location: ../index.php?source_page=add_category');
 } else{
    echo 'error';
 }


?>