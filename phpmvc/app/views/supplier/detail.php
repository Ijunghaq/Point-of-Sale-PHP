

	<div class='container mt-5'>
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
			<h5 class="card-title"><?= $data['sup']['nama_sup'] ;?></h5>
			<h6 class="card-subtitle mb-2 text-body-secondary">ID Supplier: <?= $data['sup']['supplier_id'] ;?></h6>
			<p class="card-text">Alamat Supplier : <?= $data['sup']['alamat_sup'] ;?></p>
			<p class="card-text">Telp Supplier  : <?= $data['sup']['telp_sup'] ;?></p>
			
			<a href="<?= BASEURL ;?>supplier" class="card-link">Kembali</a>
		
		  </div>
		</div>
	</div>
