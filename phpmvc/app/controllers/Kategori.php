<?php
	class Kategori extends Controller{
		public function index(){
			$data['title']='Daftar Kategori';
			$data['kat']= $this->model('Kategori_model')->getKategori();
			$this->view('templates/header',$data);
			$this->view('Kategori/index',$data);
			$this->view('templates/footer');
		}
	
	
		public function tambah(){
			if($this->model('Kategori_model')->tambahDataKategori($_POST)>0){
				Flasher::setFlash('BERHASIL','ditambahkan','success');
			 
				 header('Location: ' . BASEURL . 'Kategori');
				 exit;
			 }else{
				 Flasher::setFlash('GAGAL','ditambahkan','danger');
			 
				 header('Location: ' . BASEURL . 'Kategori');
				 exit;
			 }
		}
		
		public function hapus($kode){
			if($this->model('Kategori_model')->hapusDataKategori($kode)>0){
				Flasher::setFlash('Kode Kategori ' . $kode . ' BERHASIL','dihapus','success');
			 
				 header('Location: ' . BASEURL . 'Kategori');
				 exit;
			 }else{
				 Flasher::setFlash('Kode Kategori ' . $kode . ' GAGAL','dihapus','danger');
			 
				 header('Location: ' . BASEURL . 'Kategori');
				 exit;
			 }
		}
		
		public function getubah(){
			echo json_encode($this->model('Kategori_model')->getKatByKode($_POST['kode']));
		}
		
		public function ubah(){
				if($this->model('Kategori_model')->ubahDataKategori($_POST)>0){
					Flasher::setFlash('BERHASIL','diperbaharui','success');
				 
					 header('Location: ' . BASEURL . 'Kategori');
					 exit;
				 }else{
					 Flasher::setFlash('GAGAL','diperbaharui','danger');
				 
					 header('Location: ' . BASEURL . 'Kategori');
					 exit;
				 }
			}
			
		public function getCari(){
			echo json_encode($this->model('Kategori_model')->cariDataKat($_POST['query']));
		
	}
		public function cari($a){
			$data['title']='Daftar Kategori';
			$data['kat']= $this->model('Kategori_model')->cariDataKat($a);
			$this->view('templates/header',$data);
			$this->view('Kategori/index',$data);
			$this->view('templates/footer');
		}
		
	}