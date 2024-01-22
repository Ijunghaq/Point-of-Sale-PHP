<!DOCTYPE html>
<html>
<head>
<title>Title <?= $data['title']; ?> </title>
<!-- Bootstrap css-->
    <!--<link href="https://localhost/phpmvc/public/css/bootstrap.css" rel="stylesheet" > -->
			<link rel="stylesheet" href="<?= BASEURL; ?>css/bootstrap.css">
	<!-- End Bootstrap css -->
	
</head>
<body>
	<!-- NAVBAR -->
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
	
	  <div class="container">
		<a class="navbar-brand" href="<?= BASEURL;?>">phpMVC</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		  <ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="<?= BASEURL;?>">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?= BASEURL;?>about">About</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?= BASEURL;?>produk">Produk</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?= BASEURL;?>supplier">Supplier</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?= BASEURL;?>kategori">Kategori</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?= BASEURL;?>pelanggan">Pelanggan</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?= BASEURL;?>transaksi">Transaksi</a>
			</li>
		  </ul>
		</div>
	  </div>
	 
	</nav>
	
	<!-- END NAVBAR -->
	
	
