<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A-Group Wiki</title>

  <!---стили основной страницы--->
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="../cleditor/jquery.cleditor.css" />
  <link rel="shortcut icon" href="./styles/imgs/logo_red.png" type="image/x-icon">
 

  

  <script src="./node_modules/tinymce/tinymce.js" referrerpolicy="origin"></script>
  <script src="./node_modules/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>
  <script type="text/javascript">
    checked = false;

    function checkedAll(frm1) {
      var aa = document.getElementById('frm1');
      if (checked == false) {
        checked = true
      } else {
        checked = false
      }
      for (var i = 0; i < aa.elements.length; i++) {
        aa.elements[i].checked = checked;
      }
    }
  </script>
</head>