<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
            "<?=$pInfo->product_name?>" Ürünü Bedenlerini Düzenliyorsunuz
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="<?=admin_url()?>" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="<?=admin_url('Products')?>" class="m-nav__link">
                        <span class="m-nav__link-text">
                            İçerikler
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
            <?php if($this->session->flashdata('onay')==1){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>
                Başarılı
                </strong>
                Ürün Başarıyla Güncellendi
            </div>
            <?php }elseif($this->session->flashdata('hata')==1){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>
                Başarısız
                </strong>
                Ürün Güncellenemiyor Lütfen Geliştiricinizden Yardım İsteyin
            </div>
            <?php }if (validation_errors()) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <?=validation_errors()?>
            </div>
            <?php } ?>
            <div class="m-portlet">
                <form class="m-form m-form--fit m-form--label-align-right" action="<?=current_url()?>" method="POST"  enctype="multipart/form-data">
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <?php foreach ($colorsize as $key => $val) { ?>
                                <?php if ($key != 0) { ?>
                                    <hr>
                                <?php } ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group m-form__group">
                                        <input type="hidden" name="size[<?=$key?>]" value="<?=$val->size?>">
                                        <input type="text" class="form-control m-input" disabled value="<?=$val->size?>" name="name[<?=$key?>]" placeholder="Beden Adı" required="true">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group m-form__group">
                                        <input type="hidden" name="color[<?=$key?>]" value="<?=$val->color?>">
                                        <input class="form-control m-input" disabled type="text" style="height: 40px;" name="name[<?=$key?>]"  value="<?=$val->color?>" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group m-form__group">
                                        <input type="number" class="form-control m-input" value="<?=$val->value?>" name="stok[<?=$key?>]" placeholder="Beden Adı" required="true">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group m-form__group">
                                        <input type="number" class="form-control m-input" step="0.01" value="<?=$val->price ?? 0?>" name="price[<?=$key?>]" placeholder="Fiyat Girin" >
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6 text-right">
                                    <button type="submit" class="btn btn-info">
                                    Güncelle
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>