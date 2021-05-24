<?php 
class Register_model extends CI_Model 
{
	
	public function __construct()
	{
        parent::__construct();
	}
 
	function register($name, $email, $password, $date, $phone, $picture)
	{
		$data_user = array(
			'name'=>$name,
            'email'=>$email,
			'password'=>hash ( "sha256", $password ),
			'date'=>$date,
            'phone'=>$phone,
            'picture'=>$picture,
			'role_id' => 1
		);
		$this->db->insert('user_login',$data_user);
	}
}
?>