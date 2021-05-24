<?php
class Register_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function oldUser($email){
		$query = $this->db->get_where('user_login', array('email' => $email));
		$query = $query->num_rows();
		if($query==0){
			return TRUE;
		}else
			return FALSE;
	}

	public function newUser($saved_file_name)
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$date = $this->input->post('date');
		$phone = $this->input->post('phone');
		if(isset($_POST['role_id'])){
			$role = $this->input->post('role_id'); // user atau admin
		}else{
			$role = 1; // user
		}
		$data_user = array(
			'name' => $name,
			'email' => $email,
			'password' => hash("sha256", $password),
			'date' => $date,
			'phone' => $phone,
			'picture' => $saved_file_name,
			'role_id' => $role
		);
		$this->db->insert('user_login', $data_user);
	}

	public function register($uid) //fungsi untuk upload
	{
		$image_path = realpath(APPPATH . '../assets/images/'); //path
		$new_name = str_replace(' ', '_', $_POST['name']); //name

		$config['upload_path']          = $image_path;
		$config['file_name']             = $new_name;
		$config['allowed_types']        = 'gif|jpg|png|JPG|GIF|PNG|jpeg|JPEG|jfif|JFIF';
		$config['max_size']             = 2000;
		$config['max_width']            = 1280;
		$config['max_height']           = 720;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$data = $this->upload->display_errors();
			return $data;
		} else {
			$data = NULL;
		}

		$saved_file_name = 'assets/images/' . $this->upload->data('file_name'); //filename.ext

		//insert
		if (is_null($uid)) {
			$this->newUser($saved_file_name);
		}
		//update
		else {
			$this->db->set('picture', $saved_file_name, FALSE); //disable escape string
			$this->db->where('id', $uid);
			$this->db->update('user_login'); // gives UPDATE user_login SET picture = $saved_file_name WHERE id = $uid

			$deldir = realpath(APPPATH . '../' . $_POST['dir']);
			if (file_exists($deldir)) {
				unlink($deldir);
			}

			unset($temp);
			unset($deldir);
		}

		return $data;
	}
}
