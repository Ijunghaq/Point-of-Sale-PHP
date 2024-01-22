<?php
	class Pelanggan_model {
		private $tabel='pelanggan',
				$db;
		
	
		public function __construct() {
			$this->db = new Database;
		}
		 
		public function getPelByKode($id){
			$this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE id =:id');
			$this->db->bind('id' , $id);
			return $this->db->single();
		}
		
		public function getPelanggan(){
			$this->db->query('SELECT *  FROM '. $this->tabel);
			return $this->db->resultSet();
		}
		
		
		public function tambahDataPelanggan($data){
			$query="INSERT INTO pelanggan 
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
		public function hapusDataPelanggan($id){
			$query="DELETE FROM pelanggan WHERE id = :id";
			$this->db->query($query);
			$this->db->bind('id',$id);
			
			$this->db->execute();
			
			return $this->db->rowCount();
		}
		
		public function ubahDataPelanggan($data){
			$query="UPDATE pelanggan SET 
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
		
		public function cariDataPel($keyword){
			//$keyword = $_POST['keyword'];
			$query = 'SELECT * FROM ' . $this->tabel . ' WHERE nama LIKE :keyword';
			$this->db->query($query);
			$this->db->bind('keyword', "%$keyword%");
			
			
				return $this->db->resultSet();
			
			
		}
		
	}
	