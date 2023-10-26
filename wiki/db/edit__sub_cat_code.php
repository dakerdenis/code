<?php 
include '../db/connection.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $key_words = $_POST['key_words'];
    $sub_id = $_POST['sub_id'];

    $query = "UPDATE `sub_category` SET `name`='{$name}',`sub_id`='{$sub_id}',`key_words`='{$key_words}'
     WHERE id = '{$id}'";
     $query_subcat = mysqli_query($connection, $query);
    if($query_subcat){
        $_SESSION['edit_sub_cat_succesfull']="Успешно изменено";
    } else{
        $_SESSION['edit_sub_cat_succesfull']="Произошла ошибка попробуйте другие варианты";
    }

     header('Location: ../index.php?source_page=edit_category&sub_cat_id='.$id);
?>