<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('view_data');
    }

	 public function index()
	{
		if(isset( $_POST['keyword'])){
			$keyword = $_POST['keyword'];
		}else{
			$keyword = '';
		}
		$hotel['data'] = $this->view_data->showData($keyword);

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);

		$data['view'] = $this->load->view('template/view', $hotel, TRUE);

		$this->load->view('pages/home', $data);
	}
}
