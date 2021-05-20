<?php 
class Auth extends CI_Model 
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
			'password'=>password_hash($password,PASSWORD_DEFAULT),
			'date'=>$date,
            'phone'=>$phone,
            'picture'=>$picture
		);
		$this->db->insert('tb_user',$data_user);
	}
}
?>