<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            İletişim Formundan Gelenler
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
               <a href="<?=admin_url('')?>" class="m-nav__link">
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
         <div class="m-portlet">
            <div class="m-portlet__body">
               <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                  <table class="table m-table m-table--head-bg-primary table-responsive">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>İsim Soyisim</th>
                           <th>E-Posta</th>
                           <th>Telefon</th>
                           <th>İçerik</th>
                           <th style="text-align:right;">İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?if($contact==0){?><tr><td><font color="red">Şuanda İletişimden Gelen Bir Talep Yok</font></td></tr><?}else{
                        foreach ($contact as $key => $info){?>
                        <tr>
                           <td><?=$info->Id?></td>
                           <td><?=$info->name.' '.$info->surname?></td>
                           <td><?=$info->email?></td>
                           <td><?=$info->number?></td>
                           <td>
                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#m_modal_<?=$info->Id?>">
                                 Detay
                              </button>
                           </td>
                           <div class="modal fade" id="m_modal_<?=$info->Id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">
                                          <?=$info->name?>
                                       </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">
                                             &times;
                                          </span>
                                       </button>
                                    </div>
                                   <div class="modal-body">
                                      <form>
                                         <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">
                                               Ad Soyad :
                                            </label>
                                            <input type="text" value="<?=$info->name.' '.$info->surname?>" class="form-control" disabled class="disabled">
                                         </div>
                                         <div class="form-group">
                                            <label for="message-text" class="form-control-label">
                                               E-Mail :
                                            </label>
                                            <input type="text" value="<?=$info->email?>" class="form-control" disabled class="disabled">
                                         </div>
                                         <div class="form-group">
                                            <label for="message-text" class="form-control-label">
                                               Telefon No :
                                            </label>
                                            <input type="text" value="<?=$info->number?>" class="form-control" disabled class="disabled">
                                         </div>
                                         <div class="form-group">
                                            <label for="message-text" class="form-control-label">
                                               Address
                                            </label>
                                            <input type="text" value="<?=$info->address?>" class="form-control" disabled class="disabled">
                                         </div>
                                         <div class="form-group">
                                            <label for="message-text" class="form-control-label">
                                               Message
                                            </label>
                                            <input type="text" value="<?=$info->message?>" class="form-control" disabled class="disabled">
                                         </div>
                                      </form>
                                   </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                          Geri Çık
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <td><button onclick="deleteConfirm('<?=admin_url('Contact/delete/'.$info->Id)?>')" class="btn btn-danger">Sil</button></td>
                        </tr>
                        <?}}?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>