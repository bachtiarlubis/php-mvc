<?php 
	
	class About{
		public function index($nama="Unknown", $pekerjaan="Pengangguran"){
			echo "Halo. Nama saya {$nama} pekerjaan {$pekerjaan}";
		}

		public function page(){
			echo "About/page";
		}
	}