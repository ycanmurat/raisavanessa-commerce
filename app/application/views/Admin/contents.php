<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
           İçerikler
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
                           <th>İçerik Başlığı</th>
                           <th>İçerik Fotoğrafları</th>
                           <th>Kategori</th>
                           <th>Kategori Bilgisi</th>
                           <th>İçerik Bilgisi</th>
                           <th>Durumu</th>
                           <th style="text-align:right;">İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?$modal=1349;if($contents==0){?><tr><td><font color="red">Şuanda Yüklü Bir İçerik Yok</font></td></tr><?}else{
                        foreach ($contents as $key => $info){
                           if ($info->status == 1){
                              $newInfo = 0;
                           }elseif($info->status == 0){
                              $newInfo = 1;
                           }?>
                        <tr>
                           <td><?=$info->id?></td>
                           <td><?=$info->category_name?></td>
                           <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_<?=$info->category_slug?>">
                                 Fotoğraflar
                              </button>
                           </td>
                           <div class="modal fade" id="m_modal_<?=$info->category_slug?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">
                                          <?=$info->category_name?>
                                       </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">
                                             &times;
                                          </span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                          <p>İçerik Fotoğrafı :</p><center><img src="<?=site_url($info->title_image)?>" style="max-width:100%;"></center><br>
                                          <p>İçerik İkonu :</p><center><img src="<?=site_url($info->content_image)?>" style="max-width:100%;"></center>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                          Geri Çık
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <td><?=$info->s_category_name?></td>
                           <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_<?=$info->s_category_slug?>">
                                Kategori Bilgisi Gör
                              </button>
                           </td>
                           <div class="modal fade" id="m_modal_<?=$info->s_category_slug?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">
                                          <?=$info->category_name?>
                                       </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">
                                             &times;
                                          </span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <center>
                                          <p><b>Tahmini Fiyatlandırma :</b> <?=$info->price?></p><br>
                                          <p><b>Bakım Yeri :</b> <?=$info->location?></p><br>
                                          <p><b>Zamanlama :</b> <?=$info->time?></p><br>
                                          <p><b>Sezon :</b> <?=$info->season?></p><br>
                                          <p><b>Uzmanlar :</b> <?=$info->expert?></p><br>
                                       </center>
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
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_<?=$modal?>">
                                İçeriği Gör
                              </button>
                           </td>
                           <div class="modal fade" id="m_modal_<?=$modal?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">
                                          <?=$info->s_category_name?>
                                       </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">
                                             &times;
                                          </span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <center>
                                          <p><?=$info->content?></p><br>
                                       </center>
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
                              <input type="checkbox" <?=$info->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Slider_category/contentStatusUpdate/'.$info->id.'/'.$newInfo)?>'">
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
                                    <a class="dropdown-item" style="cursor:pointer;" onclick="deleteConfirm('<?=admin_url('Slider_category/deleteContent/'.$info->id)?>')">Sil</a>
                                    <a class="dropdown-item" style="cursor:pointer;" href="<?=admin_url('Slider_category/editContent/'.$info->id)?>">Düzenle</a>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <?$modal++;}}?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>