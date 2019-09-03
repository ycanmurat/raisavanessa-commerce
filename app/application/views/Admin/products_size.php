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
        <div>
            <div style="margin-right:10px;">
                <div>
                    <a type="button" class="btn m-btn--air btn-warning" data-toggle="modal" data-target="#m_modal_4">Beden Ekle</a>
                    <!--begin::Modal-->
                    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                    Yeni Beden ekle
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        &times;
                                    </span>
                                    </button>
                                </div>
                                <form action="<?=site_url('Admin/Products/addSize/'.$id)?>" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                Beden Adı:
                                            </label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">
                                        Ekle
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end::Modal-->
                </div>
            </div>
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
                            <?php foreach ($pSize as $key => $val) { ?>
                                <?php if ($key != 0) { ?>
                                    <hr>
                                <?php } ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-form__group">
                                        <label>
                                            Beden Adı
                                        </label>
                                        <input type="text" class="form-control m-input" value="<?=$val->name?>" name="name[<?=$val->id?>]" placeholder="Beden Adı" required="true">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group m-form__group">
                                        <a style="margin-top: 30px;" class="btn btn-danger" href="<?=site_url('Admin/Products/deleteSize/'.$val->id)?>">Sil</a>
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