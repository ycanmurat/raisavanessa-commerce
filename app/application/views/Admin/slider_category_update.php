<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            "<?=$getCategoryInformation->category_name?>" Kategorisini Düzenliyorsunuz 
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
               <a href="<?=admin_url('Slider_category')?>" class="m-nav__link">
               <span class="m-nav__link-text">
               Kategoriler
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
               Kategori Başarıyla Güncellendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Kategori Güncellenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Slider_category/editCategory/'.$getCategoryInformation->id)?>" method="POST">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                     <div class="form-group m-form__group">
                        <label>
                        Kategori İsmi
                        </label>
                        <input type="text" class="form-control m-input" name="category_name" value="<?=$getCategoryInformation->category_name?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Kategori Kısa Bilgi
                        </label>
                        <textarea class="form-control" id="m_maxlength_5" maxlength="100" rows="6" name="category_content"><?=$getCategoryInformation->category_content?></textarea>
                     </div>
                     <div class="form-group m-form__group">
                        <label for="exampleSelect1">
                           Şuandaki Kategori Fotoğrafı
                        </label>
                        <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                           <div class="row">
                                 <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images">
                                       <a href="<?=site_url($getCategoryInformation->category_image)?>" target="_blank"><img width="250" src="<?=site_url($getCategoryInformation->category_image)?>" class="w-10 mb-1 img-responsive"></a>
                                    </div>
                                 </div>                        
                           </div>
                        </div>
                     </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Fotoğraf
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Slider_category/ImageUpload')?>" id="m-dropzone-one">
                           <div class="m-dropzone__msg dz-message needsclick">
                              <h3 class="m-dropzone__msg-title">
                                 Fotoğraf Yükle
                              </h3>
                              <span class="m-dropzone__msg-desc">
                              <i class="fa fa-picture-o"></i>
                              </span>
                           </div>
                        </div>
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
                           <button type="reset" onclick="window.location='<?=admin_url('Slider_category')?>'" class="btn btn-secondary">
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