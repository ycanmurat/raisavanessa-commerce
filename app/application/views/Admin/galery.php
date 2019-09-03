<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Fotoğraflar
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
                    <a href="<?=site_url('Admin/Galery/add/'.$id)?>" class="btn m-btn--air btn-warning">Fotoğraf Ekle</a>
                </div>
            </div>
        </div>
   </div>
</div>
<div class="m-content">
   <div class="row">
      <div class="col-lg-12">
         <div class="m-portlet">
            <form action="<?=admin_url('Galery/imageSort')?>" method="post">
            <div class="m-portlet__body">
               <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                  <table class="table m-table m-table--head-bg-primary table-responsive">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Gör</th>
                           <th>Sıra</th>
                           <th style="text-align:right;" width="200px">Durum</th>
                           <th style="text-align:right;">İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?if($imageInfo==0){?><tr><td><font color="red">Şuanda Yüklü Bir Fotoğraf Yok</font></td></tr>
                        <?}else{foreach ($imageInfo as $key => $info){if($info->status==0){$st=1;}else{$st=0;}?>
                        <tr>
                           <td><?=$info->id?></td>
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
                                          <?=$info->image_title?>
                                       </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">
                                             &times;
                                          </span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <center><img src="<?=site_url($info->image_url)?>" style="max-width:100%;"></center>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                          Geri Çık
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <td width="100px"><input type="number" value="<?=$info->sort?>" name="sort[<?=$info->id?>]" class="form-control" style="width: 100%"></td>
                           <td style="text-align:right;" width="200px">
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                              <label>
                              <input type="checkbox" <?=$info->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Galery/GaleryEditStatus/'.$info->id.'/'.$st)?>'">
                              <span></span>
                              </label>
                              </span>
                           </td>
                           <td align="right">
                              <div class="dropdown d-inline">
                                 <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 İşlem Seçin
                                 </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="cursor: pointer;">
                                    <a class="dropdown-item" href="<?=admin_url('Galery/editGalery/'.$info->id)?>">Düzenle</a>
                                    <a class="dropdown-item" href="<?=admin_url('Galery/sub/'.$info->id)?>">Görseller</a>
                                    <a class="dropdown-item" onclick="deleteConfirm('<?=admin_url('Galery/deleteGalery/'.$info->id)?>')">Sil</a>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <?}}?>
                     </tbody>
                  </table>
               </div>
               <div class="text-right">
                  <button type="submit" style="" class="btn btn-outline-primary m-btn m-btn--icon m-btn--outline-2x">
                     <span>
                        <i class="fa flaticon-list-1"></i>
                           <span>
                              Fotoğraf Sırasını Düzenle
                           </span>
                     </span>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>