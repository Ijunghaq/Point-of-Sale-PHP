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
			<button type="button" class="btn btn-primary mb-6 mt-4 tbTambahKat" data-bs-toggle="modal" data-bs-target="#forModal">
			  Tambah Data Kategori
			</button>
			
		</div>
		
	</div>
	<!-- Searching data  -->
	<div class="row mb-3 div-cari">
		<div class='col-lg-6'>
					<label for="keyword" class="form-label">Cari data kategori</label>
					<input class="form-control text-uppercase txtCariKat" list="listCari" name="keyword" id="keyword" autocomplete="off"  autofocus="autofocus" placeholder="Cari Kategori..." aria-label="Username" aria-describedby="basic-addon1">
					
					<datalist id="listCari">
					  <?php foreach($data['kat'] as $p) :  $p['kategori'] ;?>
					  <option value="<?= $p['kategori'];?>">
					  
					  <?php endforeach;?>
					</datalist>
				
		</div>
		
	</div>
	
	<div class='row'>
		<div class='col-lg-10'>
		
			<h3>Daftar Kategori</h3>
			<div class="txtCariKat"></div>
			
			<!-- loader image  -->
			<img src="<?= BASEURL;?>img/loader.gif" alt="loading" id="loader">
			
			<!-- result  -->
			
				<ul class="list-group" id="cari-ul">
				  
				  <?php foreach($data['kat'] as $p) : ?>
				  
				  <li class="list-group-item li_cari">
				  
					<?= $p['kategori'];?>
					<a href="<?= BASEURL;?>Kategori/hapus/<?= $p['id_kategori'];?>"  class="badge rounded-pill text-bg-danger float-end ms-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini..?')" >hapus</a>
					<a href="<?= BASEURL;?>Kategori/edit/<?= $p['id_kategori'];?>"  class="badge rounded-pill text-bg-warning float-end ms-1 tambahModalEditKat" data-bs-toggle="modal" data-bs-target="#forModal" data-id="<?= $p['id_kategori'];?>">edit</a>
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
        <h1 class="modal-title fs-5" id="labelModal">Tambah Kategori</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        <form action='<?= BASEURL; ?>Kategori/tambah' method="post">
			<div class="form-group form-kode " hidden>
			  <label for="id_kategori" class="form-label">ID Katpier</label>
			  <input type="text" class="form-control text-uppercase" id="id_kategori" name="id_kategori">
			</div>
			<div class="form-group">
			  <label for="kategori" class="form-label">Nama Kategori</label>
			  <input type="text" class="form-control text-uppercase" id="kategori" name="kategori" required>
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