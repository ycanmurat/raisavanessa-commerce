<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
            "Admin Düzenleme Sayfası"
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
                    <a href="<?=admin_url('Home/adminEdit')?>" class="m-nav__link">
                        <span class="m-nav__link-text">
                            İçerikler
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div style="margin-right:10px;">
                <div>
                    <a type="button" class="btn m-btn--air btn-warning" data-toggle="modal" data-target="#m_modal_4">Yeni Admin Ekle</a>
                    <!--begin::Modal-->
                    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                    Yeni Admin Ekle
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        &times;
                                    </span>
                                    </button>
                                </div>
                                <form action="<?=current_url()?>" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="username" class="form-control-label">
                                                Admin kullanıcı Adı
                                            </label>
                                            <input type="text" class="form-control" name="username" required>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="email" class="form-control-label">
                                                Admin Email
                                            </label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="password" class="form-control-label">
                                                Şifre
                                            </label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">
                                        Ekle
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end::Modal-->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <?php if($this->session->flashdata('onay')==1){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>
                    Başarılı
                    </strong>
                    Ürün Başarıyla Güncellendi
                </div>
            <?php }elseif($this->session->flashdata('hata')==1){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>
                    Başarısız
                    </strong>
                    Ürün Güncellenemiyor Lütfen Geliştiricinizden Yardım İsteyin
                </div>
            <?php } ?>
         <div class="m-portlet">
            <div class="m-portlet__body">
               <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                  <table class="table m-table m-table--head-bg-primary table-responsive">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Kullanıcı Adı</th>
                           <th>email</th>
                           <th>Şifre</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($admins as $key => $val) { ?> 
                                <tr>
                                   <td><?=$val->Id?></td>
                                   <td><?=$val->username?></td>
                                   <td><?=$val->email?></td>
                                   <td><form action="<?=site_url('Admin/Home/adminEditPass/'.$val->Id)?>" method="POST"><input class="form-control" type="text" name="password" placeholder="Şifre"></form></td>
                                   <td><a href="<?=site_url('Admin/Home/adminDelete/'.$val->Id)?>" class="btn btn-danger">Sil</a></td>
                                </tr>
                            </form>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
        </div>
    </div>
</div>