<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            "<?=$pInfo->product_name?>" İçeriği Düzenliyorsunuz
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
               Ürün Başarıyla Güncellendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Ürün Güncellenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}if (validation_errors()) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <?=validation_errors()?>
            </div>
         <? } ?>

         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Products/editProduct/'.$id)?>" method="POST"  enctype="multipart/form-data">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                     <div class="form-group m-form__group">
                        <label>
                        Ürün Adı (English)
                        </label>
                        <input type="text" class="form-control m-input" value="<?=$pInfo->product_name?>" name="product_name" placeholder="Ürün Adı" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Ürün Adı (Türkçe)
                        </label>
                        <input type="text" class="form-control m-input" value="<?=$pInfo->tr_product_name?>" name="tr_product_name" placeholder="Ürün Adı" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Ürün Kodu
                        </label>
                        <input type="text" class="form-control m-input" value="<?=($pInfo->kod)?>" name="kod" placeholder="Ürün Kodu">
                     </div>
                     <!-- <div class="form-group m-form__group">
                          <label>
                              Eski Fiyatı ₺
                          </label>
                          <input type="number" class="form-control m-input" value="<?=($pInfo->old_price_tr)?>" step="0.01" name="old_price_tr" placeholder="Satış Fiyatı">
                      </div>
                     <div class="form-group m-form__group">
                          <label>
                              Satış Fiyatı ₺
                          </label>
                          <input type="number" class="form-control m-input" value="<?=($pInfo->price_tr)?>" step="0.01" name="price_tr" placeholder="Satış Fiyatı" required="true">
                      </div> -->
                     
                      <div class="form-group m-form__group">
                          <label>
                              Satış Fiyatı €
                          </label>
                          <input type="number" class="form-control m-input" value="<?=($pInfo->price)?>" step="0.01" name="price" placeholder="Satış Fiyatı" required="true">
                      </div>
                       <div class="form-group m-form__group">
                          <label>
                              İndirimli Fiyatı €
                          </label>
                          <input type="number" class="form-control m-input" value="<?=($pInfo->old_price)?>" step="0.01" name="old_price" placeholder="İndirimsiz Fiyatı">
                      </div>
                      <div class="form-group m-form__group">
                        <label>
                        Sıra Numarası
                        </label>
                        <input type="number" class="form-control m-input" value="<?=($pInfo->sort)?>" name="sort" placeholder="Sıra Numarası" required="true">
                     </div>
                      <div class="form-group m-form__group">
                        <label>
                        Shop Sıra Numarası
                        </label>
                        <input type="number" class="form-control m-input" value="<?=($pInfo->sort_shop)?>" name="sort_shop" placeholder="Shop Satış Fiyatı" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Açıklamalar (Engilsh)
                        </label>
                        <textarea class="form-control m-input" id="editor" rows="3" name="description"><?=$pInfo->description?></textarea>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Açıklamalar (Türkçe)
                        </label>
                        <textarea class="form-control m-input" id="editor1" rows="3" name="tr_description"><?=$pInfo->tr_description?></textarea>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Kategori
                        </label>
                        <select class="form-control m-input" id="exampleSelect1" name="menu_id">
                           <?php foreach ($menus as $key => $val){ ?>
                              <option <?=(($pInfo->menu_id) == $val->id?'selected':'')?> value="<?=$val->id?>">
                                 <?=$val->name?>
                              </option>
                           <?php } ?>
                        </select>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Wear to with
                        </label>
                        <select class="form-control m-select2" id="m_select2_3" name="similar[]" multiple tabindex="-1" aria-hidden="true">
                           <?php foreach ($products as $key => $val) { ?>
                              <option value="<?=$val->id?>" <?=(array_search($val->id, $pInfo->similar)?'selected':'')?>><?=$val->kod?></option>
                           <?php } ?>
                        </select>
                     </div>
                      <div class="form-group m-form__group">
                          <label>
                              Ürün Ön siparişte mi ?
                          </label>
                          <span class="form-control m-switch m-switch--icon m-switch--success">
                              <label>
                                  <input type="checkbox" name="preorder" <?=$pInfo->preorder == 1?'checked':''?>>
                                  <span></span>
                              </label>
                          </span>
                      </div>
                     <div class="form-group m-form__group">
                        <label for="exampleSelect1">
                           Güncel Kapak Fotoğrafı
                        </label>
                           <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                               <div class="row">
                                   <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images" id="img_1">
                                    <div>
                                       <center>
                                          <a href="<?=site_url($pInfo->product_image)?>" target="_blank">
                                             <img src="<?=site_url($pInfo->product_image)?>" class="w-100 mb-2 img-responsive" style="width:50%;">
                                          </a>
                                       </center>
                                    </div>
                                   </div>
                                
                               </div>
                           </div>
                      </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Ürün Fotoğrafı
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Products/ImageUpload')?>" id="m-dropzone-one">
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
                        <label for="exampleSelect1">
                           Ürün Resimleri
                        </label>
                           <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                               <div class="row">
                                 <? foreach ($images as $key => $val) { ?>
                                    <img src="<?=site_url($val->name)?>" width="200" height="150" style="margin-left: 5px"><br> 
                                    <a href="<?=admin_url('Products/deleteimages/'.$val->Id.'/'.$id)?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i>sil</a>        
                                 <? } ?>
                               </div>
                           </div>
                      </div>
                      <div class="form-group m-form__group">
                        <label>
                        Ürün Fotoğrafları (ctrl ile birden fazla fotoğraf seçilebilir)
                        </label>
                        <br>
                        <input  class="form-control m-input" type="file" multiple name="files[]">
                     </div><!--
                    <div class="form-group m-form__group">
                        <label>
                            Yazı Seçenekler (İngilizce) (, ile ayırın)
                        </label>
                        <textarea class="form-control m-input" rows="3" name="variants"><?=$pInfo->variants?></textarea>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            Yazı Seçenekler (Türkçe) (, ile ayırın)
                        </label>
                        <textarea class="form-control m-input" rows="3" name="tr_variants"><?=$pInfo->tr_variants?></textarea>
                    </div>-->
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
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>