<?php
include './connection.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password =  $_POST['password'];
    $user_id = $_POST['user_id'];



    if (isset($_POST['category'])) {

        $list_of_categories = [];
        $category = $_POST['category']; 
        $text='';
        for ($i = 0; $i < count($category); $i++) {

            $category2 = strval($category[$i]);


            $category_string =$category2;
          //  echo $category_string;
            $text .= $category_string . ',';

          //  echo $text[1];
            print_r($text);

            echo '<br>';
        }
        echo '<br>';
        echo '<br>';      

        $query = "UPDATE `users` SET 
         `username` = '{$username}',
          `password` = '{$password}',
          `role` = '{$role}',
          `categories` = '{$text}'
           WHERE `users`.`id` = '{$user_id}';";

         //  for ($i = 0; $i < count($text); $i++){
         //   echo $text[$i];
         //  }

    } else {
        $query = "UPDATE `users` SET 
        `username` = '{$username}',
         `password` = '{$password}',
         `role` = '{$role}'
          WHERE `users`.`id` = '{$user_id}';";
    }



    // $query = "SELECT * FROM category";
    // $select_category = mysqli_query($connection, $query);
    // while ($row = mysqli_fetch_assoc($select_category)) {
    // if(isset($_POST['category'])){

    // $category2 = 'array('  . '"' . $row['id'] . '"' . ',';
    //         
    // $category3 = $category2 . ');';
    // $query = "UPDATE `users` SET 
    // `username` = '{$username}',
    //  `password` = '{$password}',
    //  `role` = '{$role}',
    //  `categories` = '{$category3}'
    //   WHERE `users`.`id` = '{$user_id}';";
    // }    else {
    //     $query = "UPDATE `users` SET 
    //     `username` = '{$username}',
    //      `password` = '{$password}',
    //      `role` = '{$role}'
    //       WHERE `users`.`id` = '{$user_id}';";
    // };  

    //   }




    echo $query;
    $edit__user = mysqli_query($connection, $query);

    header('Location: ../index.php?source_page=add_user');
} else {
    echo 'error';
}
