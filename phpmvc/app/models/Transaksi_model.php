<?php
	class Transaksi_model {
		private $tabel='barang',
				$db;
		
	
		public function __construct() {
			$this->db = new Database;
		}
		 
		public function getTranByKode($id){
			$this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE id =:id');
			$this->db->bind('id' , $id);
			return $this->db->single();
		}
		
		public function getTransaksi(){
			$this->db->query('SELECT *  FROM '. $this->tabel);
			return $this->db->resultSet();
		}
		
		
		public function tambahDatatransaksi($data){
			$query="INSERT INTO transaksi 
								VALUES 
								(:id , :nama , :jenis_kelamin, :telp, :alamat)";
			$this->db->query($query);
			
			$this->db->bind('id',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('jenis_kelamin',$data['jenis_kelamin']);
			$this->db->bind('telp',$data['telp']);
			$this->db->bind('alamat',$data['alamat']);
			
			
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		public function hapusDatatransaksi($id){
			$query="DELETE FROM transaksi WHERE id = :id";
			$this->db->query($query);
			$this->db->bind('id',$id);
			
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		/*
		public function ubahDatatransaksi($data){
			$query="UPDATE transaksi SET 
								nama = :nama,
								jenis_kelamin = :jenis_kelamin, 
								telp = :telp,
								alamat = :alamat
								
								 
					WHERE id = :id";
			$this->db->query($query);
			
			$this->db->bind('id',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('jenis_kelamin',$data['jenis_kelamin']);
			$this->db->bind('telp',$data['telp']);
			$this->db->bind('alamat',$data['alamat']);
			
		 
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		*/
		public function cariDataTran($keyword){
			//$keyword = $_POST['keyword'];
			$query = 'SELECT * FROM ' . $this->tabel . ' WHERE nama_barang LIKE :keyword';
			$this->db->query($query);
			$this->db->bind('keyword', "%$keyword%");
			
			
				return $this->db->resultSet();
			
			
		}
		
	}
	