<?php 
	
	class About extends Controller{
		public function index($nama="Unknown", $pekerjaan="Pengangguran", $usia = 24){
			
			$data = [
				'judul' => 'About Index',
				'nama' => $nama,
				'pekerjaan' => $pekerjaan,
				'usia' => $usia
			];

			$this->view('templates/header', [$data['judul']]);
			$this->view('about/index', $data);
			$this->view('templates/footer');
		}

		public function page(){
			$data = [
				'judul' => 'About Page'
			];
			$this->view('templates/header', [$data['judul']]);
			$this->view('about/page', $data);
			$this->view('templates/footer');
		}
	}