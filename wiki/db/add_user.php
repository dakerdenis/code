<?php
$connection = mysqli_connect('localhost', 'root', '', 'wiki');
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password =  $_POST['password'];

    $query = "INSERT INTO `users` ( `username`, `password`,`role`,`categories`)  
    VALUES ('{$username}','{$password}','{$role}','1')";

     echo $query;
     $addnew__user = mysqli_query($connection,$query);
	if(!$addnew__user){
		echo $addnew__user;
		echo "error 228";
	};
     header('Location: ../index.php?source_page=add_user');
 } else{
    echo 'error';
 }


?>