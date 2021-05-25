<?php
class View_data extends CI_Model
{
   public function showData()
   {
      //data is retrive from this query  
      $query = $this->db->query('SELECT * FROM hotel_list');
      return $query->result_array();
   }

   public function search()
   {
      $search = $this->input->GET('search', TRUE);
      $data = $this->db->query("SELECT * FROM hotel_list WHERE hotel-address = $search");
      return $data->result();
   }
}
