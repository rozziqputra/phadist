          <button type="button" class="btn btn-primary mb-4 btn-icon-split btn-sm tblSubmenu" data-toggle="modal" data-target="#newsubmenu">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Sub Menu</span>
          </button>
          <!-- ahhir booton modals -->

          <!-- form validation -->
          <?php if(validation_errors()):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert"><?= validation_errors();?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
          <?php endif;?>


          <!-- /form validation -->
          <!-- flash data -->
          <?= $this->session->flashdata('message');?>
          <!-- flash data -->
					<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?=$title;?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive table-sm">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Menu</th>
                      <th>Sub Menu</th>
                      <th>Url</th>
                      <th>Icon</th>
                      <th>Active</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php $no=1;?>
										<?php foreach ($subMenu as $sm):?>
                    <tr>
                      <td><?=$no;?></td>
                      <td><?=$sm['menu']?></td>
                      <td><?=$sm['sub_menu']?></td>
                      <td><?=$sm['url']?></td>
                     
                       <td>
                          <span class="icon">
                            <i class="<?=$sm['icon']?>"></i>
                          </span>
                          <span class="text ml-3"><?=$sm['icon']?></span>
                      </td>
                     
                      <td><?=$sm['aktif']?></td>
                      <td>
            <a href="" class="btn btn-primary btn-icon-split btn-sm ubahSubmenu" data-toggle="modal" data-target="#newsubmenu" data-id="<?=$sm['id']?>">
													<span class="icon text-white-50">
               <i class="fas fa-arrow-right"></i>
             </span>
             <span class="text">Edit</span>
												</a>

            <a href="<?= base_url('menu/delete_sub_menu/'). $sm['id'];?>" class="btn btn-danger btn-icon-split btn-sm">
													<span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                          </span>
                          <span class="text">Hapus</span>
												</a>
											</td>
										</tr>
										<?php $no++;?>
										<?php endforeach ;?>
										
                  </tbody>
                </table>
              </div>
            </div>
          </div>


				</div>
				<!-- /.container-fluid -->
			</div>
      <!-- End of Main Content -->
      
      <!-- modals -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="newsubmenu" tabindex="-1" role="dialog" aria-labelledby="newsubmenuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newsubmenuLabel"><?=$title;?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu/sub_menu');?>" method="post">
            <input type="hidden" id="id" name="id">

          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="sub_menu" placeholder="Submenu Title.." name="sub_menu">
          </div>
          <div class="form-group">
            <select name="id_menu" id="id_menu" class="form-control">
              <option value="">--Pilih Menu--</option>
              <?php foreach ($menu as $m ):?>
              <option value="<?=$m['id'] ;?>"><?=$m['menu'] ;?></option>
              <?php endforeach ;?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="url" placeholder="Submenu url.." name="url">
          </div>
          <div class="form-group">
            <select class="custom-select" id="icon" name="icon">
              <option value="">--Pilih Icon--</option>
                <?php foreach ($icon as $i):?>
                  <option value="<?=$i['icon'];?>"><?=$i['icon'];?></option>
                <?php endforeach;?>
            </select>

          </div>
          <div class="form-group">
            <select class="custom-select" id="aktif" name="aktif">
              <option value="">--Aktifasi--</option>
                <?php foreach ($aktifasi as $a):?>
                  <option value="<?=$a;?>"><?php if($a ==1 ){echo'aktif';}else{echo'nonaktif';}?></option>
                <?php endforeach;?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-icon-split" data-dismiss="modal">
          <span class="icon text-white-50">
              <i class="fas fa-times"></i>
          </span>
          <span class="text">Close</span>
        </button>
        <button type="submit" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
              <i class="fas fa-save"></i>
          </span>
          <span class="text save">Save</span>
        </button>
        </form>
      </div>
    </div>
  </div>
</div>


