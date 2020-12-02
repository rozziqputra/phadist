<div class="row">
 <div class="col-5">
   <div class="card shadow mb-4 p-4 px-5">
    <form class="form-user" method="post">
      <div class="form-group row">
        <label for="kode" class="col-sm-4 col-form-label text-right">Kode Barang :</label>
        <div class="col-sm-8">
          <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?=$user['id']?>">
          
          <input type="hidden" class="form-control" id="date" name="date" value="<?=date("Y-m-d h:i:sa")?>">

          <input type="text" class="form-control" id="id_barang" name="id_barang">
        </div>
      </div>
      <div class="form-group row">
        <label for="namabarang" class="col-sm-4 col-form-label text-right">Nama :</label>
        <div class="col-sm-8">
          <input type="text" readonly class="form-control" id="nama_barang" name="nama_barang" >
        </div>
      </div>
      <div class="form-group row">
        <label for="inputharga" class="col-sm-4 col-form-label text-right" name="harga">Harga :</label>
        <div class="col-sm-8">
          <input type="text" readonly class="form-control" id="inputtext" name="harga">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputharga" class="col-sm-4 col-form-label text-right">Jumlah Barang :</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="jumlah" name="jumlah">
        </div>
      </div>
      <div class="form-group row">
        <button type="submit" class="tambah_cart btn btn-primary btn-user btn-block">Tambah</button>
      </div>
      <div class="form-group row">
        <button type="button" class="btn btn-success btn-user btn-block"     
        >Print</button>
      </div>
    </form>
   </div>
 </div>
 <div class="col-7">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?=$title;?></h6>
            </div>
            <div class="card-body">
              <div class="table table-sm">
                <table class="table table-striped table-sm" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                      <th>Barang</th>
                      <th>harga</th>
                      <th>jumlah</th>
                      <th>Sub Total</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                    <form action="" method="post" class=>
                    <tbody id="detail_barang">
                      
                    </tbody>
                      </form>
                  
                </table>
                <div class="tes">
                  <!-- <input type="text" name="uang" id="uang">
                  <input type="text" value="<?=number_format($this->cart->total())?>" name="total" id="total">
                  <button type="submit" class="btn btnbayar btn-primary btn-block">Bayar</button> -->
                  <form action="<?= base_url('konten/bayar');?>" method="post">
                    <div class="p-4">
                      <div class="form-group row">
                        <label for="bayar" class="col-sm-2 col-form-label">Bayar</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="bayar" name="bayar">
                          <input type="hidden" class="form-control" id="total" name="total" value="<?=$this->cart->total()?>">
                        </div>
                        <div class="col-sm-3">
                          <button type="submit" class="btn btn-primary btn-block btn-bayar">Bayar</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
    </div>
</div>
