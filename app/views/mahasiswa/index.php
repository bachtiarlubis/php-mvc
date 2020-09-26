<!-- Note : Sweetalert2 dipanggil di footer -->
<div class="container mt-3">
	<div class="row">
		<div class="col-7">

			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
				Tambah Data Mahasiswa
			</button>

			<h3 class="mt-1">Daftar Mahasiswa</h3>
			
			<ul class="list-group">
			<?php foreach ($data['mhs'] as $mhs) : ?>
				  	<li class="list-group-item">
				  		<?= $mhs['nama']; ?>
				  		<a href="#" onclick="sweetConfirm(<?= $mhs['id']; ?>, 'Hapus data mahasiswa dengan nim <?= $mhs['nim'] ?>', 'hapus');" class="badge badge-danger badge-pill float-right ml-1">hapus</a>
				  		<a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-warning badge-pill float-right ml-1">detail</a>
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