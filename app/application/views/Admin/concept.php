<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Konsept'ler
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
                           <th>İsim</th>
                           <th>Kapak Resmi</th>
                           <th>Durum</th>
                           <th></th>
                           <th>İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($concepts as $key => $val){
                           if ($val->status == 1){
                              $newInfo = 0;
                           }elseif($val->status == 0){
                              $newInfo = 1;
                           }?>
                        <tr>
                           <td><?=$val->Id?></td>
                           <td><?=$val->name?></td>
                           <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_<?=$val->Id?>">
                                 Fotoğrafı Gör
                              </button>
                           </td>
                           <div class="modal fade" id="m_modal_<?=$val->Id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">
                                          <?=$val->name?>
                                       </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">
                                             &times;
                                          </span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <center><img src="<?=site_url($val->image)?>" style="max-width:100%;"></center>
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
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                              <label>
                              <input type="checkbox" <?=$val->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Concept/editStatus/'.$val->Id.'/'.$newInfo)?>'">
                              <span></span>
                              </label>
                              </span>
                           </td>
                           <td>
                              <a class="btn btn-success" href="<?=(admin_url('Concept/products/'.$val->Id))?>">Ürünler</a>
                           </td>
                           <td>
                              <div class="dropdown d-inline">
                                 <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 İşlem Seçin
                                 </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="<?=admin_url('Concept/update/'.$val->Id)?>" >Düzenle</a>
                                    <a class="dropdown-item" onclick="deleteConfirm('<?=admin_url('Concept/delete/'.$val->Id)?>')">Sil</a>
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