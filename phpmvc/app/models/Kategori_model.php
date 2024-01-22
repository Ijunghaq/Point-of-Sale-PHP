<?php
	class Kategori_model {
		private $tabel='kategori',
				$db;
		
	
		public function __construct() {
			$this->db = new Database;
		}
		 
		public function getKatByKode($id_kategori){
			$this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE id_kategori =:id_kategori');
			$this->db->bind('id_kategori' , $id_kategori);
			return $this->db->single();
		}
		
		public function getKategori(){
			$this->db->query('SELECT *  FROM '. $this->tabel);
			return $this->db->resultSet();
		}
		
		
		public function tambahDataKategori($data){
			$query="INSERT INTO kategori 
								VALUES 
								(:id_kategori , :kategori )";
			$this->db->query($query);
			
			$this->db->bind('id_kategori',$data['id_kategori']);
			$this->db->bind('kategori',$data['kategori']);
			
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		public function hapusDataKategori($id){
			$query="DELETE FROM kategori WHERE id_kategori = :id";
			$this->db->query($query);
			$this->db->bind('id',$id);
			
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		
		public function ubahDataKategori($data){
			$query="UPDATE kategori SET 
								kategori = :kategori
								 
					WHERE id_kategori = :id_kategori";
			$this->db->query($query);
			
			$this->db->bind('id_kategori',$data['id_kategori']);
			$this->db->bind('kategori',$data['kategori']);
		 
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		
		public function cariDataKat($keyword){
			//$keyword = $_POST['keyword'];
			$query = 'SELECT * FROM ' . $this->tabel . ' WHERE kategori LIKE :keyword';
			$this->db->query($query);
			$this->db->bind('keyword', "%$keyword%");
			
			
				return $this->db->resultSet();
			
			
		}
		
	}
	