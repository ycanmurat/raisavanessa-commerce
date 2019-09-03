<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Kategori
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
                    <a href="<?=site_url('Admin/Category/add/'.$id)?>" class="btn m-btn--air btn-warning">Kategori Ekle</a>
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
                           <th>Kategori Adı</th>
                           <th>Sıra</th>
                           <th>Üst Kategori</th>
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
                               <td><?=$key+1?></td>
                               <td><?=$val->name?></td>
                               <td><?=$val->sort?></td>
                               <td><?=$val->main_name?></td>
                               <td>
                                  <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                  <label>
                                  <input type="checkbox" <?=$val->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Category/status/'.$val->id.'/'.$st)?>'">
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
                                        <a class="dropdown-item" href="<?=admin_url('Category/edit/'.$val->id)?>">Düzenle</a>
                                        <a class="dropdown-item" href="<?=admin_url('Category/Sub/'.$val->id)?>">Alt Kategoriler</a>
                                        <a class="dropdown-item" onclick="deleteConfirm('<?=admin_url('Category/delete/'.$val->id)?>')">Sil</a>
                                     </div>
                                  </div>
                               </td>
                            </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>