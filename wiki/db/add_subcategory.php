<?php
$connection = mysqli_connect('localhost', 'root', '', 'wiki');


    $subcategory_name = $_POST['subcategory_name'];
    $sub_id = $_POST['sub_id'];

  // $content =  trim($content);
 
  $query = "INSERT INTO `sub_category`( `name`, `sub_id`, `content`, `image`, `key_words`, `file_desc`) 
  VALUES ('{$subcategory_name}','{$sub_id}','','','','')";
   echo $query;
   $addnew__subcategory = mysqli_query($connection, $query);
    header('Location: ../index.php?source_page=add_subcategory');
  
?>
