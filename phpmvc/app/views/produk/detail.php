
	<div class='container mt-5'>
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
			<h5 class="card-title"><?= $data['prod']['nama_barang'] ;?></h5>
			<h6 class="card-subtitle mb-2 text-body-secondary">Kode Barang : <?= $data['prod']['kode_barang'] ;?></h6>
			<p class="card-text">Harga : <?= $data['prod']['harga'] ;?></p>
			<p class="card-text">Stok Persediaan : <?= $data['prod']['stok'] ;?></p>
			<p class="card-text">Stok Minimal : <?= $data['prod']['stok_min'] ;?></p>
			<p class="card-text">Kode Supplier : <?= $data['prod']['supplier_id'] ;?></p>
			<a href="<?= BASEURL ;?>produk" class="card-link">Kembali</a>
		
		  </div>
		</div>
	</div>
