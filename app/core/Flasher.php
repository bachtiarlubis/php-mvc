<?php 
	
	class Flasher{

		// Set flash
		// $status => success, error, question, info, warning
		public static function setFlash($pesan, $title, $status="success", $aksi=""){
			$_SESSION['flash'] = [
				'pesan' => $pesan,
				'title' => $title,
				'status' => $status,
				'aksi' => $aksi
			];
		}

		// tampilkan flash
		// dipanggil di view/templates/footer.php
		public static function flash(){
			// cek apakah setFlash() telah dilakukan
			if (isset($_SESSION['flash'])) {
				$title = ucwords($_SESSION['flash']['title']);
				$icon = strtolower($_SESSION['flash']['status']);
				$message = $_SESSION['flash']['pesan'];
				$aksi = ucwords($_SESSION['flash']['aksi']);
				echo "
				<script>
					Swal.fire({
					  icon: '".$icon."',
					  title: '".$title."',
					  text: '".$message."'
					})
				</script>
				";
				unset($_SESSION['flash']);
			}
		}

	}