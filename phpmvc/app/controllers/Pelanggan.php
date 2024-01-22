<?php
	class Pelanggan extends Controller{
		public function index(){
			$data['title']='Daftar Pelanggan';
			$data['Pel']= $this->model('Pelanggan_model')->getPelanggan();
			$this->view('templates/header',$data);
			$this->view('Pelanggan/index',$data);
			$this->view('templates/footer');
		}
	
		public function detail($id){
			$data['title']='Detail Pelanggan';
			$data['pel']= $this->model('Pelanggan_model')->getPelByKode($id);
			$this->view('templates/header',$data);
			$this->view('pelanggan/detail',$data);
			$this->view('templates/footer');
		}
		
		public function tambah(){
			if($this->model('Pelanggan_model')->tambahDataPelanggan($_POST)>0){
				Flasher::setFlash('BERHASIL','ditambahkan','success');
			 
				 header('Location: ' . BASEURL . 'Pelanggan');
				 exit;
			 }else{
				 Flasher::setFlash('GAGAL','ditambahkan','danger');
			 
				 header('Location: ' . BASEURL . 'Pelanggan');
				 exit;
			 }
		}
		
		public function hapus($kode){
			if($this->model('Pelanggan_model')->hapusDataPelanggan($kode)>0){
				Flasher::setFlash('Kode Pelanggan ' . $kode . ' BERHASIL','dihapus','success');
			 
				 header('Location: ' . BASEURL . 'Pelanggan');
				 exit;
			 }else{
				 Flasher::setFlash('Kode Pelanggan ' . $kode . ' GAGAL','dihapus','danger');
			 
				 header('Location: ' . BASEURL . 'Pelanggan');
				 exit;
			 }
		}
		
		public function getubah(){
			echo json_encode($this->model('Pelanggan_model')->getPelByKode($_POST['kode']));
		}
		
		public function ubah(){
				if($this->model('Pelanggan_model')->ubahDataPelanggan($_POST)>0){
					Flasher::setFlash('BERHASIL','diperbaharui','success');
				 
					 header('Location: ' . BASEURL . 'Pelanggan');
					 exit;
				 }else{
					 Flasher::setFlash('GAGAL','diperbaharui','danger');
				 
					 header('Location: ' . BASEURL . 'Pelanggan');
					 exit;
				 }
			}
			
		public function getCari(){
			echo json_encode($this->model('Pelanggan_model')->cariDataPel($_POST['query']));
		
	}
		public function cari($a){
			$data['title']='Daftar Pelanggan';
			$data['Pel']= $this->model('Pelanggan_model')->cariDataPel($a);
			$this->view('templates/header',$data);
			$this->view('Pelanggan/index',$data);
			$this->view('templates/footer');
		}
		
	}