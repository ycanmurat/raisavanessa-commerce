<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Kategorinize İçerik Ekleyin
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
               <a href="<?=admin_url('Slider_category/contentAdd')?>" class="m-nav__link">
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
               İçerik Başarıyla Eklendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               İçerik Eklenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Slider_category/contentAdd')?>" method="POST">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                     <div class="form-group m-form__group">
                        <label>
                        İçerik Başlığı
                        </label>
                        <input type="text" class="form-control m-input" name="category_name" placeholder="İçerik Başlığı" required="true">
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
                        <input type="text" class="form-control m-input" name="price" placeholder="Tahmini Fiyatlandırma" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Bakım Yeri
                        </label>
                        <input type="text" class="form-control m-input" name="location" placeholder="Bakım Yeri" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Zamanlama
                        </label>
                        <input type="text" class="form-control m-input" name="time" placeholder="Zamanlama" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Sezon
                        </label>
                        <input type="text" class="form-control m-input" name="season" placeholder="Sezon" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Uzmanlar
                        </label>
                        <input type="text" class="form-control m-input" name="expert" placeholder="Uzmanlar" required="true">
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
                        <textarea name="content" class="ckeditor" rows="10">İçerik</textarea>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Kategori
                        </label>
                        <select class="form-control m-input" id="exampleSelect1" name="cat_id">
                           <?if($categories==0){?><option>Aktif Yada Ekli Bir Kategori Yok</option><?}
                              foreach ($categories as $key => $cat){?>
                                 <option value="<?=$cat->id?>">
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
                           Ekle
                           </button>
                           <button type="reset" onclick="window.location='<?=admin_url('News')?>'" class="btn btn-secondary">
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