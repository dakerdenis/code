<?php $polis_number = '900102/10'; ?>
<?php $polis_number = '900102/10'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A-Group Insurance Ford</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="main__container">
        <div class="block__main__image">
            <img src="./imgs/header.png" alt="">
        </div>
        <div class="block__main__content">
            <div class="main__content__content">
                <div class="main__content__name">
                    <p>Sığorta olunan</p>
                    <h3 id="insured"> </h3>
                </div>
                <!---data----->
                <div class="main__content__elements__wrapper">
                    <div class="main__content__element">
                        <div class="element__image">
                            <i aria-hidden="true" class="fa fa-heartbeat"></i>
                        </div>
                        <div class="element__desc">
                            <div class="element__desc__name">
                                Şəhadətnamə nömrəsi
                            </div>
                            <div class="element__desc__value">
                                <p id="police_number">
                                    <?php echo $polis_number; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="main__content__element">
                        <div class="element__image">
                            <i aria-hidden="true" class="fa fa-file-text"></i>
                        </div>
                        <div class="element__desc">
                            <div class="element__desc__name">
                                Proqram
                            </div>
                            <div class="element__desc__value red">
                                <p id="program"></p>
                            </div>
                        </div>
                    </div>
                    <div class="main__content__element">
                        <div class="element__image">
                            <i aria-hidden="true" class="fa fa-money"></i>
                        </div>
                        <div class="element__desc">
                            <div class="element__desc__name">
                                Sığorta məbləği
                            </div>
                            <div class="element__desc__value">
                                <p id="price"></p>
                            </div>
                        </div>
                    </div>
                    <div class="main__content__element">
                        <div class="element__image">
                            <i aria-hidden="true" class="fa fa-calendar"></i>
                        </div>
                        <div class="element__desc">
                            <div class="element__desc__name">
                                Sığorta müddəti
                            </div>
                            <div class="element__desc__value element__desc__value_date">
                                <p id="INSURANCE_START_DATE"></p> &nbsp; - &nbsp; <p id="INSURANCE_END_DATE"></p>
                            </div>
                        </div>
                    </div>
                    <div class="main__content__element">
                        <div class="element__image">
                            <i aria-hidden="true" class="fa fa-phone-square"></i>
                        </div>
                        <div class="element__desc">
                            <div class="element__desc__name">
                                Çağrı mərkəzi
                            </div>
                            <div class="element__desc__value red">
                                <a href="tel:+994123770909">(+994) 12 377 09 09</a> /  <a href="tel:*0909">*0909</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!----DRON Klinics APteks---->
                <div class="main__content__additional">
                    <a href="https://a-group.az/list/clinics/" class="additional__element">
                        <div class="additional__element__image">
                            <i aria-hidden="true" class="fa fa-hospital-o"></i>  
                        </div>
                        <div class="additional__element__desc">
                            Klinikalar
                        </div>
                    </a>
                    <a href="https://a-group.az/list/pharmacy/" class="additional__element">
                        <div class="additional__element__image">
                            <i aria-hidden="true" class="fa fa-medkit"></i>
                        </div>
                        <div class="additional__element__desc">
                            Apteklər
                        </div>
                    </a>
                    <div class="additional__element">
                        <img src="./imgs/dron.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="./index.js"></script>
</body>
</html>