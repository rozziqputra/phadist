
          <button type="button" class="btn btn-primary mb-4 btn-icon-split tblTambah btn-sm" data-toggle="modal" data-target="#exampleModal">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Menu</span>
          </button>
          <!-- ahhir booton modals -->

          <!-- form validation -->
          <?= form_error('menu','<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>')?>
          <!-- /form validation -->
          <!-- flash data -->
          <?= $this->session->flashdata('message');?>
          <!-- flash data -->
					<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?=$title;?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Menu</th>
                      <th>Icon</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php $no=1;?>
										<?php foreach ($menu as $m):?>
                    <tr>
                      <td><?=$no;?></td>
                      <td><?=$m['menu']?></td>
                      <td>
                          <span class="icon">
                            <i class="<?=$m['icon']?>"></i>
                          </span>
                          <span class="text ml-3"><?=$m['icon']?></span>
                      </td>
                      <td>
												<a href="#" class="btn btn-primary btn-icon-split btn-sm tampilmodalubah" data-toggle="modal" data-target="#exampleModal" data-id="<?=$m['id']?>">
													<span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                          </span>
                          <span class="text">Edit</span>
												</a>
												<a href="<?= base_url('menu/delete_menu/'). $m['id'];?>" class="btn btn-danger btn-icon-split btn-sm">
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add <?=$title;?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu');?>" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="menu"  name="menu" placeholder="menu">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Icon</label>
            <select class="custom-select" id="icon" name="icon">
                <?php foreach ($icon as $i):?>
                  <option value="<?=$i['icon'];?>"><?=$i['icon'];?></option>
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


      <!-- ahir modals -->
						