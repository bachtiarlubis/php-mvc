	<script src="<?= BASEURL; ?>/js/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>

	<!-- My Costum Javascript -->
	<script src="<?= BASEURL; ?>/js/my_script.js"></script>	


	<!-- Untuk menampilkan alert sweetalert2 -->
	<!-- 
		Hanya terpanggil apabila setFlash() telah diset ! 
	-->
	<?php Flasher::flash(); ?>
</body>
</html>