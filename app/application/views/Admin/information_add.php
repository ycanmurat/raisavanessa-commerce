<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Blog Ekle
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
               <a href="<?=admin_url('Information')?>" class="m-nav__link">
               <span class="m-nav__link-text">
               Bloglar
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
               Blog Başarıyla Eklendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Blog Eklenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <?if ($add==0) {?>
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                     <div class="form-group m-form__group">
                        <label><br>
                           <b><p style="color:red">En Fazla 5 Tane Blog Yazısı Eklenebilir. Eklemeye Çalıştığınız Sayfa 5'i Geçiyor.</p></b>
                        </label>
                     </div>
                  </div>
               </div>
            <?}else{?>
               <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Information/add')?>" method="POST">
                  <div class="m-portlet__body">
                     <div class="m-form__section m-form__section--first">
                        <div class="form-group m-form__group">
                           <label>
                           Blog Başlığı
                           </label>
                           <input type="text" class="form-control m-input" name="information_title" placeholder="Blog Başlığı" required="true">
                        </div>
                        <div class="form-group m-form__group">
                           <label>
                           Description (Seo İçin Sitede Görünmeyecek)
                           </label>
                           <input type="text" class="form-control m-input" name="description" placeholder="Description" required="true" maxlength="254">
                        </div>
                        <div class="form-group m-form__group">
                           <label>
                           Blog İçeriği 
                           </label>
                           <textarea class="ckeditor" rows="3" name="information_content" required="true"></textarea>
                        </div>
                        <div class="col-12 m--padding-left-30 m--padding-right-30">
                           <label>
                           Blog Fotoğrafı
                           </label>
                           <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Information/ImageUpload')?>" id="m-dropzone-one">
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
                              Ekle
                              </button>
                              <button type="reset" onclick="window.location='<?=admin_url('Information')?>'" class="btn btn-secondary">
                              İptal
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            <?}?>
         </div>
      </div>
   </div>
</div>
