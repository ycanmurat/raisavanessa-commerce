<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Sayfalar
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
                           <th>Fotoğraf</th>
                           <th>Başlık</th>
                           <th>Menü Başlığı</th>
                           <th>Durum</th>
                           <th style="text-align:right;">İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?if($NewsInfo==0){?><tr><td><font color="red">Şuanda Yüklü Bir Sayfa Yok</font></td></tr><?}else{
                        foreach ($NewsInfo as $key => $NewsData){if($NewsData->status==0){$new_info=1;}else{$new_info=0;}?>
                        <tr>
                           <td><?=$NewsData->Id?></td>
                           <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_<?=$NewsData->Id?>">
                                 Fotoğrafı Gör
                              </button>
                           </td>
                           <div class="modal fade" id="m_modal_<?=$NewsData->Id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">
                                          <?=$NewsData->title?>
                                       </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">
                                             &times;
                                          </span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <center><img src="<?=site_url($NewsData->picture)?>" style="max-width:100%;"></center>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                          Geri Çık
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <td><?=$NewsData->title?></td>
                           <td><?=$NewsData->menu?></td>
                           <td style="text-align:right;">
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                              <label>
                              <input type="checkbox" <?=$NewsData->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('News/editStatus/'.$NewsData->Id.'/'.$new_info)?>'">
                              <span></span>
                              </label>
                              </span>
                           </td>
                           <td style="text-align:right;">
                              <div class="dropdown d-inline">
                                 <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 İşlem Seçin
                                 </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="deleteConfirm('<?=admin_url('News/deleteNews/'.$NewsData->Id)?>')">Sil</a>
                                    <a class="dropdown-item" href="<?=admin_url('News/editNews/'.$NewsData->Id)?>">Düzenle</a>
                                 </div>
                           </td>
                        </tr>
                        <?}}?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>