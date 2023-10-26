<?php
include './connection.php';
include './functions.php';
if (isset($_POST['add_file'])) {
    echo "Filename: " . $_FILES['file']['name'] . "<br>";
    echo "Type : " . $_FILES['file']['type'] . "<br>";
    echo "Size : " . $_FILES['file']['size'] . "<br>";
    echo "Temp name: " . $_FILES['file']['tmp_name'] . "<br>";
    echo "Error : " . $_FILES['file']['error'] . "<br>";



    $file_type = $_FILES['file']['type'];
    $file = $_FILES['file']['name'];
    $file = mysqli_real_escape_string($connection, $file);
    $post_image_temp = $_FILES['file']['tmp_name'];

    $file__size = $_FILES['file']['size'];
    $file__size = formatSizeUnits($file__size);


    $file_desc = "" . $file__size . "," . $file;
    echo "New Size : " . $file__size . "<br>";

    if ($_FILES["file"]["size"] > 5242880) {
        header('Location: ../index.php?source_page=add_files&sub_id=' . $sub_id . '&message=1');
    } else {
        $sub_id = $_POST['sub_id'];


        $q = "INSERT INTO `files`( `name`, `filesize`, `filetype`, `file_sub_id`)
        VALUES ('{$file}','{$file__size}','{$file_type}','{$sub_id}')"; 


        echo $q;
        $query = mysqli_query($connection, $q);
        move_uploaded_file($post_image_temp, "../files/$file");

       // header('Location: ../index.php?source_page=add_files&sub_id=' . $sub_id);
    }
} else {
    echo 'FAILED';
}
