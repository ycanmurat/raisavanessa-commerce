

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

site_url = 'https://raisavanessa.com/tr/';

function signUp() {
    var data = {};
    data.name       = $('#re_name').val();
    data.email      = $('#re_email').val();
    data.phone      = $('#re_phone').val();
    data.password   = $('#re_password').val();
    data.password2   = $('#re_password2').val();

    if ($('#kvkk').prop('checked') == true) {
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
    }else{
        $('#SignInErrors').html('<p class="alert alert-danger">You must aprove the gdpr</p>');
    }
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
        phone : $('#ac_phone').val(),
        birth_day : $('#birth_day').val(),
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
                Swal.fire({
                    title: "Need Account!",
                    text: "You must log in to add the product to your favorites.",
                    icon: "info",
                    button: "OK",
                });
            }else{
                $('.addToWishlist').toggleClass('added');
            }
        },
        error: function (result) {
            Swal.fire({
                title: "ERROR !",
                text: "Sorry, we encountered a technical error.",
                icon: "danger",
                button: "OK",
            });
        }
    });
}


function addToCart(id) {
    var data = {
        id      : id,
        price   : $('#product_price').val(),
        slug_tr : $('#product_slug_tr').val(),
        slug    : $('#product_slug').val(),
        name    : $('#productName').text(),
        image   : $('#mainImage').attr('src'),
        size    : $('[name=size]').val(),
        color   : $('[name=color]:checked').val()
    }

    $.ajax({
        url: site_url + 'Ajax/addToCart/',
        method: 'POST',
        dataType: 'JSON',
        data: data,
        success: function (result) {
            if (result.status) {
                cartContent = '';
                $.each(result.data, function(key, val) {
                    cartContent += '<div class="item">\
                                        <div class="content">\
                                            <p><a target="_blank" href="'+val.slug+'">'+val.name+'</a></p>\
                                            <b>'+currencyFormatDE(val.price)+' €</b>\
                                        </div>\
                                        <img src="'+val.image+'" alt="'+val.name+'"> \
                                        <div class="selection">';

                                            if (val.options.colorDetail.rules == 1) {
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color1+'"></span>';
                                            }else if (val.options.colorDetail.rules == 2) {
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color1+'"></span>';
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color2+'"></span>';
                                            }else if (val.options.colorDetail.rules == 3) {
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color1+'"></span>';
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color2+'"></span>';
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color3+'"></span>';
                                            }else if (val.options.colorDetail.rules == 4) {
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color1+'"></span>';
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color2+'"></span>';
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color3+'"></span>';
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color4+'"></span>';
                                            }
                            
                            cartContent += '<span>'+val.options.size+'</span>\
                                            <span>'+val.qty+'</span>\
                                            <button onclick="productDeleteToCart(\''+key+'\')"><img src="'+site_url+'assets/Front/images/icons/cancel.svg"></button>\
                                        </div>\
                                    </div>';;
                });
                if (cartContent == '') {
                    cartContent = '<div class="blank-item">\
                                        <img src="'+site_url+'assets/Front/images/icons/shopping-bag.svg">\
                                        <p>your cart is empty</p>\
                                    </div>'
                }
                $('.catArea').html(cartContent);
                $('.cartCount').html(result.count);
                // $('.cartFooter > .qty').html('Quantit : '+result.count+' x '+currencyFormatDE(result.total)+' €');
                $('.cartFooter > .total').html('TOTAL : '+currencyFormatDE(result.total)+' €');
                Swal.fire({
                    title: "Success",
                    text: 'Product added to cart',
                    icon: "success",
                });
                setTimeout(function() {
                    location.reload();
                },1000);
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error !',
                    text: result.message
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
                    cartContent += '<div class="item">\
                                        <div class="content">\
                                            <p><a target="_blank" href="'+val.slug+'">'+val.name+'</a></p>\
                                            <b>'+currencyFormatDE(val.price)+' €</b>\
                                        </div>\
                                        <img src="'+val.image+'" alt="'+val.name+'"> \
                                        <div class="selection">';

                                            if (val.options.colorDetail.rules == 1) {
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color1+'"></span>';
                                            }else if (val.options.colorDetail.rules == 2) {
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color1+'"></span>';
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color2+'"></span>';
                                            }else if (val.options.colorDetail.rules == 3) {
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color1+'"></span>';
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color2+'"></span>';
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color3+'"></span>';
                                            }else if (val.options.colorDetail.rules == 4) {
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color1+'"></span>';
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color2+'"></span>';
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color3+'"></span>';
                                                cartContent += '<span style="background-color:'+val.options.colorDetail.color4+'"></span>';
                                            }
                            
                            cartContent += '<span>'+val.options.size+'</span>\
                                            <span>'+val.qty+'</span>\
                                            <button onclick="productDeleteToCart(\''+key+'\')"><img src="'+site_url+'assets/Front/images/icons/cancel.svg"></button>\
                                        </div>\
                                    </div>';;
                });
                if (cartContent == '') {
                    cartContent = '<div class="blank-item">\
                                        <img src="'+site_url+'assets/Front/images/icons/shopping-bag.svg">\
                                        <p>your cart is empty</p>\
                                    </div>'
                }
                $('.catArea').html(cartContent);
                $('.cartCount').html(result.count);
                // $('.cartFooter > .qty').html('Quantit : '+result.count+' x '+currencyFormatDE(result.total)+' €');
                $('.cartFooter > .total').html('TOTAL : '+currencyFormatDE(result.total)+' €');
                if (window.location.pathname == '/cart') {
                    location.reload();
                }
            }
        }
    });
}

