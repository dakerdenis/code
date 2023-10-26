<!DOCTYPE html>
<html>

<head>
    <!--Title content-->
    <title>Ailə Tibbi Sığorta</title>
    <!--Meta content-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <!--CSS content-->
    <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
    <link rel="" type="" href="">
    <!--Fonts content-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="/assets/imgs/Logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/style.css">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
</head>

<body>

<div class="loader" style="display:none;">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
</div>

<!--Bounding container-->
<div class="wrapper">
    <!--Photo & logos block-->
    <div class="block__photo__logo">

        <div class="block__icons">
            <a href="https://a-group.az">
                <div class="block__icons_1 block__icons_1-1">

                </div>
            </a>
            <a href="/form">
                <div class="block__icons_1 block__icons_1-2">

                </div>
            </a>
        </div>


        <div class="block__mobile">

        </div>

    </div>
    <div class="footer">
        <!--Text xosbehtlik0-->
        <div class="block__salam">
            <div class="block__salam-img"></div>
        </div>


        <div class="calculation__block">

            <div class="calculation__block_form">
                <div class="forms">
                    <?php $number = 1 ?>
                    <?= include 'form_element.php'?>
                </div>

                <div style="display: none" class="form__price_element form__success_element">
                    <div class="form__price__total">
                        Qiymət <span class="price"><span id="price_total">333</span> AZN</span>
                    </div>
                </div>

                <div class="form__error_element form__price_element" data-not-approve-error="Sığortaya qəbul edilmir" data-required-error="Bütün xanalar doldurulmalıdır" data-minimum-error="Minimum 3 nəfər" style="display: none">
                    <div class="form__price__total">
                       <span class="price"></span>
                    </div>
                </div>
                <div class="submit__wrapper">
                    <!--При клике добавляетяс вторая панель формы точно такая же как наверху , для второго человека-->
                    <div  class="submit__wrapper-element">
                        <button type="button" id="add_member">Ailə üzvünü əlavə etmək</button>
                    </div>
                    <!--При нажатий выдает то что он посчитал-->
                    <div class="submit__wrapper-element">
                        <input id="send_form" type="button" value="Həsablamaq">
                    </div>
                    <div class="submit__wrapper-element submit__wrapper-element2">
                        <!--при клике отправляет на вторую страницу-->
                        <a href="javascript:void(0);" id="make-order" class="buton2 disabled">Sifariş et</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer__links footer__links-form">
            <div class="footer__links-block1">
                <div class="footer__links-block-image1 footer__links-block-image">

                </div>
                <div class="footer__links-block-text">
                    <p>R.Behbudov küç.,87A</p>
                    <p>Bakı, Azərbaycan, AZ1022</p>
                </div>
            </div>
            <div class="footer__links-block1">
                <div class="footer__links-block-image2 footer__links-block-image">

                </div>
                <div class="footer__links-block-text">
                    <p>*0909</p>
                    <p>(+994 12) 377 90 09</p>
                </div>
            </div>
            <div class="footer__links-block1">
                <div class="footer__links-block-image footer__links-block-image3">

                </div>
                <div class="footer__links-block-text">
                    <a href="https://a-group.az/">www.a-group.az</a>
                </div>
            </div>
        </div>

        <!--LOGO footer-->
        <div class="footer__logo_a">

        </div>
    </div>
</div>
<!--Script content-->
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/index.js"></script>
</body>

</html>