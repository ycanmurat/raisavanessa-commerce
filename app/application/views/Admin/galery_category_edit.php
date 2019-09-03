<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
         "<?=$info->category_title?>" Kategorisini Düzenliyorsunuz
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
               <a href="<?=admin_url('Galery/category')?>" class="m-nav__link">
                  <span class="m-nav__link-text">
                     Galeri Kategorileri
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
            Galeri Kategorisi Başarıyla Güncellendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
            Başarısız
            </strong>
            Galeri Kategorisi Güncellenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Galery/editCategory/'.$info->Id)?>" method="POST">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                     <div class="form-group m-form__group">
                        <label>
                           Kategori İsmi EN <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="category_title" value="<?=$info->category_title?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                           Kategori İsmi TR <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="category_title_tr" value="<?=$info->category_title_tr?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                           Video (sadece vimeo link son numarası)
                        </label>
                        <input type="text" class="form-control m-input" name="video" value="<?=$info->video?>" placeholder="Video">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                           Sırası
                        </label>
                        <input type="number" class="form-control m-input" name="sort" value="<?=$info->sort?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                           Üst Kategori
                        </label>
                        <select name="main_category" class="form-control">
                           <option value="0">Ana Kategori</option>
                           <?php foreach ($categories as $key => $val) { ?>
                              <option value="<?=$val->Id?>" <?=($val->Id == $info->main_category?'selected':'')?>><?=$val->category_title?></option>
                           <?php } ?>
                        </select>
                     </div>
                     <div class="form-group m-form__group">
                        <label for="form">Arşiv mi ?</label><br>
                        <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                           <label>
                              <input type="checkbox" name="form" <?=$info->form==1?'checked':''?> id="form">
                              <span></span>
                           </label>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="m-portlet__foot m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions">
                     <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 text-right">
                           <button type="submit" class="btn btn-primary">
                           Güncelle
                           </button>
                           <button type="reset" onclick="window.location='<?=admin_url('Galery/category')?>'" class="btn btn-secondary">
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