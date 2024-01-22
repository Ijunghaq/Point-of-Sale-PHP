<div class='container mt-2'>
	<div class="row">
		<div class='col-lg-6'>
			<?php Flasher::flash(); ?>
		</div>
		
	</div>
	
	<!-- Insert data -->
	<div class="row mb-3">
		<div class='col-lg-6'>
			
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary mb-6 mt-4 tbTambahPel" data-bs-toggle="modal" data-bs-target="#forModal">
			  Tambah Data Pelanggan
			</button>
			
		</div>
		
	</div>
	<!-- Searching data  -->
	<div class="row mb-3 div-cari">
		<div class='col-lg-6'>
					<label for="keyword" class="form-label">Cari data Pelanggan</label>
					<input class="form-control text-uppercase txtCariPel" list="listCari" name="keyword" id="keyword" autocomplete="off"  autofocus="autofocus" placeholder="Cari Pelanggan..." aria-label="Username" aria-describedby="basic-addon1">
					
					<datalist id="listCari">
					  <?php foreach($data['Pel'] as $p) :  $p['nama'] ;?>
					  <option value="<?= $p['nama'];?>">
					  
					  <?php endforeach;?>
					</datalist>
				
		</div>
		
	</div>
	
	<div class='row'>
		<div class='col-lg-10'>
		
			<h3>Daftar Pelanggan</h3>
			<div class="txtCariPel"></div>
			
			<!-- loader image  -->
			<img src="<?= BASEURL;?>img/loader.gif" alt="loading" id="loader">
			
			<!-- result  -->
			
				<ul class="list-group" id="cari-ul">
				  
				  <?php foreach($data['Pel'] as $p) : ?>
				  
				  <li class="list-group-item li_cari">
				  
					<?= $p['nama'];?>
					<a href="<?= BASEURL;?>Pelanggan/hapus/<?= $p['id'];?>"  class="badge rounded-pill text-bg-danger float-end ms-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini..?')" >hapus</a>
					<a href="<?= BASEURL;?>Pelanggan/edit/<?= $p['id'];?>"  class="badge rounded-pill text-bg-warning float-end ms-1 tambahModalEditPel" data-bs-toggle="modal" data-bs-target="#forModal" data-id="<?= $p['id'];?>">edit</a>
					<a href="<?= BASEURL;?>Pelanggan/detail/<?= $p['id'];?>"  class="badge rounded-pill text-bg-success float-end ms-1">detail</a>
				</li>
				  
				  <?php endforeach;?>
				  
				  
				</ul>
				
				
				
			
		</div>
	</div>
</div>

<br>
<!-- Modal -->
<div class="modal fade" id="forModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="labelModal">Tambah Pelanggan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body my-3" >
        <form action='<?= BASEURL; ?>pelanggan/tambah' method="post">
			<div class="form-group form-kode " hidden>
			  <label for="id" class="form-label">ID </label>
			  <input type="text" class="form-control text-uppercase" id="id" name="id">
			</div>
			<div class="form-group mx-4">
			  <label for="nama" class="form-label">Nama </label>
			  <input type="text" class="form-control text-uppercase" id="nama" name="nama"    required>
			</div>
			
			
			<div class="form-check mt-3 mx-4">
			  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1"  value="L">
			  <label class="form-check-label" for="jenis_kelamin1">
				Laki-laki
			  </label>
			</div>
			<div class="form-check mx-4">
			  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="P" checked>
			  <label class="form-check-label" for="jenis_kelamin2">
				Perempuan
			  </label>
			</div>
			
			<div class="form-group  mx-4 " >
			  <label for="telp" class="form-label">Telp </label>
			  <input type="text" class="form-control text-uppercase" id="telp" name="telp" style="width: 250px">
			</div>
			
			<div class="form-floating mx-4 mt-3">
			  <textarea class="form-control" placeholder="Isi alamat Pelanggan" name="alamat" id="alamat" style="height: 100px"></textarea>
			  <label for="alamat">Alamat</label>
			</div>
			
			
			
			
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
      </div>
	  <form>
    </div>
  </div>
</div>