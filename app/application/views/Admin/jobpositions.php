<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            İş Pozisyonları
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
         <div>
            <button type="button" class="btn m-btn--air btn-warning" data-toggle="modal" data-target="#m_modal_Add">Ekle</button>
         </div>
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
                           <th>İsim</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($list as $key => $val){ ?>
                        <tr>
                           <td><?=$val->Id?></td>
                           <td><?=$val->name?></td>
                           <td><a href="<?=admin_url('JobApp/PositionDelete/'.$val->Id)?>" class="btn btn-danger">Sil</a></td>
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

<!--begin::Modal-->
<div class="modal fade" id="m_modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <form method="POST" action="<?=admin_url('JobApp/addPosition')?>">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">
                 Pozisyon Ekle
               </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                     &times;
                  </span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label for="recipient-name" class="form-control-label">
                     Pozisyon Adı
                  </label>
                  <input type="text" name="name" class="form-control">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">
                  Kapat
               </button>
               <input type="submit" class="btn btn-success" value="Ekle">
            </div>
         </form>
      </div>
   </div>
</div>
<!--end::Modal-->