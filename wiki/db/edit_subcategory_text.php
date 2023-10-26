<?php
include './connection.php';
// (B) SAVE CONTENT ON FORM SUBMIT
if (isset($_POST["content"])) {
  $sub_id = $_POST['sub_id'];
  $content = $_POST["content"];

  $content = mysqli_real_escape_string($connection, $content);
  // (B1) CONNECT TO DATABASE
  //   require "./db/2-database.php";
  $query = "UPDATE `sub_category` SET `content` = '{$content}' WHERE `sub_category`.`id` = '{$sub_id}';";


  $query_update = mysqli_query($connection, $query);


  // (B2) SAVE
  // NOTE - CONTENT ID FIXED TO 99 FOR THIS DEMO
  // USE YOUR OWN ID IN YOUR PROJECT!
  //   echo $_CONTENT->save($sub_id, $_POST["content"])
  //.    ? "<div>SAVED</div>"
  //    : "<div>{$_CONTENT->error}</div>";
  header('Location: ../index.php?source_page=add_subcategory');
} else {
  echo "Error";
}
