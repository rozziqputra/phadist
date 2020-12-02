  <?= $this->session->flashdata('message');?>
	
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong><i class="fas fa-lightbulb"></i> Ketentuan</strong>
      <p>Klik centang Untuk menambah dan menghapus hak akses <strong><?= $akses['pengguna_hakakses'];?></strong> </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>     
          <!-- flash data -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?=$title;?> : <?= $akses['pengguna_hakakses'];?></h6>
  </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable"  cellspacing="0">
            <tr>
              <th>No</th>
              <th>Menu</th>
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
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" <?= check_access($akses['id'], $m['id']);?> data-akses="<?= $akses['id'];?>" data-menu="<?= $m['id'];?>">
                 <!-- //fungsi yang ada di loginci_helper.php -->
                </div>
              </td>
            </div>
            <?php $no++;?>
            <?php endforeach ;?>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>


          <!-- flash data -->
					


				</div>
				<!-- /.container-fluid -->
			</div>
    
