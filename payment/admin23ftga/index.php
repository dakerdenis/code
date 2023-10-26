<?php
$username = null;
$password = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if($username == 'admin' && $password == 'admin') {
            session_start();
            $_SESSION["authenticated"] = 'true';
            header('Location: ./admin.php');
            exit();
        }
        else {
            header('Location: ./index.php');
            exit();
        }

    } else {
        header('Location: ./index.php');
        exit();
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A-Qroup Admin Panel</title>

    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../style.css">

</head>


<body>
    <div class="wrapper">
        
        <form id="login" method="POST" class="first_form" >
            <div class="form__element__icon">
                <img src="../Logo.svg" alt="">
            </div>
            <div class="line__placeholder"></div>
            <br>
            <div class="form__element__input">
                <input type="text" id="username" placeholder="Username" name="username">
            </div>    
            <br>
            <div class="form__element__input">
                <input type="password" id="password" placeholder="Password" name="password">
            </div> 

            <br>
            <div class="form__element__button">
                <button type="submit" name="submit">Göndər</button>
            </div>
        </form>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

</body>
</html>
</body>
</html>
<?php } ?>