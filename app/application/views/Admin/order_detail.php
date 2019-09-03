<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
            Sipariş Detay
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="<?=admin_url()?>" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    >
                </li>
                <li class="m-nav__item">
                    <a href="<?=admin_url('Order?s=1')?>" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Sipariş Listele
                        </span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    >
                </li>
                <li class="m-nav__item">
                    <a href="<?=admin_url('Order?s=1')?>" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Geri Dön
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                            Sipariş Detayı <small>Sipariş Numarası: <b><?=$order->id?></b></small>

                            <span style="position:absolute;right: 40px; top:15px;">
                                <?php if ($order->status == 1) { ?>
                                    <a href="<?=site_url('Admin/Orders/orderCancel/'.$order->id)?>" class="btn btn-outline-danger">Siparişi İptal Et</a>
                                    <a href="<?=site_url('Admin/Orders/orderPrep/'.$order->id)?>" class="btn btn-outline-success">Sipairş Hazırlanıyor</a>
                                <?php }else if ($order->status == 4) { ?>
                                    <a href="<?=site_url('Admin/Orders/orderCancel/'.$order->id)?>" class="btn btn-outline-danger">Siparişi İptal Et</a>
                                    <a href="<?=site_url('Admin/Orders/orderSuccess/'.$order->id)?>" class="btn btn-outline-success">Sipariş Kargoya Verildi</a>
                                <?php } ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-bottom-10">
                        <form action="<?=admin_url('Order')?>?s=1" method="GET">
                            <div class="order_detail">
                                <div class="row order_row">
                                    <div class="col-md-6 col-lg-6 col-xs-12">
                                        <h6>Sipariş Durumu</h6>
                                        <div class="alert alert-<?=admin_order_status_color($order->status)?>" role="alert">
                                            <?=admin_order_status($order->status)?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xs-12">
                                        <h6>Ödeme Durumu</h6>
                                        <div class="alert alert-<?=payment_status_color($order->payment_status)?>" role="alert">
                                            <?=payment_status($order->payment_status)?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row order_row">
                                    <h5 class="w-100 pt-3">Genel Bilgi</h5>
                                    <div class="row w-100 text-right">
                                        <div class="col-md-4 col-lg-4 col-sm-4 mb-4 order-box">
                                            <h6>Sipariş Tarihi</h6>
                                            <h5><?=dateparse($order->added_time)?></h5>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-4 mb-4 order-box">
                                            <h6>Sipariş Veren</h6>
                                            <h5><?=($order->name ?? '').' '.($order->surname ?? '')?></h5>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-4 mb-4 order-box">
                                            <h6>Üye GSM</h6>
                                            <h5><?=$order->gsm ?? ''?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row order_row">
                                    <h5 class="w-100 pt-3">Sipariş Özeti</h5>
                                    <div class="row w-100 text-right">
                                        <div class="col-md-3 col-lg-3 col-sm-3 mb-3 order-box">
                                            <h6>Ürün Toplam</h6>
                                            <h5 class="text-danger"><b><?=number_format($order->product_prices, 2, ',', '.')?> $</b></h5>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-3 mb-3 order-box">
                                            <h6>Adet</h6>
                                            <h5 class="text-warning"><?=(int)$order->product_counts?></h5>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-3 mb-3 order-box">
                                            <h6>Kargo</h6>
                                            <h5 class="text-danger"><?=$order->cargo==0?'Ücretsiz':number_format($order->cargo, 2, ',', '.').' $'?></h5>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-3 mb-3 order-box">
                                            <h6>Genel Toplam</h6>
                                            <h5 class="text-danger"><?=number_format($order->price+$order->cargo, 2, ',', '.').' $'?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row order_row">
                                    <h5 class="w-100 pt-3">Ürünler</h5>
                                    <?php foreach ($order->lines as $key => $val){ ?>
                                    <div class="col-md-12 order-box m--margin-bottom-30">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-2 col-sm-6 col-xs-6 m--margin-bottom-30">
                                                <h6>Stok Kodu</h6>
                                                <h5><?=$val->kod?></h5>
                                            </div>
                                            <div class="col-md-6 col-lg-2 col-sm-6 col-xs-6 m--margin-bottom-30">
                                                <h6>Ürün Adı</h6>
                                                <h5><?=$val->name?></h5>
                                            </div>
                                            <div class="col-md-6 col-lg-1 col-sm-6 col-xs-6 m--margin-bottom-30">
                                                <h6>Renk </h6>
                                                <h5><?=$val->color?></h5>
                                            </div>
                                            <div class="col-md-6 col-lg-2 col-sm-6 col-xs-6 m--margin-bottom-30">
                                                <h6>Beden</h6>
                                                <h5 class="text-info"><?=$val->size?></h5>
                                            </div>
                                            <div class="col-md-6 col-lg-2 col-sm-6 col-xs-6 m--margin-bottom-30">
                                                <h6>Satış Fiyatı (Adet) </h6>
                                                <h5 class="text-danger"><?=number_format($val->price,2,',','.')?> $</h5>
                                            </div>
                                            <div class="col-md-6 col-lg-2 col-sm-6 col-xs-6 m--margin-bottom-30">
                                                <h6>Adet</h6>
                                                <h5 style="color:green"><?=(int)$val->qty?></h5>
                                            </div>
                                            <div class="col-md-6 col-lg-1 col-sm-6 col-xs-6 m--margin-bottom-30">
                                                <a href="<?=site_url('product/'.$val->url.'/'.$val->product_id)?>" class="btn btn-outline-info">Ürüne Git</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <script>
                                    function kargoGuncelle(){
                                        var data = {text:$('#cargoText').val()};
                                        $.ajax({
                                            url: '<?=site_url()?>/Ajax/addCargoAdmin/<?=$order->id?>',
                                            method: 'POST',
                                            dataType: 'JSON',
                                            data:data,
                                            success: function (result) {
                                                swal({
                                                    title: "Başarılı !",
                                                    text: "Bilgi güncellendi",
                                                    icon: "success",
                                                    button: "Tamam",
                                                });
                                            },
                                            error: function (result) {
                                                swal({
                                                    title: "Error !",
                                                    text: "Sorry, we encountered a technical error",
                                                    icon: "danger",
                                                    button: "OKEY",
                                                });
                                            }
                                        });
                                    }
                                </script>
                                <div class="row order_row mt-3">
                                    <div class="row w-100 text-left">
                                        <div class="col-5 col-md-5">Kargo Bilgisi : </div>
                                        <div class="col-5 col-md-5">
                                            <input type="text"  class="form-control" value="<?=$order->cargotext?>" id="cargoText">
                                        </div>
                                        <div class="col-2 col-md-2">
                                            <button type="button" onclick="kargoGuncelle()" class="btn btn-primary">Güncelle</button>
                                        </div>
                                        <br>
                                        <hr class="col-md-12">
                                    </div>
                                    <div class="row w-100 text-left">
                                        <p class="col-12">
                                            <span class="m-badge m-badge--success m-badge--wide">
                                                Adres
                                            </span>
                                        </p>
                                        <div class="col-md-6 col-lg-6 col-sm-6 mb-3 order-box">
                                            <h5>Adres Kimlik Bilgileri</h5>
                                            <hr>
                                            <h6><span class="m--font-bold">Ad Soyad:</span> <?=$order->name.' '.$order->surname?></h6>
                                            <h6><span class="m--font-bold">Telefon:</span> <?=$order->phone?></h6>
                                            <h6><span class="m--font-bold">E-Posta:</span> <?=$order->email?></h6>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6 mb-3 order-box">
                                            <h5>Adres Bilgileri</h5>
                                            <hr>
                                            <h6><span class="m--font-bold">İl / İlçe:</span> <?=$order->city?> / <?=$order->town?></h6>
                                            <h6><span class="m--font-bold">Ülke:</span> <?=$order->country?></h6>
                                            <h6><span class="m--font-bold">Posta Kodu:</span> <?=$order->postcode?></h6>
                                            <h6><span class="m--font-bold">Adres:</span> <?=$order->address?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div><!--end: Search Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>