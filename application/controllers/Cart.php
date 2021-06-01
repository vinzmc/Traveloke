<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		if(!isset($_SESSION['user_id'])) {redirect('login');}
        $this->load->model('cart_model');
    }

    public function index(){
		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);
		$this->load->view('pages/cart', $data);
	}

	public function cartDetail($id){
		if(!isset($id))redirect();
		$_POST['id'] = $id;
		$data['db'] = $this->cart_model->getRow();

		$data['date'] = $this->cart_model->getTodayDate();
		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);
		$this->load->view('pages/cart/cartDetail', $data);

		unset($_SESSION['error']);
	}

	public function insert_item(){
		if($this->cart_model->insertItem()){
			redirect('cart');
		}else{
			redirect('cart/cartDetail/'.$_POST['id']);
		}
	}

	public function delete_item(){
		$this->cart_model->deleteItem();
		redirect('cart');
	}

	public function approve_item(){
		$this->cart_model->approveItem();
		redirect('cart');
	}
}