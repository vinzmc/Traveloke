<?php  
   class View_data extends CI_Model  
   {  
      public function __construct()  
      {  
         // Call the Model constructor  
         parent::__construct(); 
         $this->load->database(); 
      }  
      
      public function showData()  
      {  
         //data is retrive from this query  
         $query = $this->db->query('SELECT * FROM hotel_list');  
         return $query->result_array();
      }  
   }  
?> 