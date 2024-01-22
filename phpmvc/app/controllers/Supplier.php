<?php
	class Supplier extends Controller{
		public function index(){
			$data['title']='Daftar Supplier';
			$data['sup']= $this->model('Supplier_model')->getSupplier();
			$this->view('templates/header',$data);
			$this->view('Supplier/index',$data);
			$this->view('templates/footer');
		}
		public function detail($id){
			$data['title']='Detail Supplier';
			$data['sup']= $this->model('Supplier_model')->getSupByKode($id);
			$this->view('templates/header',$data);
			$this->view('Supplier/detail',$data);
			$this->view('templates/footer');
		}
		
		public function tambah(){
			if($this->model('Supplier_model')->tambahDataSupplier($_POST)>0){
				Flasher::setFlash('BERHASIL','ditambahkan','success');
			 
				 header('Location: ' . BASEURL . 'Supplier');
				 exit;
			 }else{
				 Flasher::setFlash('GAGAL','ditambahkan','danger');
			 
				 header('Location: ' . BASEURL . 'Supplier');
				 exit;
			 }
		}
		
		public function hapus($kode){
			if($this->model('Supplier_model')->hapusDataSupplier($kode)>0){
				Flasher::setFlash('Kode Supplier ' . $kode . ' BERHASIL','dihapus','success');
			 
				 header('Location: ' . BASEURL . 'Supplier');
				 exit;
			 }else{
				 Flasher::setFlash('Kode Supplier ' . $kode . ' GAGAL','dihapus','danger');
			 
				 header('Location: ' . BASEURL . 'Supplier');
				 exit;
			 }
		}
		
		public function getubah(){
			echo json_encode($this->model('Supplier_model')->getSupByKode($_POST['kode']));
		}
		
		public function ubah(){
				if($this->model('Supplier_model')->ubahDataSupplier($_POST)>0){
					Flasher::setFlash('BERHASIL','diperbaharui','success');
				 
					 header('Location: ' . BASEURL . 'Supplier');
					 exit;
				 }else{
					 Flasher::setFlash('GAGAL','diperbaharui','danger');
				 
					 header('Location: ' . BASEURL . 'Supplier');
					 exit;
				 }
			}
			
		public function getCari(){
			echo json_encode($this->model('Supplier_model')->cariDataSup($_POST['query']));
		
	}
		public function cari($a){
			$data['title']='Daftar Supplier';
			$data['sup']= $this->model('Supplier_model')->cariDataSup($a);
			$this->view('templates/header',$data);
			$this->view('Supplier/index',$data);
			$this->view('templates/footer');
		}
		
	}