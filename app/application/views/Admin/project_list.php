<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Anasayfa Proje Düzenleme
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
         <?if($this->session->flashdata('onay')==1){?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarılı
            </strong>
               Projeler Başarıyla Güncellendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Projeler Güncellenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Project')?>" method="POST" enctype="multipart/form-data">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">

                     <div class="form-group m-form__group">
                        <label>
                        Büyük Fotoğraf Link
                        </label>
                        <input type="text" class="form-control m-input" value="<?=$proje->big_picture_link?>" name="big_picture_link" placeholder="Büyük Fotoğraf" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label for="exampleSelect1">
                           Güncel Büyük Fotoğraf
                        </label>
                           <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                               <div class="row">
                                   <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images" id="img_1">
                                    <div>
                                       <center>
                                          <a href="<?=site_url($proje->big_picture)?>" target="_blank">
                                             <img src="<?=site_url($proje->big_picture)?>" class="w-100 mb-2 img-responsive" style="width:50%;">
                                          </a>
                                       </center>
                                    </div>
                                   </div>
                               </div>
                           </div>
                     </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Büyük Fotoğrafı Güncelleyin
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Project/imageUpload/1')?>" id="m-dropzone-one">
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
                        Yatay Fotoğraf Link
                        </label>
                        <input type="text" class="form-control m-input" value="<?=$proje->horizontal_picture_link?>" name="horizontal_picture_link" placeholder="Yatay Fotoğraf Link" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label for="exampleSelect1">
                           Güncel Yatay Fotoğraf
                        </label>
                           <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                               <div class="row">
                                   <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images" id="img_1">
                                    <div>
                                       <center>
                                          <a href="<?=site_url($proje->horizontal_picture)?>" target="_blank">
                                             <img src="<?=site_url($proje->horizontal_picture)?>" class="w-100 mb-2 img-responsive" style="width:50%;">
                                          </a>
                                       </center>
                                    </div>
                                   </div>
                               </div>
                           </div>
                     </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Yatay Fotoğrafı Güncelleyin
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Project/imageUpload/2')?>" id="m-dropzone-one">
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
                        Küçük Fotoğraf Bir Link
                        </label>
                        <input type="text" class="form-control m-input" value="<?=$proje->little_picture_one_link?>" name="little_picture_one_link" placeholder="Küçük Fotoğraf Bir Link" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label for="exampleSelect1">
                           Güncel Küçük Fotoğraf Bir
                        </label>
                           <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                               <div class="row">
                                   <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images" id="img_1">
                                    <div>
                                       <center>
                                          <a href="<?=site_url($proje->little_picture_one)?>" target="_blank">
                                             <img src="<?=site_url($proje->little_picture_one)?>" class="w-100 mb-2 img-responsive" style="width:50%;">
                                          </a>
                                       </center>
                                    </div>
                                   </div>
                               </div>
                           </div>
                     </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Küçük Fotoğraf Bir'i Güncelleyin
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Project/imageUpload/3')?>" id="m-dropzone-one">
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
                        Küçük Fotoğraf İki Link
                        </label>
                        <input type="text" class="form-control m-input" value="<?=$proje->little_picture_two_link?>" name="little_picture_two_link" placeholder="Küçük Fotoğraf İki Link" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label for="exampleSelect1">
                           Güncel Küçük Fotoğraf İki
                        </label>
                           <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                               <div class="row">
                                   <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images" id="img_1">
                                    <div>
                                       <center>
                                          <a href="<?=site_url($proje->little_picture_two)?>" target="_blank">
                                             <img src="<?=site_url($proje->little_picture_two)?>" class="w-100 mb-2 img-responsive" style="width:50%;">
                                          </a>
                                       </center>
                                    </div>
                                   </div>
                               </div>
                           </div>
                     </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Küçük Fotoğraf İki'i Güncelleyin
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Project/imageUpload/4')?>" id="m-dropzone-one">
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