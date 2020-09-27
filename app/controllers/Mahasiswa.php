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
			$dataMahasiswa = $this->model('Mahasiswa_model')->getMahasiswaById($id);
			$nim = $dataMahasiswa["nim"];
			$nama = $dataMahasiswa["nama"];
			if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
				$pesan = "Data mahasiswa ".$nama." dengan NIM ".$nim." berhasil dihapus !";
				Flasher::setFlash($pesan, 'Berhasil', 'success');
				// pindah ke index mahasiswa.
				header("location:".BASEURL."/mahasiswa");
				exit();
			}else{
				$pesan = "Data mahasiswa ".$nama." dengan NIM ".$nim." gagal dihapus !'";
				Flasher::setFlash($pesan, 'Gagal', 'error');
				// pindah ke index mahasiswa.
				header("location:".BASEURL."/mahasiswa");
				exit();
			}
		}

		// proses untuk menampilkan data di modal sebelum proses ubah / update oleh ajax
		public function getdata(){
			$data = $this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']);
			
			$array = array(
				"mhs" => $data
			);

			echo json_encode($array);
		}

		public function ubah(){
			// update validation
			if (!empty($_POST['nama']) && !empty($_POST['nim'])) {
				$dataMahasiswa = $this->model('Mahasiswa_model')->getMahasiswaById($_POST['id_mhs']);
				// cek apakah insert data berhasil
				if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
					Flasher::setFlash('Data mahasiswa '.$dataMahasiswa['nama'].' dengan NIM '.$dataMahasiswa['nim'].' berhasil diubah !', 'Berhasil', 'success');
					// pindah ke index mahasiswa.
					header("location:".BASEURL."/mahasiswa");
					exit();
				}else{
					Flasher::setFlash('Data mahasiswa '.$dataMahasiswa['nama'].' dengan NIM '.$dataMahasiswa['nim'].' gagal diubah !', 'Gagal', 'error');
					// pindah ke index mahasiswa.
					header("location:".BASEURL."/mahasiswa");
					exit();
				}
			}else{
				Flasher::setFlash('Nama dan Nim tidak boleh kosong !', 'Pemberitahuan', 'info');
				// pindah ke index mahasiswa.
				header("location:".BASEURL."/mahasiswa");
				exit();
			} // END insert validation
		}

		public function cari(){
			$data = [
				'judul' => 'Daftar Mahasiswa',
				'mhs' => $this->model('Mahasiswa_model')->getMahasiswaByName($_POST['keywoard']),
				'jurusan' => $this->model('Jurusan_model')->getAllJurusan()
			];

			$this->view('templates/header', ['judul'=> 'Daftar Mahasiswa']);
			$this->view('mahasiswa/index', $data);
			$this->view('templates/footer');
		}
	}