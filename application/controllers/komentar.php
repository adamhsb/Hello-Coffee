<?php

class komentar extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('komentar_model');

		$this->load->library('form_validation');
	}

	public function tambahKomentar(){
		$this->form_validation->set_rules('nama_komentar',"Nama",'required');
		$this->form_validation->set_rules('isi_komentar',"Komentar",'required');
			
		$data = [
				"nama_komentar" => $this->input->post('nama_komentar'),
				"isi_komentar" => $this->input->post('isi_komentar'),
				"id_user" => $_SESSION['id_user'],
			];

			$this->komentar_model->tambahkomentar($data);

			redirect('menu/daftarMenu/');
		}

	public function daftarKomentar($id_menu){
		$data['komentar'] = $this->komentar_model->getKomentarById($id_menu);
		$this->load->view('home/detail_produk', $data);
	}	
}