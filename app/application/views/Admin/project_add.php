<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Proje Ekle
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
               <a href="<?=admin_url('Project')?>" class="m-nav__link">
               <span class="m-nav__link-text">
               Projeler
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
               Proje Başarıyla Eklendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Proje Eklenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" action="<?=admin_url('Project/setAdd')?>" id="form" method="POST">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                     <div class="form-group m-form__group">
                        <label>
                        Proje Adı
                        </label>
                        <input type="text" class="form-control m-input" name="name" placeholder="Proje Adı" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Alt Başlık
                        </label>
                        <textarea class="form-control m-input" placeholder="Alt Başlık" id="sub_title" rows="3" name="sub_title"></textarea>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Özellikler <span style="font-size:11px;">/ Proje listeleme sayfasında görünecek ok işaretli liste (Virgül ile ayırın)</span>
                        </label>
                        <textarea class="form-control m-input" placeholder="3+1 Daireler,Özel Güvenlik,Kapalı Otopark" id="main_check_list" rows="3" name="main_check_list"></textarea>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Proje Etiketi <span style="font-size:11px;">/ Proje listeleme sayfasında sağ üstte görünen yazı (Tükendi,Yeni proje vs)</span>
                        </label>
                        <input type="text" class="form-control m-input" name="main_hash" placeholder="Proje Etiketi" required="true">
                     </div>

                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Liste Fotoğrafı <span style="font-size:11px;">/ Projelerin listelendiği sayfada görünen proje Fotoğrafı</span>
                        </label>
                        <div class="col-md-12">
                           <input class="fallback m-dropzone dropzone m-dropzone--primary dz-clickable" style="width: 100%" name="main_image" type="file" />
                        </div>
                     </div>

                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Arkaplan Fotoğrafı <span style="font-size:11px;">/ Proje detay sayfası arkaplanı</span>
                        </label>
                        <div class="col-md-12">
                           <input class="fallback m-dropzone dropzone m-dropzone--primary dz-clickable" style="width: 100%" name="page_background" type="file" />
                        </div>
                     </div>
                     <hr>
                     
                     <div class="form-group m-form__group">
                        <label>
                        Açıklama 1 Başlık
                        </label>
                        <input type="text" class="form-control m-input" name="header1" placeholder="Başlık" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Açıklama 1 içerik
                        </label>
                        <textarea class="form-control m-input" placeholder="İçerik" id="content1" rows="3" name="content1"></textarea>
                     </div>

                     <hr>
                     <div class="form-group m-form__group">
                        <label>
                        Açıklama 2 Başlık
                        </label>
                        <input type="text" class="form-control m-input" name="header2" placeholder="Başlık" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Açıklama 2 içerik
                        </label>
                        <textarea class="form-control m-input" placeholder="İçerik" id="content2" rows="3" name="content2"></textarea>
                     </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Açıklama 2 Fotoğraf
                        </label>
                        <div class="col-md-12">
                           <input class="fallback m-dropzone dropzone m-dropzone--primary dz-clickable" style="width: 100%" name="image2" type="file" />
                        </div>
                     </div>

                     <hr>
                     <div class="form-group m-form__group">
                        <label>
                        Açıklama 3 Başlık
                        </label>
                        <input type="text" class="form-control m-input" name="header3" placeholder="Başlık" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Açıklama 3 içerik
                        </label>
                        <textarea class="form-control m-input" placeholder="İçerik" id="content3" rows="3" name="content3"></textarea>
                     </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Açıklama 3 Fotoğraf
                        </label>
                        <div class="col-md-12">
                           <input class="fallback m-dropzone dropzone m-dropzone--primary dz-clickable" style="width: 100%" name="image3" type="file" />
                        </div>
                     </div>

                     <hr>
                     <div class="form-group m-form__group">
                        <label>
                        Açıklama 4 Başlık
                        </label>
                        <input type="text" class="form-control m-input" name="header4" placeholder="Başlık" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Açıklama 4 içerik
                        </label>
                        <textarea class="form-control m-input" placeholder="İçerik" id="content4" rows="3" name="content4"></textarea>
                     </div>


                     <hr>
                     <div class="form-group m-form__group">
                        <label>
                        2. Alan Başlık
                        </label>
                        <input type="text" class="form-control m-input" name="header5" placeholder="Başlık" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        2. Alan içerik
                        </label>
                        <textarea class="form-control m-input" placeholder="content5" id="content5" rows="3" name="content5"></textarea>
                     </div>

                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        2. Alan Fotoğraf
                        </label>
                        <div class="col-md-12">
                           <input class="fallback m-dropzone dropzone m-dropzone--primary dz-clickable" style="width: 100%" name="image5" type="file" />
                        </div>
                     </div>
                     <hr>



                     <div class="form-group m-form__group">
                        <label>
                        Galeri Açıklama
                        </label>
                        <textarea class="form-control m-input" placeholder="content5" id="galery_content" rows="3" name="galery_content"></textarea>
                     </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Galeri Fotoğrafları (Ctrl ile Birden Fazla Fotoğraf Seçebilirsiniz)
                        </label>
                        <div class="col-md-12">
                           <input class="fallback m-dropzone dropzone m-dropzone--primary dz-clickable" style="width: 100%" name="galeri[]" type="file" multiple />
                        </div>
                     </div>
                     <hr>

                     <hr>
   
                     <div class="form-group m-form__group">
                        <label>
                        Sıra
                        </label>
                        <input type="number" class="form-control m-input" name="sort" placeholder="Sıra" required="true">
                     </div>
                  </div>
               </div>
               <div class="m-portlet__foot m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions">
                     <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 text-right">
                           <button type="button" class="btn btn-primary" onclick="kitle()">
                           Ekle
                           </button>
                           <button type="reset" onclick="window.location='<?=admin_url('Project')?>'" class="btn btn-secondary">
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

<script type="text/javascript">
   function kitle() {
      $('#form').submit();
      $('.btn').attr('disabled','disabled');
      $('.btn').addClass('disabled');
   }
</script>