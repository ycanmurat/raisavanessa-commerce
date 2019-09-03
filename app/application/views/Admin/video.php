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
                           <th>Video</th>
                           <th style="text-align:right;" width="200px">Durum</th>
                           <th style="text-align:right;">İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?if($imageInfo==0){?><tr><td><font color="red">Şuanda Yüklü Bir video Yok</font></td></tr>
                        <?}else{foreach ($imageInfo as $key => $info){if($info->status==0){$st=1;}else{$st=0;}?>
                        <tr>
                           <td><?=$info->Id?></td>
                           <td><a href="https://youtube.com/watch?v=<?=$info->url?>" target="_blank"><?=$info->url?></a></td>
                           <td style="text-align:right;" width="200px">
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                              <label>
                              <input type="checkbox" <?=$info->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Video/VideoEditStatus/'.$info->Id.'/'.$st)?>'">
                              <span></span>
                              </label>
                              </span>
                           </td>
                           <td align="right">
                              <div class="dropdown d-inline">
                                 <button class="btn btn-danger" type="button" onclick="deleteConfirm('<?=admin_url('Video/deleteVideo/'.$info->Id)?>')">
                                 Sil
                                 </button>
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