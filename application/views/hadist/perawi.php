          <button type="button" class="btn btn-primary mb-4 btn-icon-split btn-sm tblperawi" data-toggle="modal" data-target="#perawi">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Perawi</span>
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
                      <th>Nama</th>
                      <th>Keterngan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php $no=1;?>
										<?php foreach ($perawi as $prw):?>
                    <tr>
                      <td><?=$no;?></td>
                      <td><?=$prw['nama']?></td>
                      <td><?=$prw['keterangan']?></td>
            <td>
            <a href="" class="btn btn-primary btn-icon-split btn-sm ubahPerawi" data-toggle="modal" data-target="#perawi" data-id="<?=$prw['id_perawi']?>">
													<span class="icon text-white-50">
               <i class="fas fa-arrow-right"></i>
             </span>
             <span class="text">Edit</span>
												</a>

            <a href="<?= base_url('hadist/hapus_perawi/'). $prw['id_perawi'];?>" class="btn btn-danger btn-icon-split btn-sm">
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
<div class="modal fade" id="perawi" tabindex="-1" role="dialog" aria-labelledby="perawiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="perawiLabel"><?=$title;?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('hadist/data_perawi');?>" method="post">
            <input type="hidden" id="id_perawi" name="id_perawi">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="nama_perawi" placeholder="Nama Perawi" name="nama">
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Keterngan</label>
            <textarea class="form-control" id="keterangan" rows="3" name="keterangan" id="keterangan"></textarea>
          </textarea>
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


