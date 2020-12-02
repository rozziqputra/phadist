// j queri carikan element yang namanya form-chect-input
//pada saat di clik jalankan fungsi berikut ini

$('.form-check-input').on('click', function () {
	const menuId = $(this).data('menu');
	const aksesId = $(this).data('akses');
	// jalankan jquery
	$.ajax({
		url: "<?= base_url('admin/change_akses');?>",
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
