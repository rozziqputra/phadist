    <!-- booton modals -->
    <button type="button" class="btn btn-primary mb-4 btn-icon-split btn-sm" data-toggle="modal" data-target="#exampleModal">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Pengguna</span>
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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;?>
              <?php foreach ($akses as $r):?>
              <tr>
                <td><?=$no;?></td>
                <td><?=$r['pengguna_hakakses']?></td>
                <td>
                  <a href="<?= base_url('admin/hak_akses/') . $r['id']?>" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Hak Akses</span>
                  </a>
                  <a href="<?= base_url('admin/hapus_akses/') . $r['id']?>" class="btn btn-danger btn-icon-split btn-sm">
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
      <form action="<?= base_url('admin/tambah_akses/');?>" method="post">
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="menu" placeholder="pengguna" name="pengguna_hakakses">
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
        <span class="text">Save</span>
      </button>
      </form>
    </div>
  </div>
</div>
</div>


    <!-- ahir modals -->
          