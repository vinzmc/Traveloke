<?php  
   class View_data extends CI_Model  
   {  
      // public function showData($keyword, $star)  //hotel
      // {  
      //    //data is retrive from this query  
      //    $this->db->select('*');
      //    $this->db->from('hotel_list');
      //    if(!empty($keyword) || !empty($star)){
      //       $this->db->group_start();
      //       $this->db->like('hotel-name', $keyword);
      //       $this->db->or_like('hotel-address', $keyword);
      //       $this->db->or_group_start();
      //       $this->db->where('star', $star);
      //       $this->db->group_end();
      //    }
      //    $query = $this->db->get();

      //    return $query->result_array();
      // }  

      public function showData($keyword, $star) 
      {  
         //data is retrive from this query  
         $query = $this->db->query("SELECT * FROM hotel_list WHERE ((`hotel-name` LIKE '%$keyword%') OR (`hotel-address` LIKE '%$keyword%') OR (`star` LIKE '$keyword'))");
         return $query->result_array();
      }
   }  
?> 
