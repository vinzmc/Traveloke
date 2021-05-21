<?php  
   class View_data extends CI_Model  
   {  
      public function __construct()  
      {  
         // Call the Model constructor  
         parent::__construct();  
      }  
      //we will use the select function  
      public function select()  
      {  
         //data is retrive from this query  
         $query = $this->db->get('SELECT * FROM hotel_list');  
         return $query;
      }  
   }  
?> 