<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Teklif Başvuruları
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
         <div class="m-portlet">
            <div class="m-portlet__body">
               <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                  <table class="table m-table m-table--head-bg-primary table-responsive">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Ad Soyad</th>
                           <th>Email</th>
                           <th>GSM</th>
                           <th>Tarih</th>
                           <th>Detay</th>
                           <th>İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if($dateInfo!=0){foreach ($dateInfo as $key => $val){ ?>
                        <tr>
                           <td><?=$val->Id?></td>
                           <td><?=$val->name.' '.$val->last_name?></td>
                           <td><?=$val->email?></td>
                           <td><?=$val->number?></td>
                           <td><?=$val->added_time?></td>
                           <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#m_modal_<?=$val->Id?>">Detay</button></td>
                           <td><a href="<?=admin_url('Contact/deleteOffer/'.$val->Id)?>" class="btn btn-danger">Sil</a></td>
                        </tr>
                        <?php } }?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php if($dateInfo!=0){foreach ($dateInfo as $key => $val){ ?>
   <!--begin::Modal-->
      <div class="modal fade" id="m_modal_<?=$val->Id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                     Başvuru No : <?=$val->Id?>
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">
                        &times;
                     </span>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <div class="form-group">
                        <label for="recipient-name" class="form-control-label">
                           Ad Soyad :
                        </label>
                        <input type="text" value="<?=$val->name.' '.$val->last_name?>" class="form-control" disabled class="disabled">
                     </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">
                           E-Mail :
                        </label>
                        <input type="text" value="<?=$val->email?>" class="form-control" disabled class="disabled">
                     </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">
                           Telefon No :
                        </label>
                        <input type="text" value="<?=$val->number?>" class="form-control" disabled class="disabled">
                     </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">
                           Almak İstenilen Hizmet 
                        </label>
                        <input type="text" value="<?=$val->service?>" class="form-control" disabled class="disabled">
                     </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">
                           Marka
                        </label>
                        <input type="text" value="<?=$val->brand?>" class="form-control" disabled class="disabled">
                     </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">
                           Model
                        </label>
                        <input type="text" value="<?=$val->model?>" class="form-control" disabled class="disabled">
                     </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">
                           Yakıt
                        </label>
                        <input type="text" value="<?=$val->fuel?>" class="form-control" disabled class="disabled">
                     </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">
                           Şanzıman Tipi
                        </label>
                        <input type="text" value="<?=$val->gearbox?>" class="form-control" disabled class="disabled">
                     </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">
                           Plaka
                        </label>
                        <input type="text" value="<?=$val->plate?>" class="form-control" disabled class="disabled">
                     </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">
                           Kayıt Yapılan IP
                        </label>
                        <input type="text" value="<?=$val->user_ip?>" class="form-control" disabled class="disabled">
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">
                     Kapat
                  </button>
                  <a href="<?=admin_url('Contact/deleteOffer/'.$val->Id)?>" class="btn btn-danger">Sil</a>
               </div>
            </div>
         </div>
      </div>
      <!--end::Modal-->
<?php } }?>