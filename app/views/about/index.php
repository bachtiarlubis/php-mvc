	<div class="container">			

		<div class="jumbotron mt-4">
		  	<h1 class="display-4">Selamat datang di website saya (About)</h1>
		  	<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
		  	<hr class="my-4">
		  	<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
		  	
	  		<img src="<?= BASEURL; ?>/img/chrollo.jpg" class="img-fluid rounded-circle img-thumbnail shadow" alt="chrollo lucifer" width="200"><!-- jgn gunakan float-*-->
		  	<p class="my-0">Halo, nama saya <?= $data['nama'] ?>, umur saya <?= $data['usia'] ?>, pekerjaan saya <?= $data['pekerjaan'] ?></p>
		</div>
	</div>