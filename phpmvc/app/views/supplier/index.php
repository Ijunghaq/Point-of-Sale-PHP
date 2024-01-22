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
			<button type="button" class="btn btn-primary  mb-6 mt-4 tbTambahSup" data-bs-toggle="modal" data-bs-target="#forModal">
			  Tambah Data supplier
			</button>
			
		</div>
		
	</div>
	<!-- Searching data  -->
	<div class="row mb-3 div-cari">
		<div class='col-lg-6'>
					<label for="keyword" class="form-label">Cari data supplier</label>
					<input class="form-control text-uppercase txtCariSup" list="listCari" name="keyword" id="keyword" autocomplete="off" autofocus="autofocus" placeholder="Cari supplier..." aria-label="Username" aria-describedby="basic-addon1">
					
					<datalist id="listCari">
					  <?php foreach($data['sup'] as $p) : $str=explode(' ',$p['nama_sup'],5)?>
					  <option value="<?= $str[0];?>">
					  
					  <?php endforeach;?>
					</datalist>
				
		</div>
		
	</div>
	
	<div class='row'>
		<div class='col-lg-10'>
		
			<h3>Daftar Supplier</h3>
			<h5 class="txtHasilCari"></h5>
			<!-- loader image  -->
			<img src="<?= BASEURL;?>img/loader.gif" alt="loading" id="loader">
			
			<!-- result  -->
				<ul class="list-group" id="cari-ul">
				  
				  <?php foreach($data['sup'] as $p) : ?>
				  
				  <li class="list-group-item ">
				  
					<?= $p['nama_sup'];?>
					<a href="<?= BASEURL;?>supplier/hapus/<?= $p['supplier_id'];?>"  class="badge rounded-pill text-bg-danger float-end ms-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini..?')" >hapus</a>
					<a href="<?= BASEURL;?>supplier/edit/<?= $p['supplier_id'];?>"  class="badge rounded-pill text-bg-warning float-end ms-1 tambahModalEditSup" data-bs-toggle="modal" data-bs-target="#forModal" data-id="<?= $p['supplier_id'];?>">edit</a>
					<a href="<?= BASEURL;?>supplier/detail/<?= $p['supplier_id'];?>"  class="badge rounded-pill text-bg-success float-end ms-1">detail</a>
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
        <h1 class="modal-title fs-5" id="labelModal">Tambah Supplier</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        <form action='<?= BASEURL; ?>supplier/tambah' method="post">
			<div class="form-group form-kode " hidden>
			  <label for="supplier_id" class="form-label">ID Suppier</label>
			  <input type="text" class="form-control text-uppercase" id="supplier_id" name="supplier_id">
			</div>
			<div class="form-group">
			  <label for="nama_sup" class="form-label">Nama Supplier</label>
			  <input type="text" class="form-control text-uppercase" id="nama_sup" name="nama_sup" required>
			</div>
			<div class="form-group">
			  <label for="alamat_sup" class="form-label">Alamat Suppier</label>
			  <input type="text" class="form-control" id="alamat_sup" name="alamat_sup" >
			</div>
			<div class="form-group">
			  <label for="telp_sup" class="form-label">Telp Supplier</label>
			  <input type="text" class="form-control" id="telp_sup" name="telp_sup" >
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