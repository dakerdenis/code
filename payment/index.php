<?php
session_start();
if (isset($_SESSION['$error_message'])) {
    $error_message = $_SESSION['error_message'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A-Qroup payment</title>

    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="wrapper">
        <form id="firstForm" method="POST" class="first_form" >
            <div class="form__element__icon">
                <img src="./Logo.svg" alt="">
            </div>
            <div class="form__additional__desc">
            Ödəniş etmək üçün Sığorta şəhadətnaməsinin nömrəsini daxil edin
            </div>

            <div class="line__placeholder"></div>

            <div class="form__element__desc">
            Şəhadətnamə nömrəsi
            </div>
            <div class="form__element__input">
                <input type="text" id="sigorta_nomresi" placeholder="AA-A 111/11" name="sigorta_nomresi">
            </div>                
            <p class="error_p" id="sigortaError"></p>
            <div class="form__element__button">
                <button type="submit" name="submit">Göndər</button>
            </div>
        </form>
        <!----- action="make_payment.php" ---->
        <form id="secondForm"  class="second_form" action="make_payment.php" method="POST">
        <div class="form__element__icon">
                <img src="./Logo.svg" alt="">
            </div>
        <div class="form_static__element">
        <p>Şəhadətnamə nömrəsi: </p>
        <p id="police_number"></p>
    </div>
    <input id="police_number_input" type="hidden">
    <div class="form_static__element">
        <p style="width: 30%">Sığortalının adı:</p>
         <p id="client_name"></p>
         
    </div>
    <div class="form_static__element">
        <p>Cəmi sığorta haqqı: </p>
        <p id="premium"></p>
    </div>
    <div class="form_static__element">
        <p>Cəmi borc: </p>
        <p id="debtoverall"></p>
    </div>
    <div class="form_static__element">
        <p>Bu günə olan borc:</p>
         <p id="debtfortoday"></p>
    </div>

    <div class="line"></div>
    <div class="form__element">
        <div class="form__element__desc">
        Ödəniş məbləğini daxil edin
        </div>
        <div class="form__element__input">
            <input type="number" required step="0.01" id="payment_amount" name="payment_amount" >
        </div>   
        <input style="visibility:hidden;" type="text" id="secondPoliceNumber" name="secondPoliceNumber">             
    </div>
    <div class="form__element">
        <div class="form__element__desc">
        Qəbzi əldə etmək üçün E-mail ünvanınızı daxil edin
        </div>
        <div class="form__element__input">
            <input type="email" id="payment_email" name="payment_email" placeholder="email">
        </div>          
    </div>

    <div class="form__element__button">
        <button type="submit" id="submitPayment" name="submitPayment">Ödəmək</button>
    </div>

        </form>
        <div class="new__payments_form" id="new__payments_form">            
        </div>       
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="./script.js"></script>
</body>
</html>
</body>
</html>
