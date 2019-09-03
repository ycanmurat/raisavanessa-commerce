<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
            Kontrol Paneli
            </h3>
        </div>
    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">
    <!--Begin::Main Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Orders-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                            Sabit Sayfa
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Yayındaki Sabit Sayfa Sayısı
                            </span>
                            <br><br>
                            <span class="m-widget24__stats m--font-danger">
                                <?=$staticsCount?>
                            </span>
                            <br><br>
                        </div>
                    </div>
                    <!--end::New Orders-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Users-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                            Dil
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Yayındaki Dil Sayısı
                            </span>
                            <br><br>
                            <span class="m-widget24__stats m--font-success">
                                <?=$languagesCount?>
                            </span>
                            <br><br>
                        </div>
                    </div>
                    <!--end::New Users-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                            Kategori
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Yayındaki Kategori Sayısı
                            </span>
                            <br><br>
                            <span class="m-widget24__stats m--font-brand">
                                <?=$categoryCount?>
                            </span>
                            <br><br>
                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Feedbacks-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                            Ürün
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Yayındaki Ürün Sayısı
                            </span>
                            <br><br>
                            <span class="m-widget24__stats m--font-info">
                                <?=$productCount?>
                            </span>
                            <br><br>
                        </div>
                    </div>
                    <!--end::New Feedbacks-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--End::Main Portlet-->
<!--<div class="m-portlet m-portlet--full-height">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                Yayındaki Haberler
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget5_tab1_content" onclick="window.location='<?=admin_url('News')?>'" role="tab">
                        Tümü
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <div class="tab-content">
            <div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
                <div class="m-widget5">
                    <?foreach($newsInfo as $key => $news){?>
                    <div class="m-widget5__item">
                        <div class="m-widget5__pic">
                            <img class="m-widget7__img" src="<?=site_url($news->news_picture)?>" alt="">
                        </div>
                        <div class="m-widget5__content">
                            <h4 class="m-widget5__title">
                            <?=mb_substr($news->news_title,0,70,'UTF-8')?>
                            </h4>
                            <span class="m-widget5__desc">
                                <?=mb_substr($news->news_content,0,140,'UTF-8')?>
                            </span>
                            <div class="m-widget5__info">
                                <span class="m-widget5__author">
                                    Yayınlayan:
                                </span>
                                <span class="m-widget5__info-author m--font-info">
                                    Yönetici
                                </span>
                                <span class="m-widget5__info-label">
                                    Ekleme Tarihi:
                                </span>
                                <span class="m-widget5__info-date m--font-info">
                                    <?=$news->added_time?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
</div>-->
</div>
</div>
</div>
<!-- end:: Body -->
<!-- begin::Footer -->
<footer class="m-grid__item     m-footer ">
<div class="m-container m-container--fluid m-container--full-height m-page__container">
<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
    <span class="m-footer__copyright">
        2020 &copy;
        <a href="http://makingknowing.com" target="_blank" class="m-link">
            MakingKnowing
        </a>
        Content Management System
    </span>
</div>
<!--<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
    <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
            <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                            <span class="m-nav__link-text">
                                    About
                            </span>
                    </a>
            </li>
            <li class="m-nav__item">
                    <a href="#"  class="m-nav__link">
                            <span class="m-nav__link-text">
                                    Privacy
                            </span>
                    </a>
            </li>
            <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                            <span class="m-nav__link-text">
                                    T&C
                            </span>
                    </a>
            </li>
            <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                            <span class="m-nav__link-text">
                                    Purchase
                            </span>
                    </a>
            </li>
            <li class="m-nav__item m-nav__item">
                    <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
                            <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                    </a>
            </li>
    </ul>
</div>-->
</div>
</div>
</footer>
<!-- end::Footer -->
</div>
<!-- end:: Page -->
<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
<i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->
</body>
<!-- end::Body -->
</html>