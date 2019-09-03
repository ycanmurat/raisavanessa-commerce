<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Legal Area
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
            <form action="<?=admin_url('Faq/faqSort')?>" method="post">
            <div class="m-portlet__body">
               <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                  <table class="table m-table m-table--head-bg-primary table-responsive">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Başlık</th>
                           <th>İçerik</th>
                           <th>Sıra</th>
                           <th>Durum</th>
                           <th>İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?if($getFaq==0){?><tr><td><font color="red">Şuanda Yüklü Bir alan Yok</font></td></tr><?}else{
                        foreach ($getFaq as $key => $faq_info){
                           if ($faq_info->status == 1){
                              $newInfo = 0;
                           }elseif($faq_info->status == 0){
                              $newInfo = 1;
                           }?>
                        <tr>
                           <td><?=$faq_info->Id?></td>
                           <td><?=$faq_info->title?></td>
                           <td><?=$faq_info->content?></td>
                           <td><input type="number" value="<?=$faq_info->sort?>" name="sort[<?=$faq_info->Id?>]" class="form-control" style="width: 100%"></td>
                           <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                              <label>
                              <input type="checkbox" <?=$faq_info->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Faq/faqStatusUpdate/'.$faq_info->Id.'/'.$newInfo)?>'">
                              <span></span>
                              </label>
                              </span>
                           </td>
                           <td>
                              <div class="dropdown d-inline">
                                 <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 İşlem Seçin
                                 </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="<?=admin_url('Faq/updateFaq/'.$faq_info->Id)?>">Düzenle</a>
                                    <a class="dropdown-item" onclick="deleteConfirm('<?=admin_url('Faq/deleteFaq/'.$faq_info->Id)?>')">Sil</a>
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
                              Soru Sırasını Düzenle
                           </span>
                     </span>
                  </button>
               </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>