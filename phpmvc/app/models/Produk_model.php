<?php
	class Produk_model {
		private $tabel='barang',
				$db;
		
	
		public function __construct() {
			$this->db = new Database;
		}
		
		public function getAllProd(){
			$this->db->query('SELECT * FROM '. $this->tabel);
			return $this->db->resultSet();
		}
		 
		public function getProdByKode($kode_barang){
			$this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE kode_barang =:kode_barang');
			$this->db->bind('kode_barang' , $kode_barang);
			return $this->db->single();
		}
		
		public function getSupplier(){
			$this->db->query('SELECT * FROM supplier');
			return $this->db->resultSet();
		}
		
		public function getKategori(){
			$this->db->query('SELECT * FROM kategori');
			return $this->db->resultSet();
		}
		
		public function tambahDataProduk($data){
			$query="INSERT INTO barang 
								VALUES 
								(:kode_barang , :nama_barang , :harga , :stok , :stok_min , :id_kategori, :supplier_id)";
			$this->db->query($query);
			
			$this->db->bind('kode_barang',$data['kode_barang']);
			$this->db->bind('nama_barang',$data['nama_barang']);
			$this->db->bind('harga',$data['harga']);
			$this->db->bind('stok',$data['stok']);
			$this->db->bind('stok_min',$data['stok_min']);
			$this->db->bind('id_kategori',$data['id_kategori']);
			$this->db->bind('supplier_id',$data['supplier_id']);
			
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		public function hapusDataProduk($kode){
			$query="DELETE FROM barang WHERE kode_barang = :kode";
			$this->db->query($query);
			$this->db->bind('kode',$kode);
			
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		
		public function ubahDataProduk($data){
			$query="UPDATE barang SET 
								nama_barang = :nama_barang, 
								harga = :harga, 
								stok = :stok,
								stok_min = :stok_min,
								id_kategori = :id_kategori,
								supplier_id = :supplier_id
					WHERE kode_barang = :kode_barang";
			$this->db->query($query);
			
			$this->db->bind('kode_barang',$data['kode_barang']);
			$this->db->bind('nama_barang',$data['nama_barang']);
			$this->db->bind('harga',$data['harga']);
			$this->db->bind('stok',$data['stok']);
			$this->db->bind('stok_min',$data['stok_min']);
			$this->db->bind('id_kategori',$data['id_kategori']);
			$this->db->bind('supplier_id',$data['supplier_id']);
			
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		
		public function cariDataProd($keyword){
			//$keyword = $_POST['keyword'];
			$query = 'SELECT * FROM ' . $this->tabel . ' WHERE nama_barang LIKE :keyword';
			$this->db->query($query);
			$this->db->bind('keyword', "%$keyword%");
			
			
				return $this->db->resultSet();
			
			
		}
		
	}
	