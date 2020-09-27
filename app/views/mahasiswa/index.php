<!-- Note : Sweetalert2 dipanggil di footer -->
<div class="container mt-3">
	
	<div class="row">
		<div class="col-lg-7">
			
			<form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="cari mahasiswa..." name="keywoard" id="keywoard" autocomplete="off">
				  	<div class="input-group-append">
				    	<button class="btn btn-outline-primary" type="submit" id="btnCari">Cari</button>
				  	</div>
				</div>
			</form>

		</div>
	</div>

	<div class="row mb-1">
		<div class="col-lg-7">
			<!-- Button trigger modal -->
			<!-- data-toggle dan data-target yang akan memicu modal tampil -->
			<button type="button" class="btn btn-primary" id="btnTambahData" data-toggle="modal" data-target="#formModal">
				Tambah Data Mahasiswa
			</button>
		</div>
	</div>

	<div class="row">
		<div class="col-7">

			<h3 class="mt-1">Daftar Mahasiswa</h3>
			
			<ul class="list-group">
			<?php foreach ($data['mhs'] as $mhs) : ?>
				  	<li class="list-group-item">
				  		<?= $mhs['nama']; ?>
				  		<a href="#" onclick="sweetConfirm('Hapus data mahasiswa <?= $mhs['nama'] ?> dengan nim <?= $mhs['nim'] ?>', 'Hapus', '<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>');" class="badge badge-danger badge-pill float-right ml-1">hapus</a>
				  		<!-- proses ubah ada di js/my_script.js -->
				  		<a href="" class="badge badge-warning badge-pill float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-idmhs="<?= $mhs['id']; ?>" data-urlgetdata="<?= BASEURL; ?>/mahasiswa/getdata" data-urlaction="<?= BASEURL; ?>/mahasiswa/ubah">ubah</a>
				  		<a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary badge-pill float-right ml-1">detail</a>
				  	</li>
			<?php endforeach; ?>
			</ul>

		</div>
	</div>
</div>

<!-- Modal -->
<!-- data-backdrop="static" apabila user mengeklik diluar modal tidak akan menutup jendela modal -->
<div class="modal fade" id="formModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>

	      	<form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
	      		<input type="hidden" style="display: none;" id="id_mhs" name="id_mhs">
		      	<div class="modal-body">
	        		<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama">
				  	</div>
				  	<div class="form-group">
						<label for="nim">NIM</label>
						<input type="number" class="form-control" id="nim" name="nim">
				  	</div>
				  	<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email">
				  	</div>
				  	<div class="form-group">
				    	<label for="id_jurusan">Jurusan</label>
				    	<select class="form-control" id="id_jurusan" name="id_jurusan">
				    		<option value="" selected>Pilih Jurusan</option>
				    		<?php foreach($data['jurusan'] as $jurusan): ?>
					      		<option value="<?= $jurusan['id'] ?>"><?= $jurusan['jurusan']; ?></option>
					    	<?php endforeach ?>
					      	
				    	</select>
				  	</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        	<button type="submit" class="btn btn-primary">Tambah Data</button>
		      	</div>
	      	</form>

    	</div>
	</div>
</div>