<?php
$username = null;
$password = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if($username == 'admin' && $password == 'Agroup1998') {
            session_start();
            $_SESSION["authenticated"] = 'true';
            header('Location: https://a-group.az/payment/admin.php');
            exit();
        }
        else {
            header('Location: https://a-group.az/payment/login.php');
            exit();
        }

    } else {
        header('Location: https://a-group.az/payment/login.php');
        exit();
    }
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Creating a simple to-do application - Part 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="page">
    <!-- [banner] -->
    <header id="banner">
        <hgroup>
            <h1>Login</h1>
        </hgroup>
    </header>
    <!-- [content] -->
    <section id="content">
        <form id="login" method="post">
            <label for="username">Username:</label>
            <input id="username" name="username" type="text" required>
            <label for="password">Password:</label>
            <input id="password" name="password" type="password" required>
            <br/>
            <input type="submit" value="Login">
        </form>
    </section>
    <!-- [/content] -->
</div>
<!-- [/page] -->
</body>
</html>
<?php } ?>