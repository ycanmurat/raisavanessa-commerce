<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Siparişler
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
               <a href="<?=admin_url()?>" class="m-nav__link">
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
                           <th>Ad Soyad</th>
                           <th>Telefon</th>
                           <th>Toplam</th>
                           <th>Sipariş Tarihi</th>
                           <th>Sipariş Durumu</th>
                           <th>Ödeme Durum</th>
                           <th>İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($orders as $key => $order_info){ ?>
                        <tr>
                           <td><?=$order_info['id']?></td>
                           <td><?=$order_info['name'] . ' ' . $order_info['surname']?></td>
                           <td><?=$order_info['phone']?></td>
                           <td><?=$order_info['sub']?> EUR</td>
                           <td><?=$order_info['added_time']?></td>
                           <td><span class="m-badge m-badge--<?=admin_order_status_color($order_info['status'])?> m-badge--wide"><?=admin_order_status($order_info['status'])?></td>
                            <td><span class="m-badge m-badge--<?=payment_status_color($order_info['payment_status'])?> m-badge--wide"><?=payment_status($order_info['payment_status'])?></td>
                           <td>
                              <a href="<?=site_url('Admin/Orders/detail/'.$order_info['id'])?>" class="btn btn-info">Sipariş Detayı<a>
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