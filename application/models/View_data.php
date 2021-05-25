<?php  
   class View_data extends CI_Model  
   {  
      public function showData($keyword)  
      {  
         //data is retrive from this query  
         $query = $this->db->query("SELECT * FROM hotel_list WHERE ((`hotel-name` LIKE '%$keyword%') OR (`hotel-address` LIKE '%$keyword%'))");
         return $query->result_array();
      }  
   }  
?> 
