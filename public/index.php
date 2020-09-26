<?php
	
	// session dijalankan di class Flasher{}
	if (!session_id())
		session_start();

	require_once "../app/init.php";

	$app = new App;