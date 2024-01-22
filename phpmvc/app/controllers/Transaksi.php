<?php
	class Transaksi extends Controller{
		public function index(){
			$data['title']='Daftar Transaksi';
			$data['Tran']= $this->model('Transaksi_model')->getTransaksi();
			$this->view('templates/header',$data);
			$this->view('Transaksi/index',$data);
			$this->view('templates/footer');
		}
	
		public function detail($id){
			$data['title']='Detail Transaksi';
			$data['Tran']= $this->model('Transaksi_model')->getTranByKode($id);
			$this->view('templates/header',$data);
			$this->view('Transaksi/detail',$data);
			$this->view('templates/footer');
		}
		
		public function tambah(){
			if($this->model('Transaksi_model')->tambahDataTransaksi($_POST)>0){
				Flasher::setFlash('BERHASIL','ditambahkan','success');
			 
				 header('Location: ' . BASEURL . 'Transaksi');
				 exit;
			 }else{
				 Flasher::setFlash('GAGAL','ditambahkan','danger');
			 
				 header('Location: ' . BASEURL . 'Transaksi');
				 exit;
			 }
		}
		
		public function hapus($kode){
			if($this->model('Transaksi_model')->hapusDataTransaksi($kode)>0){
				Flasher::setFlash('Kode Transaksi ' . $kode . ' BERHASIL','dihapus','success');
			 
				 header('Location: ' . BASEURL . 'Transaksi');
				 exit;
			 }else{
				 Flasher::setFlash('Kode Transaksi ' . $kode . ' GAGAL','dihapus','danger');
			 
				 header('Location: ' . BASEURL . 'Transaksi');
				 exit;
			 }
		}
		
	//	public function getubah(){
	//		echo json_encode($this->model('Transaksi_model')->getTranByKode($_POST['kode']));
		//}
		
	/*	public function ubah(){
				if($this->model('Transaksi_model')->ubahDataTransaksi($_POST)>0){
					Flasher::setFlash('BERHASIL','diperbaharui','success');
				 
					 header('Location: ' . BASEURL . 'Transaksi');
					 exit;
				 }else{
					 Flasher::setFlash('GAGAL','diperbaharui','danger');
				 
					 header('Location: ' . BASEURL . 'Transaksi');
					 exit;
				 }
			}
			*/
		public function getCari(){
			echo json_encode($this->model('Transaksi_model')->cariDataTran($_POST['query']));
		
	}
		public function cari($a){
			$data['title']='Daftar Transaksi';
			$data['Tran']= $this->model('Transaksi_model')->cariDataTran($a);
			$this->view('templates/header',$data);
			$this->view('Transaksi/index',$data);
			$this->view('templates/footer');
		}
		
	}