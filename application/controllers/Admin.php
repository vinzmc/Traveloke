<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
    public function index()
	{
		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);
		$data['tableCSS'] = $this->load->view('datatables/style', NULL, TRUE);
		$data['tableJS'] = $this->load->view('datatables/script', NULL, TRUE);
		$temp['dbdata'] = $this->admin_model->getUser();
		$data['table'] = $this->load->view('datatables/user', $temp, TRUE);

		$this->load->view('pages/admin', $data);
	}

	public function update_user(){
		echo var_dump($_POST);
		//$this->session->set_flashdata($this->admin_model->updateUser($_POST));
		//redirect();
	}

	public function deleteU(){

	}
}
