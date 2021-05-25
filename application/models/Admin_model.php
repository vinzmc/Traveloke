<?php
class Admin_model extends CI_Model
{
    public function getUser()
    {
        $query = $this->db->get('user_login');
        return $query->result_array();
    }

    public function getHotel()
    {
        $query = $this->db->get('hotel_list');
        return $query->result_array();
    }
}
