<?php 
	
	class App{
		// Set default Controller / Method
		protected 	$controller = "Home",
					$method = "index",
					$params = [];


		public function __construct(){
			$url = $this->parseURL();

			// http://.../public/controller/method/param_1/param_2
				//$url = [[0] => controller, [1] => method, [2] => param_1, [3] => param_2, [N] => param_N];

			// controller
			if (file_exists("../app/controllers/".$url[0].".php")) {
				// $controller = controller
				$this->controller = $url[0];
				// hapus controller dari $url
				unset($url[0]);
			}

			require_once "../app/controllers/".$this->controller.".php";
			$this->controller = new $this->controller;

			// method
			if (isset($url[1])) {
				// cek apakah method eksis di kelas Controller
				if (method_exists($this->controller, $url[1])) {
					$this->method = $url[1];
					// hapus method dari $url
					unset($url[1]);
				}
			}

			// parameters
			if (!empty($url)) {
				// ambil $url yang tersisa (parameters)
				$this->params = array_values($url);
			}

			// jalankan controller & method, serta kirimkan parameters jika ada
			call_user_func_array([$this->controller, $this->method], $this->params);

			echo "<pre>";
			var_dump($url);
			var_dump($this->params);
		}
		// END of __construct()

		public function parseURL(){
			if (isset($_GET['url'])) {
				// hapus '/' diakhir url
				$url = rtrim($_GET['url'], '/');
				
				// bersihkan url dari karakter aneh
				$url = filter_var($url, FILTER_SANITIZE_URL);

				// pecah url (setelah /public/) menjadi array
				$url = explode('/', $url);

				return $url;
			}
		}
	}