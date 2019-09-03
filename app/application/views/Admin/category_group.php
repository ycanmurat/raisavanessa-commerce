<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Dil'ler
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
      <div>
            <div style="margin-right:10px;">
                <div>
                    <a type="button" class="btn m-btn--air btn-warning" data-toggle="modal" data-target="#m_modal_4">Yeni Grup Ekle</a>
                    <!--begin::Modal-->
                    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                    Yeni Grup Ekle
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                    </button>
                                </div>
                                <form action="<?=site_url('Admin/Category/groupAdd')?>" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                Grup Adı (İngilizce)
                                            </label>
                                            <input type="text" class="form-control" name="name" required="">
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="tr_name" class="form-control-label">
                                                Grup Adı (Türkçe)
                                            </label>
                                            <input type="text" class="form-control" name="tr_name" required="">
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
        <?php if ($this->session->flashdata('okey') == 1) { ?>
            <div class="alert alert-success" role="alert">
                Kategori Başarı İle Eklendi
            </div>
        <?php } ?>
         <div class="m-portlet">
            <div class="m-portlet__body">
               <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                  <table class="table m-table m-table--head-bg-primary table-responsive">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Kategori Adı (EN)</th>
                           <th>Kategori Adı (TR)</th>
                           <th>Alt Kategori</th>
                           <th>Durum</th>
                           <th>İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($categories as $key => $val) { ?> 
                            <?php if ($val->status == 0) {
                                $st = 1;
                            }else{
                                $st = 0;
                            } ?>
                            <tr>
                               <td><?=$val->id?></td>
                               <td><?=$val->name?></td>
                               <td><?=$val->tr_name?></td>
                               <td><?=$val->count?></td>
                               <td>
                                  <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                  <label>
                                  <input type="checkbox" <?=$val->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Category/groupStatus/'.$val->id.'/'.$st)?>'">
                                  <span></span>
                                  </label>
                                  </span>
                               </td>
                               <td>
                                  <div class="dropdown d-inline">
                                     <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     İşlem Seçin
                                     </button>
                                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a type="button" class="dropdown-item"  data-toggle="modal" data-target="#m_modal__<?=$key?>">Düzenle</a>
                                        <a type="button" class="dropdown-item"  data-toggle="modal" data-target="#m_modal___<?=$key?>">Kategori Ekle</a>
                                        <a class="dropdown-item" onclick="deleteConfirm('<?=admin_url('Category/groupDelete/'.$val->id)?>')">Sil</a>
                                     </div>
                                  </div>
                               </td>
                            </tr>

                             <!--begin::Modal-->
                            <div class="modal fade" id="m_modal__<?=$key?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                            Kategori Grubu Düzenle
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">
                                                ×
                                            </span>
                                            </button>
                                        </div>
                                        <form action="<?=site_url('Admin/Category/groupUpdate/'.$val->id)?>" method="POST">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name" class="form-control-label">
                                                        Grup Adı (İngilizce)
                                                    </label>
                                                    <input type="text" class="form-control" name="name" value="<?=$val->name?>" required="">
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="tr_name" class="form-control-label">
                                                        Grup Adı (Türkçe)
                                                    </label>
                                                    <input type="text" class="form-control" name="tr_name" value="<?=$val->tr_name?>" required="">
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

                             <!--begin::Modal-->
                            <div class="modal fade" id="m_modal___<?=$key?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                            Kategori Ekle
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">
                                                ×
                                            </span>
                                            </button>
                                        </div>
                                        <form action="<?=site_url('Admin/Category/groupAddUpdate/'.$val->id)?>" method="POST">
                                            <div class="modal-body">
                                                <div class="form-group m-form__group row">
                                                    <label for="name" class="form-control-label">
                                                        Katergorileri Seçin
                                                    </label>
                                                    <select class="form-control m-select2" name="categories[]" id="m_select2_3" multiple="multiple">
                                                        <?php foreach ($mainCategories as $key2 => $val2) { ?>
                                                            <option value="<?=$val2->id?>" <?=array_search($val2->id, $val->sub)>-1?'selected':'' ?>><?=$val2->name?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">
                                                Güncelle
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end::Modal-->
                            <style>
                                .select2-container--default{
                                    width: 100% !important;
                                }
                            </style>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>