<?php
    Class Login_model extends CI_Model{
        
        public function cek_login($email, $password){
            $email = set_value('email');
            $password = set_value('password');
        
            $result = $this->db->where('email', $email)
                     ->where('password', hash("sha256", $password))
                     ->limit(1)
                     ->get('user_login');
        
            if($result->num_rows() > 0){
              return $result->row();
            }
            else{
              return FALSE;
            }
          }
    }
