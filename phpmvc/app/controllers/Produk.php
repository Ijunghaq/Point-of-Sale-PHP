<?php
	class Produk extends Controller{
		public function index(){
			$data['title']='Daftar Produk';
			$data['prod']= $this->model('Produk_model')->getAllProd();
			$data['sup']= $this->model('Produk_model')->getSupplier();
			$data['kat']= $this->model('Produk_model')->getKategori();
			$this->view('templates/header',$data);
			$this->view('produk/index',$data);
			$this->view('templates/footer');
		}
		public function detail($kode_barang){
			$data['title']='Detail Produk';
			$data['prod']= $this->model('Produk_model')->getProdByKode($kode_barang);
			$this->view('templates/header',$data);
			$this->view('produk/detail',$data);
			$this->view('templates/footer');
		}
		
		public function tambah(){
			if($this->model('Produk_model')->tambahDataProduk($_POST)>0){
				Flasher::setFlash('BERHASIL','ditambahkan','success');
			 
				 header('Location: ' . BASEURL . 'produk');
				 exit;
			 }else{
				 Flasher::setFlash('GAGAL','ditambahkan','danger');
			 
				 header('Location: ' . BASEURL . 'produk');
				 exit;
			 }
		}
		
		public function hapus($kode){
			if($this->model('Produk_model')->hapusDataProduk($kode)>0){
				Flasher::setFlash('Kode Barang ' . $kode . ' BERHASIL','dihapus','success');
			 
				 header('Location: ' . BASEURL . 'produk');
				 exit;
			 }else{
				 Flasher::setFlash('Kode Barang ' . $kode . ' GAGAL','dihapus','danger');
			 
				 header('Location: ' . BASEURL . 'produk');
				 exit;
			 }
		}
		
		public function getubah(){
			echo json_encode($this->model('Produk_model')->getProdByKode($_POST['kode']));
		}
		
		public function ubah(){
				if($this->model('Produk_model')->ubahDataProduk($_POST)>0){
					Flasher::setFlash('BERHASIL','diperbaharui','success');
				 
					 header('Location: ' . BASEURL . 'produk');
					 exit;
				 }else{
					 Flasher::setFlash('GAGAL','diperbaharui','danger');
				 
					 header('Location: ' . BASEURL . 'produk');
					 exit;
				 }
			}
			
		public function getCari(){
			echo json_encode($this->model('Produk_model')->cariDataProd($_POST['query']));
		
	}
		public function cari($a){
			$data['title']='Daftar Produk';
			$data['prod']= $this->model('Produk_model')->cariDataProd($a);
			$this->view('templates/header',$data);
			$this->view('produk/index',$data);
			$this->view('templates/footer');
		}
		
	}