<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
            Hakkımızda Sayfasını Düzenliyorsunuz
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
                    <a href="<?=admin_url('')?>" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Anasayfa
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
            <?if($this->session->flashdata('onay')==1){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>
                Başarılı
                </strong>
                Bilgiler Başarıyla Güncellendi
            </div>
            <?}elseif($this->session->flashdata('hata')==1){?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>
                Başarısız
                </strong>
                Bilgiler Güncellenemiyor Lütfen Geliştiricinizden Yardım İsteyin
            </div>
            <?}?>
            <div class="m-portlet">
                <hr>
                <div class="m-portlet__body">
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                        <table class="table m-table m-table--head-bg-primary table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Başlık</th>
                                    <th>Sıra</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $key => $val){ ?>
                                <tr>
                                    <td><?=($key+1)?></td>
                                    <td><?=$val->title?></td>
                                    <td><?=$val->sort?></td>
                                    <td><img width="100" src="<?=site_url($val->image)?>"></td>
                                    <td><img width="100" src="<?=site_url($val->image2)?>"></td>
                                    <td><img width="100" src="<?=site_url($val->image3)?>"></td>
                                    <td><a href="<?=admin_url('Corporate/edit/'.$val->Id)?>" class="btn btn-warning">Düzenle</a></td>
                                    <td><a href="<?=admin_url('Corporate/delete/'.$val->Id)?>" class="btn btn-danger">Sil</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <form class="m-form m-form--fit m-form--label-align-right" action="<?=current_url()?>" method="POST">
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label>
                                    Başlık
                                </label>
                                <input type="text" class="form-control m-input" name="title">
                            </div>
                            <div class="form-group m-form__group">
                                <label>
                                    İçerik
                                </label>
                                <textarea class="form-control m-input" id="exampleTextarea" rows="3" name="content"></textarea>
                            </div>
                            <div class="form-group m-form__group">
                                <label>
                                    Sıra
                                </label>
                                <input type="number" class="form-control m-input" name="sort">
                            </div>
                            <div class="col-12 m--padding-left-30 m--padding-right-30">
                                <label>
                                    Fotoğraf
                                </label>
                                <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Corporate/ImageUpload')?>" id="m-dropzone-one">
                                    <div class="m-dropzone__msg dz-message needsclick">
                                        <h3 class="m-dropzone__msg-title">
                                        Fotoğraf Yükle
                                        </h3>
                                        <span class="m-dropzone__msg-desc">
                                            <i class="fa fa-picture-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 m--padding-left-30 m--padding-right-30">
                                <label>
                                    Fotoğraf 2
                                </label>
                                <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Corporate/ImageUpload2')?>" id="m-dropzone-one">
                                    <div class="m-dropzone__msg dz-message needsclick">
                                        <h3 class="m-dropzone__msg-title">
                                        Fotoğraf Yükle
                                        </h3>
                                        <span class="m-dropzone__msg-desc">
                                            <i class="fa fa-picture-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 m--padding-left-30 m--padding-right-30">
                                <label>
                                    Fotoğraf 3
                                </label>
                                <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Corporate/ImageUpload3')?>" id="m-dropzone-one">
                                    <div class="m-dropzone__msg dz-message needsclick">
                                        <h3 class="m-dropzone__msg-title">
                                        Fotoğraf Yükle
                                        </h3>
                                        <span class="m-dropzone__msg-desc">
                                            <i class="fa fa-picture-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6 text-right">
                                    <button type="submit" class="btn btn-primary">
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