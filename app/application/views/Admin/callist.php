<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Aranacak Listesi
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
                           <th>IP</th>
                           <th>Tarih</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($list as $key => $val){ ?>
                        <tr>
                           <td><?=$val->id?></td>
                           <td><?=$val->name?></td>
                           <td><?=$val->email?></td>
                           <td><?=$val->gsm?></td>
                           <td><?=$val->ip?></td>
                           <td><?=$val->added_time?></td>
                           <td><a href="<?=admin_url('Calllist/delete/'.$val->id)?>" class="btn btn-danger">Sil</a></td>

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