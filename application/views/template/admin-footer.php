  </main>
		
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Pustaka Hadist <?= date('Y')?></span>
					</div>
				</div>
			</footer>

		</div>

	</div>

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tab index="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="<?=base_url('auth/logout')?>">Logout</a>
				</div>
			</div>
		</div>
	</div>


  <script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/');?>js/jquery.js"></script>
  <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets/');?>js/script.js"></script>
  <script src="<?= base_url('assets/');?>vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/');?>vendor/datatables/dataTables.bootstrap4.js"></script>

	<script src="<?= base_url('assets/');?>js/demo/datatables-demo.js"></script>
  <!-- Page level plugins -->
  <!-- <script src="<?= base_url('assets/');?>vendor/chart/Chart.min.js"></script>
  <script src="<?= base_url('assets/');?>vendor/chart/chart.js"></script> -->
  <!-- Page level custom scripts -->
  <!-- <script src="<?= base_url('assets/');?>js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('assets/');?>js/demo/chart-pie-demo.js"></script> -->
  <!-- <script src="<?= base_url('assets/');?>smart/script.js"></script> -->
		
		<script>
		// SCRIP HAK AKSES MENU
					// j queri carikan element yang namanya form-chect-input
					//pada saat di clik jalankan fungsi berikut ini

		$('.form-check-input').on('click', function () {
			const menuId = $(this).data('menu');
			const aksesId = $(this).data('akses');
			// jalankan jquery
			$.ajax({
				url: "<?= base_url('admin/change_akses/');?>",
				type: 'post',
				data: {
					menuId: menuId,
					aksesId: aksesId
				},
				success: function () {
					document.location.href = "<?=site_url('admin/hak_akses/')?>" + aksesId;
				}
			});
		});

		// SCRIPT CONTROLER UBAH MENU ------
    $(function(){
        $('.tblTambah').on('click',function () {
          $('#exampleModalLabel').html('Tambah Menu');
          $('.save').html('Tambah');
          $('#menu').val('');
          $('#icon').val('');
          $('#id').val('');

			});
        $('.tampilmodalubah').on('click',function () {
          $('#exampleModalLabel').html('Ubah Menu');
          $('.save').html('Ubah');

          $('.modal-body form').attr('action','<?=site_url('menu/ubah_menu')?>');
          const id = $(this).data('id');
          
            $.ajax({
                url:'<?=site_url('menu/getubah_menu')?>',
                data: {id : id},
                method: 'post',
                dataType:'json',
                success: function(data){
                  console.log(data);
                  $('#menu').val(data.menu);
                  $('#icon').val(data.icon);
                  $('#id').val(data.id);
                  // selanjutnya insert ke data base
                  
                }
            }); 
          });
    });

  // SCRIP UBAH SUB MENU
    $(function(){
        $('.tblSubmenu').on('click',function () {
          $('#newsubmenuLabel').html('Tambah Sub Menu');
          $('.save').html('Tambah');
        
          $('#id_menu').val('');
          $('#sub_menu').val('');
          $('#url').val('');
          $('#icon').val('');

			});
        $('.ubahSubmenu').on('click',function () {
          $('#newsubmenuLabel').html('Ubah Sub Menu');
          $('.save').html('Ubah');
          $('#id_menu').val('');
          $('#sub_menu').val('');
          $('#url').val('');
          $('#icon').val('');
          $('#aktif').val('');
        
          $('.modal-body form').attr('action','<?=site_url('menu/ubah_sub_menu')?>');
          
          const id = $(this).data('id');
                
            $.ajax({
                url:'<?=site_url('menu/getubah_sub_menu')?>',
                data: {id : id},
                method: 'post',
                dataType:'json',
                success: function(data){
                  console.log(data);
                  $('#id').val(data.id);
                  $('#id_menu').val(data.id_menu);
                  $('#sub_menu').val(data.sub_menu);
                  $('#url').val(data.url);
                  $('#icon').val(data.icon);
                  $('#aktif').val(data.aktif);
                  // selanjutnya insert ke data base
                  
                }
            }); 
          });
    });

    // SCRIP UBAH PERAWI
    $(function(){
        $('.tblperawi').on('click',function () {
          $('#perawiLabel').html('Tambah Data Perawi');
          $('.save').html('Tambah');
        
          $('#id_perawi').val('');
          $('#nama_perawi').val('');
          $('#keterangan').val('');
			});
        $('.ubahPerawi').on('click',function () {
          $('#perawiLabel').html('Ubah Data Perawi');
          $('.save').html('Ubah');
          $('#id_perawi').val('');
          $('#nama_perawi').val('');
          $('#keterangan').val('');
        
          $('.modal-body form').attr('action','<?=site_url('hadist/ubah_perawi')?>');
          
          const id_perawi = $(this).data('id');
                  console.log(id_perawi);
                
            $.ajax({
                url:'<?=site_url('hadist/get_ubah_perawi')?>',
                data: {id_perawi : id_perawi},
                method: 'post',
                dataType:'json',
                success: function(data){
                  console.log(data);
                  $('#id_perawi').val(data.id_perawi);
                  $('#nama_perawi').val(data.nama);
                  $('#keterangan').val(data.keterangan);
                  // $('#id').val(data.id);
                  // $('#id_menu').val(data.id_menu);
                  // $('#sub_menu').val(data.sub_menu);
                  // $('#url').val(data.url);
                  // $('#icon').val(data.icon);
                  // $('#aktif').val(data.aktif);
                  // selanjutnya insert ke data base
                  
                }
            }); 
          });
    });
</script>
</body>
</html>