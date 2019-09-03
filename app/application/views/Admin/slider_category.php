<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
           Kategoriler
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
         <?if($this->session->flashdata('hata')=='1'){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız : 
            </strong>
               Anasayfadaki Menüye En Fazla 6 Kategori Eklenebilir
         </div>
         <?}?>
         <div class="m-portlet">
            <div class="m-portlet__body">
               <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                  <table class="table m-table m-table--head-bg-primary table-responsive">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Kategori İsmi</th>
                           <th>Kategori İçeriği</th>
                           <th>Kategori Resmi</th>
                           <th>Durumu</th>
                           <th style="text-align:right;">İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?if($categoryInformation==0){?><tr><td><font color="red">Şuanda Yüklü Bir Kategori Yok</font></td></tr><?}else{
                        foreach ($categoryInformation as $key => $info){
                           if ($info->status == 1){
                              $newInfo = 0;
                           }elseif($info->status == 0){
                              $newInfo = 1;
                           }if ($info->category_menu == 1){
                              $newMenuInfo = 0;
                           }elseif($info->category_menu == 0){
                              $newMenuInfo = 1;
                           }?>
                        <tr>
                           <td><?=$info->id?></td>
                           <td><?=$info->category_name?></td>
                           <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_<?=$info->category_slug?>">
                                 Bilgileri Gör
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
                                       <p><?=$info->category_content?></p>
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
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_<?=$info->id?>">
                                 Fotoğrafı Gör
                              </button>
                           </td>
                           <div class="modal fade" id="m_modal_<?=$info->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                       <div style="background-color:#5867dd;height:150px;">
                                       <center><img src="<?=site_url($info->category_image)?>" style="max-width:100%;max-height:150px;padding:20px;"></center>
                                       </div>
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
                              <input type="checkbox" <?=$info->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Slider_category/categoryStatusUpdate/'.$info->id.'/'.$newInfo)?>'">
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
                                    <a class="dropdown-item" style="cursor:pointer;" onclick="deleteConfirm('<?=admin_url('Slider_category/deleteCategory/'.$info->id)?>')">Sil</a>
                                    <a class="dropdown-item" style="cursor:pointer;" href="<?=admin_url('Slider_category/editCategory/'.$info->id)?>">Düzenle</a>
                                 </div>
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