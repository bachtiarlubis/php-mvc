<?php 

	class Mahasiswa extends Controller{
		public function index(){
			$data = [
				'judul' => 'Daftar Mahasiswa',
				'mhs' => $this->model('Mahasiswa_model')->getAllMahasiswa()
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
	}