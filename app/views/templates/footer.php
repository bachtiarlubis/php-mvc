	<script src="<?= BASEURL; ?>/js/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>

	<!-- Untuk menampilkan confirm sweetalert2 -->
	<script>
		var sweetConfirm = (id, pesan, tipe) => {
			var confBtnTxt = ucwordsJs(tipe);
			var tipe = tipe.toLowerCase();
			if (tipe == 'hapus' || tipe == 'delete') {
				Swal.fire({
					title: 'Anda yakin ?',
					text: pesan,
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: confBtnTxt,
					showCancelButton: true,
					showCloseButton: true
				}).then((result) => {
			  		if (result.isConfirmed) {
			 			window.location.replace('<?= BASEURL; ?>/mahasiswa/hapus/'+id);   		
			  		}
				});
			}else if (tipe == 'ubah' || tipe == 'update') {
				Swal.fire({
					title: 'Anda yakin ?',
					text: pesan,
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: confBtnTxt,
					showCancelButton: true,
					showCloseButton: true
				}).then((result) => {
			  		if (result.isConfirmed) {
			 			window.location.replace('<?= BASEURL; ?>/mahasiswa/update/'+id);   		
			  		}
				});
			}
		}

		var ucwordsJs = (str) => {
			str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
			    return letter.toUpperCase();
			});

			return str;
		}
	</script>

	<!-- Untuk menampilkan alert sweetalert2 -->
	<!-- 
		Hanya terpanggil apabila setFlash() telah diset ! 
	-->
	<?php Flasher::flash(); ?>
</body>
</html>