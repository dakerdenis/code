<?php
if(!defined('ACCESS_DIRECT')) {
    die('Direct access not permitted');
}
?>
<div class="wrapper__for_payment_text">
    Онлайн оплата
</div>
<br>
<form method="POST" class="payment__form" id="payment_form" action="./make_payment.php">
    <div class="form_content_namesrname">
        <label for="name">ФИО</label> <br>
        <input name="name" id="name" type="text" placeholder="ФИО">
        <p class="hidden" id="name_error" style="color: red;margin-bottom: 5px;">Обязательное поле</p>
    </div>

    <div class="form_content_number">

        <label for="number">Номер страхования</label> <br>
        <input name="number" id="number" type="text" placeholder="Номер страхования">
        <p class="hidden" id="number_error" style="color: red;margin-bottom: 5px;">Обязательное поле</p>
    </div>

    <div class="form_content_number">

        <label for="number">Сумма к оплате</label> <br>
        <input name="price" id="price" type="number" placeholder="Сумма к оплате">
        <p class="hidden" id="price_error" style="color: red;margin-bottom: 5px;">Обязательное поле</p>
        <p class="hidden" id="price_error_max" style="color: red;margin-bottom: 5px;">Максимально 10000 AZN</p>
        <p class="hidden" id="price_error_min" style="color: red;margin-bottom: 5px;">Минимум 1 AZN</p>
    </div>

    <div class="form_content_number">
        <div id="divRecaptcha" class="g-recaptcha" data-sitekey="6LdJKbYgAAAAAO-jCpSTTA1RAYHp1v5mfIOzbbv4"></div>
    </div>

    <div class="button__container">
        <button class="form__content__button2" type="button">Оплатить</button>
    </div>
</form>

<script>

    document.querySelector('.form__content__button2').addEventListener('click', function () {
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

        if (!result) {
            return false;
        }
        return document.getElementById('payment_form').submit();
    })

</script>