<?php
class Admin_model extends CI_Model
{
    public function getUser()
    {
        $query = $this->db->get('user_login');
        return $query->result_array();
    }
}
