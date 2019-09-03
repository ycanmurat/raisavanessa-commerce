<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Trend Ayarları
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
            <form action="<?=admin_url('Campaign/trendSort')?>" method="post">
            <div class="m-portlet__body">
               <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                  <table class="table m-table m-table--head-bg-primary table-responsive">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Trend İsmi</th>
                           <th>Trend Sırası</th>
                           <th>Trend Durumu</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?if($getTrend==0){?><tr><td><font color="red">Şuanda Yüklü Bir Ürün, Trend Yok</font></td></tr>
                        <?}else{foreach ($getTrend as $key => $info){
                           if($info->trend_sort==0){
                              $newTrendSort=1;
                           }else{
                              $newTrendSort=0;
                           }if($info->trend_status==0){
                              $newStatus=1;
                           }else{
                              $newStatus=0;
                           }?>
                        <tr>
                           <td><?=$info->Id?></td>
                           <td><?=$info->product_name?></td>
                           <td><input type="number" value="<?=$info->trend_sort?>" name="sort[<?=$info->Id?>]" class="form-control" style="width: 100%"></td>
                           <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                              <label>
                              <input type="checkbox" <?=$info->trend_status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Campaign/editTrendStatus/'.$info->Id.'/'.$newStatus)?>'">
                              <span></span>
                              </label>
                              </span>
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
                              Trend Sırasını Yeniden Düzenle
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