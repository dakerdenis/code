<?php $polis_number = 'KTS0610-99923/01'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDPLAN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="hidden__block">
        <form action="">
            <input type="hidden" id="polis_number" name="polis_number" value="<?php echo $polis_number ?>">
        </form>
    </div>
    <div class="main__container main__container_medplan">
            <div class="main__container__logo_name">
                    <div class="logo_name_wrappeersdfs">
                        <div class="main__container__logo">
                            <img src="./imgs/nav_logo.svg" alt="">
                        </div>
                        <div class="main__container__logo_desc">
                            <img src="./imgs/slice.png" alt="">
                        </div>
                    </div>
                <div class="main__content__description">
                Sığorta Təminatı
                 </div>
            </div>

            <div id="main__list" class="main__content__elements_wrapper">
            </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="./index2.js"></script>
</body>
</html>









