<?php
if (!defined('ACCESS_DIRECT')) {
    die('Direct access not permitted');
}
?>
<style>
    .wrapper__for_payment {
        height: 400px;
    }

    .payment__logo_wrapper {

        width: 80%;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;

        align-items: center;
        margin-top: 5px;
    }

    .image__block {
        width: 30%;
        display: block;
    }

    .image__block img {
        width: 90%;
        object-fit: contain;
    }

    .image__block_1 {
        height: 30px;
        width: 52px;
    }

    .image__block_2 {
        width: 66px;
        height: 18px;
    }
</style>

<div class="wrapper__for_payment_text">
    Onlayn ödəmə
</div>
<br>
<form method="POST" class="payment__form" id="payment_form" action="./make_payment.php">
    <div class="form_content_namesrname">
        <label for="name">Sizin Adınız Soyadınız</label> <br>
        <input name="name" id="name" type="text" placeholder="Sizin Adınız Soyadınız">
        <p class="hidden" id="name_error" style="color: red;margin-bottom: 5px;">Vacib sahə</p>
    </div>

    <div class="form_content_number">

        <label for="number">Siğorta Nömrəsi</label> <br>
        <input name="number" id="number" type="text" placeholder="Sizin Siğorta nömresi">
        <p class="hidden" id="number_error" style="color: red;margin-bottom: 5px;">Vacib sahə</p>
    </div>

    <div class="form_content_number">

        <label for="number">Ödənilməli olan məbləğ</label> <br>
        <input name="price" id="price" type="number" placeholder="Maksimal 10000 AZN">
        <p class="hidden" id="price_error" style="color: red;margin-bottom: 5px;">Vacib sahə</p>
        <p class="hidden" id="price_error_max" style="color: red;margin-bottom: 5px;">Maksimal 10000 AZN</p>
        <p class="hidden" id="price_error_min" style="color: red;margin-bottom: 5px;">Minimum 1 AZN</p>
    </div>

    <div class="form_content_number">

        <div id="divRecaptcha" class="g-recaptcha" data-sitekey="6LdJKbYgAAAAAO-jCpSTTA1RAYHp1v5mfIOzbbv4"></div>
        <div class="text-danger" id="recaptchaError"></div>
    </div>



    <div class="button__container">
        <button id="form_button2" class="form__content__button2" type="button">Ödəmək</button>
        <div id="recaptchaError"></div>
    </div>









</form>



<script>



    document.querySelector('.form__content__button2').addEventListener('click', function() {
        let result = true;
        let name = document.getElementById('name');
        if (!name.value) {
            result = false;
            document.getElementById('name_error').classList.remove('hidden');
        } else {
            document.getElementById('name_error').classList.add('hidden');
        }
        let number = document.getElementById('number');
        if (!number.value) {
            result = false;
            document.getElementById('number_error').classList.remove('hidden');
        } else {
            document.getElementById('number_error').classList.add('hidden');
        }
        let price = document.getElementById('price');
        if (!price.value) {
            result = false;
            document.getElementById('price_error').classList.remove('hidden');
        } else {
            document.getElementById('price_error').classList.add('hidden');
        }
        if (price.value > 10000) {
            result = false;
            document.getElementById('price_error_max').classList.remove('hidden');
        } else {
            document.getElementById('price_error_max').classList.add('hidden');
        }
        if (price.value && price.value < 1) {
            result = false;
            document.getElementById('price_error_min').classList.remove('hidden');
        } else {
            document.getElementById('price_error_min').classList.add('hidden');
        }

        var captcha = grecaptcha.getResponse();
        if(!captcha) {
            $('#recaptchaError').text('* Вы не прошли проверку капчей');
            result = false;
        } else {
            $('#recaptchaError').text('');
        }

        if (!result) {
            return false;
        }
        return document.getElementById('payment_form').submit();


    });
</script>