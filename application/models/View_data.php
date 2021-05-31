<?php
class View_data extends CI_Model
{
   public function showData()
   {
      if (isset($_POST)) {
         if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $this->db->group_start();
            $this->db->like('`hotel-name`', $keyword);
            $this->db->or_like('`hotel-address`', $keyword);
            $this->db->group_end();
         }
         if (isset($_POST['star'])) {
            $this->db->where('star >=', $_POST['star']);
         }
         if (isset($_POST['min'])) {
            if (is_numeric($_POST['min'])) {
               $this->db->where('`hotel-price` >=', $_POST['min']);
            }
         }
         if (isset($_POST['max'])) {
            if (is_numeric($_POST['max'])) {
               $this->db->where('`hotel-price` <=', $_POST['max']);
            }
         }
      }
      //data is retrive from this query
      $query = $this->db->get('hotel_list');
      return $query->result_array();
   }
}
