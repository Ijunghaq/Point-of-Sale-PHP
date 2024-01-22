<?php
	class About extends Controller {
		public function index($nama = 'IJUNG',$pekerjaan='WEB DEVELOPER'){
			$data ['nama'] = 'PUTRI';
			$data ['pekerjaan'] = 'DOKTER';
			$data['title']='About Index';
			
			$this->view('templates/header',$data);
			$this->view('about/index',$data);
			$this->view('templates/footer');
		}
		public function page(){
			$data['title']='About Page';
			$this->view('templates/header',$data);
			$this->view('about/page',$data);
			$this->view('templates/footer');
		}
	}
	