<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Statik Sayfa Oluştur
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="<?=site_url()?>Admin/" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="<?=admin_url('Statics')?>" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Statik Sayfalar
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
            <div class="m-portlet">
                <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="<?=site_url('Admin/Kur/update')?>">
                    <div class="m-portlet__body">
                        <?php 
                            if ($this->session->flashdata('okey') == 1) { ?>
                                <div class="alert alert-success alert-dismissible fade show" style="margin-left: 20px;margin-right: 20px" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                    <strong>
                                        Tebrikler!
                                    </strong>
                                    Kur Fiyatı Başarıyla Kaydedildi.
                                </div>
                        <?php } ?>
                        <?php 
                            if ($this->session->flashdata('hata') == 1) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" style="margin-left: 20px;margin-right: 20px" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                    <strong>
                                        Üzügmüm!
                                    </strong>
                                    Kur Fiyatı Kaydı Sırasında Bir Hata Oluştu.
                                </div>
                        <?php } ?>
                       <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                          <table class="table m-table m-table--head-bg-primary table-responsive">
                             <thead>
                                <tr>
                                   <th>#</th>
                                   <th>Kod</th>
                                   <th>İsim</th>
                                   <th>İsim Türkçe</th>
                                   <th>Oran</th>
                                   <th>İkon</th>
                                   <th>Durum</th>
                                   <th>Son Güncelleme</th>
                                </tr>
                             </thead>
                             <tbody>
                                <?php foreach ($kur as $key => $val) { ?>
                                    <?php if($val->status==0){$st=1;}else{$st=0;} ?>
                                <tr>
                                   <td><?=$val->id?></td>
                                   <td><?=$val->code?></td>
                                   <td><?=$val->name?></td>
                                   <td><?=$val->name_tr?></td>
                                   <input type="hidden" name="id[<?=$val->id?>]" value="<?=$val->id?>">
                                   <td><input type="number" step="0.01" class="form-control m-input" name="rate[<?=$val->id?>]" value="<?=$val->rate?>"></td>
                                   <td><input type="text" class="form-control m-input" name="icon[<?=$val->id?>]" value="<?=$val->icon?>"></td>
                                   <td>
                                      <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                      <label>
                                      <input type="checkbox" <?=$val->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Kur/editStatus/'.$val->id.'/'.$st)?>'">
                                      <span></span>
                                      </label>
                                      </span>
                                  </td>
                                   <td><?=$val->update_time?></td>
                                </tr>
                                <?php } ?>
                             </tbody>
                          </table>
                       </div>

                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-1">
                                    <a href="<?=site_url('Admin/Kur/otoRefresh')?>" type="submit" class="btn btn-success pull-right">
                                        Canlı Güncelleme
                                    </a></div>
                                <div class="col-lg-11">
                                    <button type="submit" class="btn btn-primary pull-right">
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