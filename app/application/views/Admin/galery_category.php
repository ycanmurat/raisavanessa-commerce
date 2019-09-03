<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Galeri Kategorileri
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
                           <th>Sıra</th>
                           <th>Başlık</th>
                           <th>Arşiv</th>
                           <th>Ana Kategori</th>
                           <th>Video</th>
                           <th style="text-align:right;">Durum</th>
                           <th style="text-align:right;" width="200px">İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?if($categoryInfo==0){?><tr><td><font color="red">Şuanda Yüklü Bir Galeri Kategorisi Yok</font></td></tr>
                        <?}else{foreach ($categoryInfo as $key => $info){if($info->status==0){$st=1;}else{$st=0;}?>
                        <tr>
                           <td><?=$info->Id?></td>
                           <td><?=$info->sort?></td>
                           <td><?=$info->category_title?></td>
                           <td><span class="m-badge m-badge--<?=($info->form==1?'danger':'success')?> m-badge--wide"><?=($info->form==1?'Evet':'Hayır')?></span></td>
                           <td><?=$info->video?></td>
                           <td>
                              <?php if ($info->category) { ?>
                                 <span class="m-badge m-badge--info m-badge--wide"><?=$info->category?></span></td>
                              <?php } ?>
                           <td align="right">
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                              <label>
                              <input type="checkbox" <?=$info->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Galery/editStatus/'.$info->Id.'/'.$st)?>'">
                              <span></span>
                              </label>
                              </span>
                           </td>
                           <td align="right">
                              <div class="dropdown d-inline">
                                 <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 İşlem Seçin
                                 </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="<?=admin_url('Galery/editCategory/'.$info->Id)?>">Düzenle</a>
                                    <?php if (!($info->video)) { ?>
                                       <a class="dropdown-item" href="<?=admin_url('Galery/sub/'.$info->Id)?>">Fotoğraf Ekle</a>
                                    <?php } ?>
                                    <a class="dropdown-item" onclick="deleteConfirm('<?=admin_url('Galery/deleteCategory/'.$info->Id)?>')">Sil</a>
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