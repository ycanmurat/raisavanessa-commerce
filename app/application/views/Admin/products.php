<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
            Ürünler
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
            <?if($this->session->flashdata('off')==1){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>
                Başarılı
                </strong>
                Seçtiğiniz Ürün Artık Slider Altında Görünmeyecek
            </div>
            <?}elseif($this->session->flashdata('off')==2){?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>
                Başarısız
                </strong>
                Seçtiğiniz Ürün Güncellenemiyor.
            </div>
            <?}if($this->session->flashdata('on')==1){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>
                Başarılı
                </strong>
                Seçtiğiniz Ürün Artık Slider Altında Görünecek
            </div>
            <?}elseif($this->session->flashdata('on')==3){?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>
                Başarısız
                </strong>
                Slider Altına En Fazla 3 Ürün Konulabilir
            </div>
            <?}elseif($this->session->flashdata('campaign')==1){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>
                Başarılı
                </strong>
                Seçtiğiniz Ürünün Kampanya Durumu Güncellendi.
            </div>
            <?}?>
            <div class="m-portlet">
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <form action="<?=current_url()?>" method="GET">
                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">
                                    Ürün Arama
                                </label>
                                <input type="text" name="q" class="form-control m-input" placeholder="Ürün Arama">
                            </div>
                        </form>
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                        <table class="table m-table m-table--head-bg-primary table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>İçerik Adı</th>
                                    <th>Kapak Resmi</th>
                                    <th>İçerik Menüsü</th>
                                    <th>Durumu</th>
                                    <th>Sıra No</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?if($productInfo==0){?><tr><td><font color="red">Şuanda Yüklü Bir İçerik Yok</font></td></tr><?}else{
                                foreach ($productInfo as $key => $info){
                                if($info->status==1){$newInfo=0;}else{$newInfo=1;}
                                if($info->campaign==1){$campaign_info=0;}else{$campaign_info=1;}
                                if($info->slider_down_status==1){$slider_down_info=0;}else{$slider_down_info=1;}?>
                                <tr>
                                    <td><?=$info->Id?></td>
                                    <td><?=$info->product_name?></td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_<?=$info->Id?>">
                                        Fotoğrafı Gör
                                        </button>
                                    </td>
                                    <div class="modal fade" id="m_modal_<?=$info->Id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                    <?=$info->product_name?>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">
                                                        &times;
                                                    </span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <center><img src="<?=site_url($info->product_image)?>" style="max-width:100%;"></center>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Geri Çık
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td><?=$info->menu?></td>
                                    <td>
                                        <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                            <label>
                                                <input type="checkbox" <?=$info->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Products/editStatus/'.$info->Id.'/'.$newInfo)?>'">
                                                <span></span>
                                            </label>
                                        </span>
                                    </td>
                                    <td><?=$info->sort?></td>
                                    <td>
                                        <div class="dropdown d-inline">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            İşlem Seçin
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?=admin_url('Products/editProduct/'.$info->Id)?>">Düzenle</a>
                                                <a class="dropdown-item" href="<?=admin_url('Products/editSize/'.$info->Id)?>">Bedenler</a>
                                                <a class="dropdown-item" href="<?=admin_url('Products/editColor/'.$info->Id)?>">Renkler</a>
                                                <a class="dropdown-item" href="<?=admin_url('Products/stocs/'.$info->Id)?>">Stoklar</a>
                                                <a class="dropdown-item" onclick="deleteConfirm('<?=admin_url('Products/deleteProduct/'.$info->Id)?>')">Sil</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?}}?>
                                </tbody>
                            </table>
                        </div>
                    <div class="btn-group mr-2" role="group" aria-label="...">
                        <a href="<?=site_url('Admin/Products?p='.($page-1).(isset($q)?'&q='.$q:''))?>" class="m-btn btn btn-primary <?=$page <= 1 ? 'disabled':''?>">
                            <<
                        </a>

                        <?php for ($i=1; $i <= $pageCount ; $i++) { ?>
                            <a href="<?=site_url('Admin/Products?p='.$i.(isset($q)?'&q='.$q:''))?>" class="m-btn btn btn-<?=$page == $i?'info':'secondary'?>">
                                <b><?=$i?></b>
                            </a>
                        <?php } ?>

                        <a href="<?=site_url('Admin/Products?p='.($page+1).(isset($q)?'&q='.$q:''))?>" class="m-btn btn btn-primary <?=$page >= $pageCount? 'disabled':''?>">
                            >>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>