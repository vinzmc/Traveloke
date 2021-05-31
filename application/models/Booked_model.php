<?php
class Booked_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTransactionList(){
        $this->db->where('user_id', $_SESSION['user_id']);
        $query = $this->db->get('transaction');
        return $query->result_array();
    }
}