function addAddress() {
    var data = {};
    data.title = $('#title').val();
    data.name = $('#name').val();
    data.surname = $('#surname').val();
    data.phone = $('#telephone').val();
    data.email = $('#email').val();
    data.city = $('#city').val();
    data.town = $('#town').val();
    data.postcode = $('#PostCode').val();
    data.address = $('#address').val();
    data.country = $('#country').val();
    data.company = $('#companyName').val();
    data.vkn = $('#taxNo').val();
    data.vd = $('#taxAdmin').val();
    $.ajax({
        method: 'post',
        dataType: 'json',
        data:data,
        url: '/Ajax/addAddress',
        success: function(result) {
            if (result.status === true) {
                location.reload();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error !',
                    html: result.error
                });
            }
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Error !',
                text: result.message
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
                Swal.fire({
                    title: "ERROR !",
                    text: "Sorry, we encountered a technical error.",
                    icon: "danger",
                    button: "OK",
                });
            }
        },
        error: function() {
            Swal.fire({
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
    data.address = $('[name=cartAddress]:checked').val();
    data.billingAddress = $('[name=Billing_cartAddress]:checked').val();
    data.billingStatus = $('#billgingDifferent').prop('checked');
    $.ajax({
        method: 'post',
        dataType: 'json',
        data:data,
        url: site_url+'/Ajax/addOrder',
        success: function(result) {
            if (result.status === true) {
                window.location.href = site_url+'cart/payment';
            }else{
                $('.allContents').html(result.error);
            }
        },
        error: function() {
            Swal.fire({
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


function subscribeEmail() {
    var email = $('#subscribe').val();
    $.ajax({
        url: site_url + 'Ajax/addBullettin/',
        method: 'POST',
        dataType: 'JSON',
        data:{email:email},
        success: function (result) {
            if (result.status == false) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error !',
                    html: result.error,
                });
            }else{
                $('#subscribe').val('');
                Swal.fire({
                    type: 'success',
                    title: 'Success',
                    text: "Your e-mail address is registered in the system.",
                });
            }
        },
        error: function (result) {
            Swal.fire({
                icon: 'error',
                title: 'Error !',
                text: "Sorry, we encountered a technical error.",
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
                $('#resetError').html('<p class="alert alert-danger">'+result.error+'</p>');
            }else{
                $('#resetError').html('<p class="alert alert-success">The e-mail reset link has been sent to your e-mail address.</p>');
            }
        },
        error: function (result) {
            $('#resetError').html('<p class="alert alert-danger">Sorry, we encountered a technical error.</p>');
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
                window.location.href = site_url;
            }
        },
        error: function (result) {
            $('#accountErrors').html('<p class="alert alert-danger">Sorry, we encountered a technical error.</p>');
        }
    });
}


function accountPassChange() {
    var data = {
        old_pass : $('#old_pass').val(),
        pass : $('#pass').val(),
        pass2 : $('#pass2').val()
    }
    $.ajax({
        url: site_url + 'Ajax/update_password_information/',
        method: 'POST',
        dataType: 'JSON',
        data:data,
        success: function (result) {
            if (result.status == false) {
                $('#accountPassErrors').html('<p class="alert alert-danger">'+result.error+'</p>');
            }else{
                $('#accountPassErrors').html('<p class="alert alert-success">Your password has been changed.</p>');
            }
        },
        error: function (result) {
            $('#accountPassErrors').html('<p class="alert alert-danger">Sorry, we encountered a technical error.</p>');
        }
    });
}


$(document).on('click','.quantity-right-plus',function() {
    data = {};
    data.row = $(this).attr('data-id');
    data.type = 1;
    cartQtyChange(data)
});

$(document).on('click','.quantity-left-minus',function() {
    data = {};
    data.row = $(this).attr('data-id');
    data.type = 0;
    cartQtyChange(data)
});

function cartQtyChange(data) {
    $.ajax({
        url: site_url + 'Ajax/productChange/',
        method: 'POST',
        dataType: 'JSON',
        data:data,
        success: function (result) {
            if (result.status) {
                location.reload();
            }
        }
    });
}


function goToPaymentWithAddress() {
    var data = {};
    data.name = $('#name').val();
    data.surname = $('#surname').val();
    data.phone = $('#telephone').val();
    data.email = $('#email').val();
    data.city = $('#city').val();
    data.town = $('#town').val();
    data.postcode = $('#PostCode').val();
    data.address = $('#address').val();
    data.country = $('#country').val();
    data.company = $('#companyName').val();
    data.vkn = $('#taxNo').val();
    data.vd = $('#taxAdmin').val();


    if ($('#billgingDifferent').prop('checked')) {
        data.bil_name = $('#billing_name').val();
        data.bil_surname = $('#billing_surname').val();
        data.bill_phone = $('#billing_telephone').val();
        data.bil_email = $('#billing_email').val();
        data.bil_city = $('#billing_city').val();
        data.bil_town = $('#billing_town').val();
        data.bil_postcode = $('#billing_PostCode').val();
        data.bil_address = $('#billing_address').val();
        data.bil_country = $('#billing_country').val();
        data.company = $('#billing_companyName').val();
        data.vkn = $('#billing_taxNo').val();
        data.vd = $('#billing_taxAdmin').val();
    }else{
        data.bil_name = data.name;
        data.bil_surname = data.surname;
        data.bil_phone = data.phone;
        data.bil_email = data.email;
        data.bil_city = data.city;
        data.bil_town = data.town;
        data.bil_postcode = data.postcode;
        data.bil_address = data.address;
        data.bil_country = data.country;
        data.company = data.company;
        data.vkn = data.vkn;
        data.vd = data.vd;
    }


    $.ajax({
        method: 'post',
        dataType: 'json',
        data:data,
        url: '/Ajax/addOrderWithAddress',
        success: function(result) {
            if (result.status === true) {
                window.location.href = site_url+'cart/payment';
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error !',
                    html: result.error,
                });
            }
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Error !',
                text: "Sorry, we encountered a technical error.",
            });
        }
    });
}

function addBespoke() {
    var data = {};
    data.bespoke_1  = $('#bespoke_1').val();
    data.bespoke_2  = $('#bespoke_2').val();
    data.bespoke_3  = $('#bespoke_3').val();
    data.bespoke_4  = $('#bespoke_4').val();
    data.bespoke_5  = $('#bespoke_5').val();
    data.bespoke_6  = $('#bespoke_6').val();
    data.bespoke_7  = $('#bespoke_7').val();
    data.bespoke_8  = $('#bespoke_8').val();
    data.bespoke_9  = $('#bespoke_9').val();
    data.bespoke_10 = $('#bespoke_10').val();
    data.bespoke_11 = $('#bespoke_11').val();
    data.note      = $('#notes').val();
    data.contact    = $('#contact').val();
    data.product_id    = $('[name=products]:checked').val();

    console.log(data);
    $.ajax({
        method: 'post',
        dataType: 'json',
        data:data,
        url: '/Ajax/addBespoke',
        success: function(result) {
            if (result.status == true) {
                Swal.fire({
                    icon: 'success',
                    title: 'Your Bespoce has been taken !',
                    html: 'we will be back as soon as possible',
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error !',
                    html: result.error,
                });
            }
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Error !',
                text: "Sorry, we encountered a technical error.",
            });
        }
    });
}

function kurChange() {
    val = $('#kurSelect').val();
    $.ajax({
        method: 'post',
        dataType: 'json',
        data:{cur:val},
        url: '/Ajax/kurChange',
        success: function(result) {
            if (result.status == true) {
                location.reload();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error !',
                    text: "Sorry, we encountered a technical error.",
                });
            }
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Error !',
                text: "Sorry, we encountered a technical error.",
            });
        }
    });
}

function langChange() {
    val = $('#langSelect').val();
    if (val == 1) {
        window.location.href = 'https://raisavanessa.com/'+window.location.pathname.split('/').splice(2,10).join('/');
    }else{
        window.location.href = site_url+'tr'+window.location.pathname;
    }
}