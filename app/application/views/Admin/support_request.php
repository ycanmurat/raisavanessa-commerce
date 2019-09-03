<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Destek Talepleri
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
                           <th>Üye</th>
                           <th>Email</th>
                           <th>Telefon</th>
                           <th>Konu</th>
                           <th>Durum</th>
                           <th>İçerik</th>
                           <th style="text-align:right;">İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($support_request as $key => $val) { ?>
                        <tr>
                            <th><?=$val->fullname?></th>
                            <th><?=$val->email?></th>
                            <th><?=$val->phone?></th>
                            <th><?php echo $val->type == 1 ? 'Şikayet' : ($val->type == 2 ? 'Öneri' : 'Talep' ) ?></th>
                            <th><?php echo $val->status == 0 ? 'İncelenmeyi Bekliyor' : ($val->status == 1 ? 'İnceleniyor' : 'Çözümlendi' ) ?></th>
                            <th>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_<?=$val->id?>">
                                 İçeriği Gör
                              </button>
                             </th>
                             <div class="modal fade" id="m_modal_<?=$val->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                      <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">
                                            <?=$val->fullname?>
                                         </h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">
                                               &times;
                                            </span>
                                         </button>
                                      </div>
                                      <div class="modal-body">
                                         <p>
                                             <?php echo $val->message; ?>
                                         </p>
                                      </div>
                                      <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Geri Çık
                                         </button>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <td>
                              <div class="dropdown d-inline">
                                 <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 İşlem Seçin
                                 </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="deleteConfirm('<?=admin_url('Support_request/delete/'.$val->id)?>')" style="cursor: pointer;">Sil</a>
                                    <a class="dropdown-item" href="<?=admin_url('Support_request/inspecting/'.$val->id)?>" style="cursor: pointer;">İncelemede</a>
                                    <a class="dropdown-item" href="<?=admin_url('Support_request/resolved/'.$val->id)?>" style="cursor: pointer;">Çözümlendi</a>
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