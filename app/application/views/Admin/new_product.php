<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Yeni Ürün Ekle, Listele ve Sil
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
               <a href="<?=admin_url('Products')?>" class="m-nav__link">
               <span class="m-nav__link-text">
               Ürünler
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
         <?if($this->session->flashdata('onay')==1){?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarılı
            </strong>
               Yeni Ürün Başarıyla Anasayfada Listelendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Yeni Ürün Yüklenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}elseif($this->session->flashdata('urun_var')=='1'){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Zaten Seçtiğiniz Ürün Yeni Ürünler Kategorisinde Bulunuyor
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Products/NewsProductAdd')?>" method="POST">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                     <div class="form-group m-form__group">
                        <label>
                        Ürün İsmini Yüklü Ürünlerden Seçebilirsiniz
                        </label>
                        <select class="form-control m-input" id="exampleSelect1" name="product_id">
							<?foreach ($products as $key => $value){?>
							<option value="<?=$value->Id?>">
								<?=$value->product_name?>
							</option>
							<?}?>
						</select>
                     </div>
                  </div>
               </div>
               <div class="m-portlet__foot m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions">
                     <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 text-right">
                           <button type="submit" class="btn btn-primary">
                           Ekle
                           </button>
                           <button type="reset" onclick="window.location='<?=admin_url('Products')?>'" class="btn btn-secondary">
                           İptal
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="m-content" style="margin-top:-70px;">
   <div class="row">
      <div class="col-lg-12">
         <div class="m-portlet">
            <div class="m-portlet__body">
               <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                  <table class="table m-table m-table--head-bg-primary table-responsive">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Yeni Ürünlerde Görünün Ürün Adı</th>
                           <th style="text-align:right;">İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?if($getNewsProduct==0){?><tr><td><font color="red">Şuanda Yüklü Bir Yeni Ürün Yok</font></td></tr><?}else{
                        foreach ($getNewsProduct as $key => $info){?>
                        <tr>
                           <td><?=$info->Id?></td>
                           <td><?=$info->product_name?></td>
                           <td align="right">
                              <div class="dropdown d-inline">
                                 <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 İşlem Seçin
                                 </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="deleteConfirm('<?=admin_url('Products/deleteNewProduct/'.$info->Id)?>')">Yeni Ürünlerden Kaldır</a>
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