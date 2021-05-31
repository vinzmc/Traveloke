<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booked extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		if(!isset($_SESSION['user_id'])) {redirect('login');}
        $this->load->model('booked_model');
    }

    public function index(){
        $data['db'] = $this->booked_model->getTransactionList();
		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);
		$this->load->view('pages/booked', $data);
	}
}