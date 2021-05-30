<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		if (!isset($_SESSION['user_id'])) redirect();
	}

	public function index()
	{
		if (!isset($_SESSION['show'])) {
			$this->session->set_flashdata('btnA', 'd-none');
			$this->session->set_flashdata('btnB', 'd-block');
			$this->session->set_flashdata('stats', 'disabled');
			$this->session->set_flashdata('show', 'hidden');
		}

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);

		$this->load->view('pages/user', $data);

		unset($_SESSION['show']);
		unset($_SESSION['error']);
		unset($_SESSION['success']);
	}

	public function show()
	{
		$this->session->set_flashdata('btnA', 'd-block');
		$this->session->set_flashdata('btnB', 'd-none');
		$this->session->set_flashdata('stats', '');
		$this->session->set_flashdata('show', '');
		redirect('user');
	}

	public function update()
	{
		$result = $this->user_model->update();
		if(!is_bool($result) && $result == 'pass'){
			redirect('login/logout');
		}
		else if (!$result) {
			$this->session->set_flashdata('error', 'Gagal melakukan update data');
		}else{
			$this->session->set_flashdata('success', 'Data berhasil di update');
		}

		redirect('user');
	}
}
