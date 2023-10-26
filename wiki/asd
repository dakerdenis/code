<?php

ob_start();
session_start();





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki login</title>
    <link rel="stylesheet" href="./styles/login.css">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <div class="login__wrapper">
        <div class="login__container">

            <form class="login__content_wrapper" method="post" action="./db/login_user.php">
            <div class="login__logotype">
                <img src="./styles/imgs/logo.svg" alt="">
            </div>
            <!----->
                <div class="login__form__element">
                    <div class="form__element_desc">Login</div>
                    <div class="form__element_input">
                        <input name="username" id="username" type="text">
                    </div>
                </div>
                <!----->
                <div class="login__form__element">
                    <div class="form__element_desc">Password</div>
                    <div class="form__element_input">
                        <input name="password" id="password" type="password">
                    </div>
                </div>

                <!----->
                <div class="login__from_button">
                    <button type="submit" id="submit" name="submit">Войти</button>
                </div>
                <?php
                if (isset($_SESSION['message_pass'])) {
                    echo '<p class="msg"> ' . $_SESSION['message_pass'] . ' </p>';
                }
                echo "";
                unset($_SESSION['message_pass']);
                ?>
            </form>

        </div>

    </div>
    <script>
        const input = document.querySelector(".pwd input");
        const eye = document.querySelector(".pwd .fa-eye-slash");
        const lock = document.querySelector(".pwd .fa-lock");
        const overlay = document.querySelector(".pwd .overlay");

        eye.addEventListener("click", ()=> {
            if(input.type ==="password"){
                input.type = "text";

                eye.classList.remove("fa-eye-slash");
                eye.classList.add("fa-eye");

                setTimeout(()=>{
                    lock.getEle