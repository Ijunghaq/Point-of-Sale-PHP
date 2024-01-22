
	<div class='container mt-5'>
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
			<h5 class="card-title"><?= $data['pel']['nama'] ;?></h5>
			<h6 class="card-subtitle mb-2 text-body-secondary">ID Pelanggan : <?= $data['pel']['id'] ;?></h6>
			<p class="card-text">Jenis kelamin : <?= $data['pel']['jenis_kelamin'] ;?></p>
			<p class="card-text">No. Telp : <?= $data['pel']['telp'] ;?></p>
			<p class="card-text">Alamat : <?= $data['pel']['alamat'] ;?></p>
			
			<a href="<?= BASEURL ;?>pelanggan" class="card-link">Kembali</a>
		
		  </div>
		</div>
	</div>
