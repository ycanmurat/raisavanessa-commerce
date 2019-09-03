<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            "<?=$content->category_name?>" İçeriğini Düzenliyorsunuz 
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
               <a href="<?=admin_url('Slider_category/contents')?>" class="m-nav__link">
               <span class="m-nav__link-text">
               İçerikler
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
               İçerik Başarıyla Güncellendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               İçerik Güncellenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Slider_category/editContent/'.$content->id)?>" method="POST">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                     <div class="form-group m-form__group">
                        <label>
                        İçerik Başlığı
                        </label>
                        <input type="text" class="form-control m-input" name="category_name" value="<?=$content->category_name?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label for="exampleSelect1">
                           Şuandaki İçerik Başlık İkonu
                        </label>
                        <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                           <div class="row">
                                 <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images" id="img_430">
                                    <div>
                                       <a href="<?=site_url($content->content_image)?>" target="_blank"><img src="<?=site_url($content->content_image)?>" class="w-100 mb-2 img-responsive"></a>
                                    </div>
                                 </div>                        
                           </div>
                        </div>
                     </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        İçerik Başlık İkonu
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Slider_category/thirdImage')?>" id="m-dropzone-one">
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
                     <div class="form-group m-form__group">
                        <label>
                        Tahmini Fiyatlandırma
                        </label>
                        <input type="text" class="form-control m-input" name="price" value="<?=$content->price?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Bakım Yeri
                        </label>
                        <input type="text" class="form-control m-input" name="location" value="<?=$content->location?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Zamanlama
                        </label>
                        <input type="text" class="form-control m-input" name="time" value="<?=$content->time?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Sezon
                        </label>
                        <input type="text" class="form-control m-input" name="season" value="<?=$content->season?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Uzmanlar
                        </label>
                        <input type="text" class="form-control m-input" name="expert" value="<?=$content->expert?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label for="exampleSelect1">
                           Şuandaki İçerik Fotoğrafı
                        </label>
                        <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                           <div class="row">
                                 <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images" id="img_430">
                                    <div>
                                       <a href="<?=site_url($content->title_image)?>" target="_blank"><img src="<?=site_url($content->title_image)?>" class="w-100 mb-2 img-responsive"></a>
                                    </div>
                                 </div>                        
                           </div>
                        </div>
                     </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        İçerik Fotoğrafı
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" name="image[]" multiple action="<?=admin_url('Slider_category/ImageUpload')?>" id="m-dropzone-one">
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
                     <div class="form-group m-form__group">
                        <label>
                        İçerik
                        </label>
                        <textarea name="content" class="ckeditor" rows="10"><?=$content->content?></textarea>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Kategori
                        </label>
                        <select class="form-control m-input" id="exampleSelect1" name="cat_id">
                           <?if($categories==0){?><option>Aktif Yada Ekli Bir Kategori Yok</option><?}
                              foreach ($categories as $key => $cat){?>
                                 <option value="<?=$cat->id?>" <?=($cat->id==$content->cat_id)?'selected':''?>>
                                    <?=$cat->category_name?>
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
                           Güncelle
                           </button>
                           <button type="reset" onclick="window.location='<?=admin_url('Slider_category/contents')?>'" class="btn btn-secondary">
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