<?php 
	
	class Controller{
		public function view($view, $data = []){
			// $view = "Controller/method";
			// dimana nama file disini di set sama dengan nama method
			require_once '../app/views/'.$view.'.php'; 
			// karena index.php nya berada di public/index.php, makanya ../app/..
			
		}
	}