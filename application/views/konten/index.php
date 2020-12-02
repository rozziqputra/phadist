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
              <div class="table-responsive table-sm">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Kondisi</th>
                      <th>keterangan</th>
                      <th>Stok</th>
                      <th>gambar</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php $no=1;?>
										<?php foreach ($barang as $m):?>
                    <tr>
                      <td><?=$no;?></td>
                      <td><?=$m['kd_barang']?><?=$m['id_barang']?></td>
                      <td><?=$m['nama_barang']?></td>
                      <td><?=$m['harga']?></td>
                      <td><?=$m['kondisi']?></td>
                      <td><?=$m['keterangan']?></td>
                      <td><?=$m['stok']?></td>
                      <td><?=$m['id_gambar']?></td>
                      
                      <td>
                        <!-- <a href="#" class="btn btn-success btn-icon-split btn-sm tampilmodalubah" data-toggle="modal" data-target="#exampleModal" data-id="<?=$m['id_barang']?>">
                            <span class="icon text-white-50">
                              <i class="fas fa-arrow-right"></i>
                            </span>
                          <span class="text">Transaksi</span>
												</a> -->
												<a href="#" class="btn btn-primary btn-icon-split btn-sm tampilmodalubah" data-toggle="modal" data-target="#exampleModal" data-id="<?=$m['id_barang']?>">
													<span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                          </span>
                          <span class="text">Edit</span>
												</a>
												<a href="<?= base_url('menu/delete_menu/'). $m['id_barang'];?>" class="btn btn-danger btn-icon-split btn-sm">
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
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add <?=$title;?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu');?>" method="post">
          <input type="hidden" name="id_barang" id="id_barang">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Kode Barang</label>
                <select class="custom-select" id="icon" name="icon">
                    <?php foreach ($icon as $i):?>
                      <option value="<?=$i['icon'];?>"><?=$i['icon'];?></option>
                    <?php endforeach;?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control form-control-user" id="nama"  name="nama">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Harga</label>
                <input type="text" class="form-control form-control-user" id="harga"  name="harga" placeholder="harga">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Kondisi</label>
                <select class="custom-select" id="icon" name="icon">
                    <?php foreach ($icon as $i):?>
                      <option value="<?=$i['icon'];?>"><?=$i['icon'];?></option>
                    <?php endforeach;?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Stok</label>
                <select class="custom-select" id="stok" name="stok">
                    <?php foreach ($icon as $i):?>
                      <option value="<?=$i['icon'];?>"><?=$i['icon'];?></option>
                    <?php endforeach;?>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="keterangan1">Keterangan</label>
                <textarea class="form-control" id="keterangan" rows="3"></textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="fileUpload btn btn-success">
                <span>Upload</span>
                <input class="upload" type="file" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="fileUpload btn btn-success">
                <span>Upload</span>
                <input class="upload" type="file" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="fileUpload btn btn-success">
                <span>Upload</span>
                <input class="upload" type="file" />
              </div>
            </div>
            
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
						