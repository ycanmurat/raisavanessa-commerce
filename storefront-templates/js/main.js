$(document).ready(function() {
    $(function() {
        $('.lazy').Lazy({
            effect: "fadeIn",
            effectTime: 1500,
            threshold: 0
        });
    });




    $("#addNewAdress").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });
    

    function prex(val = '') {
        console.log(val);
    }
    function currencyFormatDE(num) {
        return (num.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
    }

    site_url = 'https://raisavanessa.com/';
    
    function signUp() {
        var data = {};
        data.name       = $('#re_name').val();
        data.surname    = $('#re_surname').val();
        data.email      = $('#re_email').val();
        data.password   = $('#re_password').val();
        $.ajax({
            url: site_url + 'Ajax/register_user/',
            method: 'POST',
            dataType: 'JSON',
            data:data,
            success: function (result) {
                if (result.status == false) {
                    $('#SignInErrors').html(result.error);
                }else{
                    $('#SignInErrors').html('');
                    location.reload();
                }
            },
            error: function (result) {
                $('#SignInErrors').html('<p class="alert alert-danger">Sorry, we encountered a technical error.</p>');
            }
        });
    }
    function login() {
        var data = {};
        data.email      = $('#email').val();
        data.password   = $('#password').val();
        $.ajax({
            url: site_url + 'Ajax/login_user/',
            method: 'POST',
            dataType: 'JSON',
            data:data,
            success: function (result) {
                if (result.status == false) {
                    $('#LoginErrors').html(result.error);
                }else{
                    $('#LoginErrors').html('');
                    location.reload();
                }
            },
            error: function (result) {
                $('#LoginErrors').html('<p class="alert alert-danger">Sorry, we encountered a technical error.</p>');
            }
        });
    }
    function accountSave() {
        var data = {
            name : $('#ac_name').val(),
            email : $('#ac_email').val(),
            surname : $('#ac_surname').val(),
            phone : $('#ac_phone').val(),
            day : $('#ac_day').val(),
            mounth : $('#ac_mounth').val(),
            year : $('#ac_year').val(),
            pass : $('#ac_pass').val(),
            gender : $("[name=gender]:checked").val()
        }
        $.ajax({
            url: site_url + 'Ajax/update_information/',
            method: 'POST',
            dataType: 'JSON',
            data:data,
            success: function (result) {
                if (result.status == false) {
                    $('#accountErrors').html(result.error);
                }else{
                    $('#accountErrors').html('<p class="alert alert-success">Your update has been successfully completed.</p>');
                //location.reload();
            }
        },
        error: function (result) {
            $('#accountErrors').html('<p class="alert alert-danger">Sorry, we encountered a technical error.</p>');
        }
    });
    }
    function rezervausionAdd() {
        var data = {
            name : $('#rez_name').val(),
            surname : $('#rez_surname').val(),
            mobile : $('#rez_mobile').val(),
            address : $('#rez_address').val(),
            email : $('#rez_email').val(),
            message : $('#rez_message').val()
        }
        $.ajax({
            url: site_url + 'Ajax/add_rezervesion/',
            method: 'POST',
            dataType: 'JSON',
            data:data,
            success: function (result) {
                if (result.status == false) {
                    $('#rezervesionErrors').html(result.error);
                }else{
                    $('#rezervesionErrors').html('<p class="alert alert-success">Reservation Saved.</p>');
                    $('#rez_name').val('')
                    $('#rez_surname').val('')
                    $('#rez_mobile').val('')
                    $('#rez_address').val('')
                    $('#rez_email').val('')
                    $('#rez_message').val('')
                }
            },
            error: function (result) {
                $('#rezervesionErrors').html('<p class="alert alert-danger">Sorry, we encountered a technical error.</p>');
            }
        });
    }
    function addToContact() {
        var data        = {};
        data.name       = $('#c_name').val();
        data.surname    = $('#c_surname').val();
        data.email      = $('#c_email').val();
        data.number     = $('#c_phone').val();
        data.address    = $('#c_address').val();
        data.message    = $('#c_message').val();
        $.ajax({
            url: site_url + 'Ajax/addToContact/',
            method: 'POST',
            dataType: 'JSON',
            data:data,
            success: function (result) {
                if (result.status == false) {
                    $('#contactError').html(result.error);
                }else{
                    $('#contactError').html('<p class="alert alert-success">Your request has been received. We will reply as soon as possible.</p>');
                    $('#c_name').val('');
                    $('#c_surname').val('');
                    $('#c_email').val('');
                    $('#c_phone').val('');
                    $('#c_address').val('');
                    $('#c_message').val('');
                }
            },
            error: function (result) {
                $('#contactError').html('<p class="alert alert-danger">Sorry, we encountered a technical error.</p>');
            }
        });
    }
    function addfavorites(id) {
        $.ajax({
            url: site_url + 'Ajax/addfavorites/'+id,
            method: 'GET',
            dataType: 'JSON',
            success: function (result) {
                if (result.status == false) {
                    swal({
                        title: "Need Account!",
                        text: "You must log in to add the product to your favorites.",
                        icon: "info",
                        button: "OK",
                    });
                }else{
                    $('.wishlist-'+id).toggleClass('added');
                }
            },
            error: function (result) {
                swal({
                    title: "ERROR !",
                    text: "Sorry, we encountered a technical error.",
                    icon: "danger",
                    button: "OK",
                });
            }
        });
    }
    function addToCartProductDetail(id) {
        var data = {
            id      : id,
            price   : $('#product_price').val(),
            slug    : $('#product_slug').val(),
            name    : $('#productName').text(),
            image   : $('#mainImage').attr('src'),
            size    : $('[name=size]:checked').val(),
            color   : $('[name=color]:checked').val()
        }
        if ($(".customizeArea")[0]) {
            if ($(".customizeArea").val().length < 1) {
                swal({
                    title: "ERROR",
                    text: 'Fill in the customization section to add the product to the cart.',
                    icon: "error",
                    button: "OK",
                });
            }else{
                data.strVariant = $(".customizeArea").val();
                addToCart(data);
            }
        }else{
            addToCart(data);
        }
    }
    function addToCarListing(id) {
        var data = {
            id      : id,
            price   : $('#product_price-'+id).val(),
            slug    : $('#product_slug-'+id).val(),
            name    : $('#productName-'+id).text(),
            image   : $('#mainImage-'+id).attr('src'),
            size    : $('[name=size-'+id+']:checked').val(),
            color   : $('[name=color-'+id+']:checked').val()
        }

        if ($(".customizeArea-"+id)[0]) {
            if ($(".customizeArea-"+id).val().length < 1) {
                swal({
                    title: "ERROR",
                    text: 'Fill in the customization section to add the product to the cart.',
                    icon: "error",
                    button: "OK",
                });
            }else{
                data.strVariant = $(".customizeArea-"+id).val();
                addToCart(data);
            }
        }else{
            addToCart(data);
        }
        location.reload();
    }
    function addToCart(data) {

        strVariant = [];
        $('.variant_checks').each(function(key,val){
            if ($(val).data('id') == data.id) {
                if ($(val).prop('checked') == true) {
                    strVariant.push($(val).val());
                }
            }
        });
        data.strVariant = strVariant.join(',');
        $.ajax({
            url: site_url + 'Ajax/addToCart/',
            method: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (result) {
                if (result.status) {
                    cartContent = '';
                    $.each(result.data, function(key, val) {
                        cartContent += '\
                        <div class="item">\
                        <button class="remove" type="button" onclick="productDeleteToCart(\''+val.rowid+'\')">Sil</button>\
                        <a href="'+site_url+'product/'+val.slug+'">\
                        <img src="'+val.image+'" alt="'+val.name+'  alt="'+val.title+'">\
                        </a>\
                        <div class="infos">\
                        <h3>'+val.name+'</h3>\
                        <h4>Size : <b>'+val.options.size+'</b> </h4>\
                        <h5>Adet : <b>'+val.qty+'</b></h5>\
                        <h5>Renk : <b>'+val.options.color+'</b></h5>';
                        if(!(val.options.varian)){
                            cartContent += '<h5>Seçim : <b>'+val.options.variant+'</b></h5>';
                        }
                        cartContent += '</div>\
                        <p class="Price"> '+currencyFormatDE(val.price)+' €</p>\
                        </div>';
                    });
                    $('.cart-wrapper').html(cartContent);
                    swal({
                        title: "Success",
                        text: 'Product added to cart',
                        icon: "success",
                        button: "OK",
                    });
                }else{
                    swal({
                        title: "ERROR",
                        text: result.message,
                        icon: "error",
                        button: "OK",
                    });
                }
            }
        });
    }
    function productDeleteToCart(rowid) {
        $.ajax({
            url: site_url + 'Ajax/removeToCart/'+rowid,
            method: 'POST',
            dataType: 'JSON',
            success: function (result) {
                if (result.status) {
                    cartContent = '';
                    $.each(result.data, function(key, val) {
                        cartContent += '\
                        <div class="item">\
                        <button class="remove" type="button" onclick="productDeleteToCart(\''+val.rowid+'\')">Sil</button>\
                        <a href="'+site_url+'product/'+val.slug+'">\
                        <img src="'+val.image+'" alt="'+val.name+'  alt="'+val.title+'">\
                        </a>\
                        <div class="infos">\
                        <h3>'+val.name+'</h3>\
                        <h4>Size : <b>'+val.options.size+'</b> </h4>\
                        <h5>Adet : <b>'+val.qty+'</b></h5>\
                        </div>\
                        <p class="Price"> '+currencyFormatDE(val.price)+' €</p>\
                        </div>';
                    });
                    $('.cart-wrapper').html(cartContent);
                    if (window.location.pathname == '/cart') {
                        location.reload();
                    }
                }
            }
        });
    }
    function addAddress(val) {
        var data = {};
        if (val == 0) {
            data.title = $('#address_p_title').val();
            data.name = $('#address_p_name').val();
            data.surname = $('#address_p_last_name').val();
            data.tc = $('#address_p_tc').val();
            data.phone = $('#address_p_gsm').val();
            data.email = $('#address_p_email').val();
            data.city = $('#address_p_city').val();
            data.town = $('#address_p_town').val();
            data.postcode = $('#address_p_postCode').val();
            data.address = $('#address_p_address').val();
            data.country = $('#address_p_country').val();
            data.type = 0;
        }else{
            data.title = $('#address_b_title').val();
            data.name = $('#address_b_name').val();
            data.surname = $('#address_b_last_name').val();
            data.phone = $('#address_b_gsm').val();
            data.email = $('#address_b_email').val();
            data.city = $('#address_b_city').val();
            data.town = $('#address_b_town').val();
            data.postcode = $('#address_b_postCode').val();
            data.address = $('#address_b_address').val();
            data.vkn = $('#address_b_vkn').val();
            data.vd = $('#address_b_vd').val();
            data.company = $('#address_b_company').val();
            data.country = $('#address_b_country').val();
            data.type = 1;
        }
        $.ajax({
            method: 'post',
            dataType: 'json',
            data:data,
            url: '/Ajax/addAddress',
            success: function(result) {
                if (result.status === true) {
                    location.reload();
                }else{
                    $('.allContents').html(result.error);
                }
            },
            error: function() {
                swal({
                    title: "ERROR",
                    text: 'Connection error please try again.',
                    icon: "error",
                    button: "OK",
                });
            }
        });
    }
    function removeAddress(id) {
        $.ajax({
            method: 'post',
            dataType: 'json',
            url: '/Ajax/removeAddress/'+id,
            success: function(result) {
                if (result.status === true) {
                    location.reload();
                }else{
                    swal({
                        title: "ERROR !",
                        text: "Sorry, we encountered a technical error.",
                        icon: "danger",
                        button: "OK",
                    });
                }
            },
            error: function() {
                swal({
                    title: "ERROR !",
                    text: "Sorry, we encountered a technical error.",
                    icon: "danger",
                    button: "OK",
                });
            }
        });
    }
    function goToPayment() {
        var data = {};
        data.address = $('[name=cart-address]:checked').val();
        $.ajax({
            method: 'post',
            dataType: 'json',
            data:data,
            url: '/Ajax/addOrder',
            success: function(result) {
                if (result.status === true) {
                    window.location.href = site_url+'cart/payment';
                }else{
                    $('.allContents').html(result.error);
                }
            },
            error: function() {
                swal({
                    title: "ERROR !",
                    text: "Sorry, we encountered a technical error.",
                    icon: "danger",
                    button: "OK",
                });
            }
        });
    }
    function goToAdress() {
        if ($('.loginButton').text() == 'LOGIN') {
            loginpopupActive();
        }else{
            window.location.href = site_url+'cart/address';
        }
    }
    function katilabasti() {
        var email = $('#katilEmail').val();
        $.ajax({
            url: site_url + 'Ajax/addBullettin/',
            method: 'POST',
            dataType: 'JSON',
            data:{email:email},
            success: function (result) {
                if (result.status == false) {
                    swal({
                        title: "ERROR !",
                        text: result.error,
                        icon: "danger",
                        button: "OK",
                    });
                }else{
                    $('#katilEmail').val('');
                    swal({
                        title: "Success",
                        text: "Your e-mail address is registered in the system.",
                        icon: "success",
                        button: "OK",
                    });
                }
            },
            error: function (result) {
                swal({
                    title: "ERROR !",
                    text: "Sorry, we encountered a technical error.",
                    icon: "danger",
                    button: "OK",
                });
            }
        });
    }

    function password_reset() {
        var data = {};
        data.email = $('#reset_email').val();

        $.ajax({
            url: site_url + 'Ajax/password_reset',
            method: 'POST',
            dataType: 'JSON',
            data:data,
            success: function (result) {
                if (result.status == false) {
                    $('#LoginErrors').html('<p class="alert alert-danger">'+result.error+'</p>');
                }else{
                    swal({
                        title: "Success",
                        text: "The e-mail reset link has been sent to your e-mail address.",
                        icon: "success",
                        button: "OK",
                    });
                }
            },
            error: function (result) {
                $('#LoginErrors').html('<p class="alert alert-danger">Sorry, we encountered a technical error.</p>');
            }
        });
    }

    function passwordNew() {
        var data = {};
        data.password = $('#newpass').val();
        data.password_repeat = $('#newpass2').val();
        data.reset_token = $('#token').val();

        $.ajax({
            url: site_url + 'Ajax/password_update',
            method: 'POST',
            dataType: 'JSON',
            data:data,
            success: function (result) {
                if (result.status == false) {
                    $('#accountErrors').html('<p class="alert alert-danger">'+result.error+'</p>');
                }else{
                    window.location.href = 'https://hakaanyildirim.com';
                }
            },
            error: function (result) {
                $('#accountErrors').html('<p class="alert alert-danger">Sorry, we encountered a technical error.</p>');
            }
        });
    }