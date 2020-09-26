<?php 

	class Mahasiswa extends Controller{
		public function index(){
			$data = [
				'judul' => 'Daftar Mahasiswa',
				'mhs' => $this->model('Mahasiswa_model')->getAllMahasiswa(),
				'jurusan' => $this->model('Jurusan_model')->getAllJurusan()
			];

			$this->view('templates/header', ['judul'=> 'Daftar Mahasiswa']);
			$this->view('mahasiswa/index', $data);
			$this->view('templates/footer');
		}

		public function detail($id){
			$data = [
				'judul' => 'Detail Mahasiswa',
				'mhs' => $this->model('Mahasiswa_model')->getMahasiswaById($id)
			];

			$this->view('templates/header', ['judul'=> 'Daftar Mahasiswa']);
			$this->view('mahasiswa/detail', $data);
			$this->view('templates/footer');
		}

		public function tambah(){
			// Insert validation
			if (!empty($_POST['nama']) && !empty($_POST['nim']) && !empty($_POST['email']) && !empty($_POST['id_jurusan'])) {
				// cek apakah insert data berhasil
				if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
					Flasher::setFlash('Data mahasiswa berhasil ditambahkan !', 'Berhasil', 'success');
					// pindah ke index mahasiswa.
					header("location:".BASEURL."/mahasiswa");
					exit();
				}else{
					Flasher::setFlash('Data mahasiswa gagal ditambahkan !', 'Gagal', 'error');
					// pindah ke index mahasiswa.
					header("location:".BASEURL."/mahasiswa");
					exit();
				}
			}else{
				Flasher::setFlash('Mohon lengkapi form yang tersedia !', 'Pemberitahuan', 'info');
				// pindah ke index mahasiswa.
				header("location:".BASEURL."/mahasiswa");
				exit();
			} // END insert validation
		}

		public function hapus($id){
			if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
				Flasher::setFlash('Data mahasiswa berhasil dihapus !', 'Berhasil', 'success');
				// pindah ke index mahasiswa.
				header("location:".BASEURL."/mahasiswa");
				exit();
			}else{
				Flasher::setFlash('Data mahasiswa gagal dihapus !', 'Gagal', 'error');
				// pindah ke index mahasiswa.
				header("location:".BASEURL."/mahasiswa");
				exit();
			}
		}
	}