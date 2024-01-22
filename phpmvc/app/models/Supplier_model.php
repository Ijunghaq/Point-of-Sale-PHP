<?php
	class Supplier_model {
		private $tabel='supplier',
				$db;
		
	
		public function __construct() {
			$this->db = new Database;
		}
		/*
		public function getAllProd(){
			$this->db->query('SELECT * FROM '. $this->tabel);
			return $this->db->resultSet();
		}
		 */
		public function getSupByKode($supplier_id){
			$this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE supplier_id =:supplier_id');
			$this->db->bind('supplier_id' , $supplier_id);
			return $this->db->single();
		}
		
		public function getSupplier(){
			$this->db->query('SELECT *  FROM '. $this->tabel);
			return $this->db->resultSet();
		}
		
		
		public function tambahDataSupplier($data){
			$query="INSERT INTO supplier 
								VALUES 
								(:supplier_id , :nama_sup , :alamat_sup , :telp_sup )";
			$this->db->query($query);
			
			$this->db->bind('supplier_id',$data['supplier_id']);
			$this->db->bind('nama_sup',$data['nama_sup']);
			$this->db->bind('alamat_sup',$data['alamat_sup']);
			$this->db->bind('telp_sup',$data['telp_sup']); 
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		public function hapusDataSupplier($id){
			$query="DELETE FROM supplier WHERE supplier_id = :id";
			$this->db->query($query);
			$this->db->bind('id',$id);
			
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		
		public function ubahDataSupplier($data){
			$query="UPDATE supplier SET 
								nama_sup = :nama_sup, 
								alamat_sup = :alamat_sup, 
								telp_sup = :telp_sup 
					WHERE supplier_id = :supplier_id";
			$this->db->query($query);
			
			$this->db->bind('supplier_id',$data['supplier_id']);
			$this->db->bind('nama_sup',$data['nama_sup']);
			$this->db->bind('alamat_sup',$data['alamat_sup']);
			$this->db->bind('telp_sup',$data['telp_sup']);
			
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		
		public function cariDataSup($keyword){
			//$keyword = $_POST['keyword'];
			$query = 'SELECT * FROM ' . $this->tabel . ' WHERE nama_sup LIKE :keyword';
			$this->db->query($query);
			$this->db->bind('keyword', "%$keyword%");
			
			
				return $this->db->resultSet();
			
			
		}
		
	}
	