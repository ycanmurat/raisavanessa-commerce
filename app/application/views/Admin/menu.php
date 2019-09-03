<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Menüler
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
            <form action="<?=admin_url('Menu/menuSort')?>" method="post">
            <div class="m-portlet__body">
               <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                  <table class="table m-table m-table--head-bg-primary table-responsive">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Menü İsmi</th>
                           <th>Menü Sırası</th>
                           <th>Durum</th>
                           <th></th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?if($getMenu==0){?><tr><td><font color="red">Şuanda Yüklü Bir Menü Yok</font></td></tr><?}else{
                        foreach ($getMenu as $key => $menu_info){
                           if ($menu_info->status == 1){
                              $newInfo = 0;
                           }elseif($menu_info->status == 0){
                              $newInfo = 1;
                           }?>
                        <tr>
                           <td><?=$menu_info->Id?></td>
                           <td><?=$menu_info->menu?></td>
                           <td><input type="number" value="<?=$menu_info->sort?>" name="sort[<?=$menu_info->Id?>]" class="form-control" style="width: 100%"></td>
                           <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                              <label>
                              <input type="checkbox" <?=$menu_info->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Menu/MenuStatusUpdate/'.$menu_info->Id.'/'.$newInfo)?>'">
                              <span></span>
                              </label>
                              </span>
                           </td>
                           <td>
                              <a class="btn btn-warning" href="<?=admin_url('Menu/update/'.$menu_info->Id)?>">Düzenle</a>
                           </td>
                           <td>
                              <a class="btn btn-danger" href="<?=admin_url('Menu/deleteMenu/'.$menu_info->Id)?>">Sil</a>
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
                             Menü Sırasını Düzenle
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