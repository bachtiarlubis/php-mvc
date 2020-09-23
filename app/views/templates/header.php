<!DOCTYPE html>
<html>
<head>
	<title><?= $data['judul'] ?></title>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">

		<!-- START CONTAINER -->
		<div class="container">
		  	<a class="navbar-brand" href="<?= BASEURL; ?>">TITLE MVC</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="	navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>
		  	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    	<div class="navbar-nav">
		      	<a class="nav-link active" href="<?= BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
		      	<a class="nav-link" href="<?= BASEURL; ?>/mahasiswa">Mahasiswa</a>
		      	<a class="nav-link" href="<?= BASEURL; ?>/about">About</a>
		    	</div>
		  	</div>
		  </div>
		<!-- END OF CONTAINER -->

	</nav>