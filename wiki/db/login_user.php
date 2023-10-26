<?php
session_start();
include 'connection.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);


    $query_users = "SELECT * FROM `users` WHERE `username` LIKE '$username'";
    $users = mysqli_query($connection, $query_users);
    if (!$users) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($users);

    $db_username = $row['username'];
    $db_password = $row['password'];
    $db_access = $row['categories'];


    $array_cat = $db_access;
    //!--------------------------------
    //!--------------------------------
    //!--------------------------------
    $categories; // = explode(",", $array_cat);
    //!--------------------------------
    //!--------------------------------
    //!--------------------------------

    foreach ($categories as $suka) {

        if($suka ==null){
            break;
        }


        $query__category = "SELECT * FROM `category` WHERE `id` LIKE '$suka'";
        echo '<br>';
        echo $query__category;
        $categories = mysqli_query($connection, $query__category);
        $row2 = mysqli_fetch_assoc($categories);
        echo '<br>';


        $db_category_name = $row2['category_name'];
        echo '<br>';
        echo $db_category_name;
    }

    print_r($categories);

    if ($username == $db_username && $password == $db_password) {
        session_start();
        $_SESSION['username'] = $db_username;
        $_SESSION['login'] = true;
        $_SESSION['role'] = $row['role'];
        $_SESSION['category_access'] = $db_access;

        header("Location: ../index.php");
        session_write_close();
        ob_end_flush();
        exit();
    } else {
        $_SESSION['message_pass'] = 'Неправильный логин или пароль !';
        header("Location: ../login.php");

    }
} else {
    echo 'submit not working';
}
