function validate(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }
}

function showLoader() {
    $('.loader').show();
}

function hideLoader() {
    $('.loader').hide();
}

async function getTotal() {
    let approved = true;
    let price = 0.00;

    for (let element of document.querySelectorAll('.order-form')) {
        let result = await $.ajax({
            method: "POST",
            url: "/form/form.php",
            data: $(element).serializeArray()
        });
        if (result.status === 'success') {
            $('.form__error_element').hide();
            price = Number(Number(result.price) + Number(price)).toFixed(2);
            console.log(price);
        } else {
            $('.form__success_element').hide();
            $('.form__error_element').show();
            $('.form__error_element .price').text(result.message);
            approved = false;
        }
        if (!approved) break;
    }
    return [price, approved];
}

$( document ).ready(function(event) {
    $('body').on('keypress', '#weight, #height', (event) => validate(event));

    $('#add_member').on('click', function (event) {
        showLoader();
        $.ajax({
            method: "POST",
            url: "/form/get_empty_form.php",
            data: { number: $('.order-form').length + 1 }
        })
            .done(function( msg ) {
                hideLoader();
                let form = msg.html;
                $('.forms').append(form);
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("#form-"+($('.order-form').length)).offset().top - 150
                }, 0);
            });
    });

    $('#send_form').on('click', async function () {
        showLoader();
        if (document.querySelectorAll('.order-form').length < 3) {
            $('.form__success_element').hide();
            $('.form__error_element').show();
            $('.form__error_element .price').text($('.form__error_element').data('minimum-error'));
            hideLoader();
            return false;
        }
        $('.buton2').addClass('disabled');
        let success = true;
        let scrolled = false;
        $('.need-validate').removeClass('error-form');
        $('.need-validate').each(function (index, element) {
            if (!$(this).val()) {
                $(this).addClass('error-form');
                let _self = this;
                success = false;
                if (!scrolled) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $(_self).offset().top - 100
                    }, 500);
                    scrolled = true;
                }
            }
        });
        if (!success) {
            $('.form__success_element').hide();
            $('.form__error_element').show();
            $('.form__error_element .price').text($('.form__error_element').data('required-error'));
            hideLoader();
            return false;
        }
        $("[name='haveBloodDiseases']:checked").each(function (index, element) {
            if ($(this).val() == 1) {
                success = false;
            }
        });
        $("[name='haveDiabetes']:checked").each(function (index, element) {
            if ($(this).val() == 1) {
                success = false;
            }
        });
        $("[name='havebenignOrMalignantTumors']:checked").each(function (index, element) {
            if ($(this).val() == 1) {
                success = false;
            }
        });
        if (!success) {
            $('.form__success_element').hide();
            $('.form__error_element').show();
            $('.form__error_element .price').text($('.form__error_element').data('not-approve-error'));
            hideLoader();
            return false;
        }
        let price;
        let approved;
        [price, approved] = await getTotal();
        if (approved) {
            $('.form__success_element').show();
            $('.buton2').removeClass('disabled');
            $('#price_total').text(price);
        }
        hideLoader();
    });

    $('#make-order').on('click', async function () {
        if ($(this).hasClass('disabled')) {
            return false;
        } else {
            showLoader();
            let success = true;
            $('.need-validate').each(function (index, element) {
                if (!$(this).val()) {
                    $(this).addClass('error-form');
                    success = false;
                }
            });
            if (!success) {
                $('.form__success_element').hide();
                $('.form__error_element').show();
                $('.form__error_element .price').text($('.form__error_element').data('required-error'));
                hideLoader();
                return false;
            }
            let approved = true;
            let ifr = 0;
            for (let element of document.querySelectorAll('.order-form')) {
                let result = await $.ajax({
                    method: "POST",
                    url: "/confirm/index.php",
                    data: $(element).serializeArray()
                });
                if (result.status === 'success') {
                    $('.form__error_element').hide();
                } else {
                    $('.form__success_element').hide();
                    $('.form__error_element').show();
                    $('.form__error_element .price').text(result.message);
                    approved = false;
                }
                ifr++;
                if (!approved) break;
            }
            if (approved) {
                Swal.fire({
                    title: 'Sifariş qəbul olundu',
                    icon: 'success',
                    confirmButtonText: 'Close'
                }).then(function () {
                    location.reload();
                });

            }
        }
    });

});