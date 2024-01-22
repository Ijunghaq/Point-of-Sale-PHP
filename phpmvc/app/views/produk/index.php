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
			<button type="button" class="btn btn-primary  mb-6 mt-4 tombolTambah" data-bs-toggle="modal" data-bs-target="#forModal">
			  Tambah Data Produk
			</button>
			
		</div>
		
	</div>
	<!-- Searching data  -->
	<div class="row mb-3 div-cari">
		<div class='col-lg-6'>
					<label for="keyword" class="form-label">Cari data barang</label>
					<input class="form-control text-uppercase textCari" list="listCari" name="keyword" id="keyword"  autofocus="autofocus" placeholder="Cari Produk..." aria-label="Username" aria-describedby="basic-addon1">
					
					<datalist id="listCari">
					  <?php foreach($data['prod'] as $p) : $str=explode(' ',$p['nama_barang'],5)?>
					  <option value="<?= $str[0];?>">
					  
					  <?php endforeach;?>
					</datalist>
				
		</div>
		
	</div>
	
	<div class='row'>
		<div class='col-lg-10'>
		
			<h3>Daftar Produk</h3>
			<h5 class="txtHasilCari"></h5>
			<!-- loader image  -->
			<img src="<?= BASEURL;?>img/loader.gif" alt="loading" id="loader">
			
			<!-- result  -->
				<ul class="list-group" id="cari-ul">
				  
				  <?php foreach($data['prod'] as $p) : ?>
				  
				  <li class="list-group-item ">
				  
					<?= $p['nama_barang'];?>
					<a href="<?= BASEURL;?>produk/hapus/<?= $p['kode_barang'];?>"  class="badge rounded-pill text-bg-danger float-end ms-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini..?')" >hapus</a>
					<a href="<?= BASEURL;?>produk/edit/<?= $p['kode_barang'];?>"  class="badge rounded-pill text-bg-warning float-end ms-1 tambahModalEdit" data-bs-toggle="modal" data-bs-target="#forModal" data-id="<?= $p['kode_barang'];?>">edit</a>
					<a href="<?= BASEURL;?>produk/detail/<?= $p['kode_barang'];?>"  class="badge rounded-pill text-bg-success float-end ms-1">detail</a>
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
        <h1 class="modal-title fs-5" id="labelModal">Tambah Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action='<?= BASEURL; ?>produk/tambah' method="post">
			<div class="form-group form-kode">
			  <label for="kode_barang" class="form-label">Kode Barang</label>
			  <input type="text" class="form-control text-uppercase" id="kode_barang" name="kode_barang" required>
			</div>
			<div class="form-group">
			  <label for="nama_barang" class="form-label">Nama Barang</label>
			  <input type="text" class="form-control text-uppercase" id="nama_barang" name="nama_barang" required>
			</div>
			<div class="form-group">
			  <label for="harga" class="form-label">Harga</label>
			  <input type="number" class="form-control" id="harga" name="harga" required>
			</div>
			
			<div class='row'>
			
				<div class='col-lg-5'>
			
					<div class="form-group">
					  <label for="stok" class="form-label">Stok Persediaan</label>
					  <input type="number" class="form-control" id="stok" name="stok" >
					</div>
				</div>
				<div class='col-lg-5'>
					<div class="form-group">
					  <label for="stok_min" class="form-label">Stok Minimal</label>
					  <input type="number" class="form-control" id="stok_min" name="stok_min" >
					</div>
				</div>	
			</div>
			<div class='row'>
				<div class='col-lg-5'>
			
					<div class="form-group">
					  <label for="id_kategori" class="form-label">Kategori</label>
					  <select class="form-control" id="id_kategori" name="id_kategori" >
						
						<?php foreach($data['kat'] as $k) : ?>
							<option value='<?= $k['id_kategori'];?>' > <?= $k['kategori'];?> </option>
						<?php endforeach;?>
						
					  </select>
					</div>
				</div>	
				<div class='col-lg-5'>
					<div class="form-group">
					  <label for="supplier_id" class="form-label">Supplier</label>
					  <select class="form-control" id="supplier_id" name="supplier_id" required>
						
						<?php foreach($data['sup'] as $s) : ?>
							<option value='<?= $s['supplier_id'];?>'> <?= $s['nama_sup'];?> </option>
						<?php endforeach;?>
						
					  </select>
					</div>
				</div>
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