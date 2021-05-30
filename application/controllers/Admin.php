<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['role_id'])) redirect();
		if ($_SESSION['role_id'] != 2) redirect(); //admin only
		$this->load->model('admin_model');
	}

	public function index()
	{
		if (!isset($_SESSION['tab'])) {
			$data['tab'] = 1;
		}

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);
		// database view requirement
		$data['tableCSS'] = $this->load->view('pages/admin/datatables/style', NULL, TRUE);
		$data['tableJS'] = $this->load->view('pages/admin/datatables/script', NULL, TRUE);
		// database view
		$temp['dbdata'] = $this->admin_model->getUser();
		$temp['hoteldb'] = $this->admin_model->getHotel();
		$data['user'] = $this->load->view('pages/admin/datatables/userdb', $temp, TRUE);
		$data['hotel'] = $this->load->view('pages/admin/datatables/hoteldb', $temp, TRUE);

		$this->load->view('pages/admin', $data);

		unset($_SESSION['error']);
		unset($_SESSION['msg']);
	}

	public function updatePicPage($uid)
	{
		$data['detail'] = $this->admin_model->getUserInfo($uid);
		if ($data['detail']['role_id'] == 2) {
			$this->session->set_flashdata('error', 'Data Admin tidak dapat diubah melalui admin page!');
			redirect('admin');
		} else {
			$data['style'] = $this->load->view('include/style', NULL, TRUE);
			$data['script'] = $this->load->view('include/script', NULL, TRUE);
			$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
			$data['footer'] = $this->load->view('template/footer', NULL, TRUE);

			$this->load->view('pages/admin/updatepic', $data);
		}
	}

	public function updateUserPicture()
	{
		$this->admin_model->updatePicture();
		$_SESSION['tab'] = 1;
		redirect('admin');
	}

	public function reset_user_picture($uid)
	{
		$this->admin_model->resetUserPicture($uid);
		$_SESSION['tab'] = 1;
		redirect('admin');
	}

	public function new_user()
	{
		$this->admin_model->newUser();
		$_SESSION['tab'] = 1;
		redirect('admin');
	}

	public function update_user()
	{
		$this->admin_model->updateUser();
		$_SESSION['tab'] = 1;
		redirect('admin');
	}

	public function delete_user($uid)
	{
		$this->admin_model->delUser($uid);
		$_SESSION['tab'] = 1;
		redirect('admin');
	}

	public function reset_password($uid)
	{
		$this->admin_model->resetPass($uid);
		$_SESSION['tab'] = 1;
		redirect('admin');
	}
	
}
