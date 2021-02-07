<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Semester_model extends CI_Model {
	
	public function __construct()
        {
               parent::__construct();
		}
  public function get_all_sem()
     {
		 $this->db->select('*');
		 $this->db->from(' tbl_semester');    
         $query = $this->db->get(); 
         return $query;
     }
   public function get_semesters()
     {
     $this->db->select('*');
     $this->db->from(' tbl_semester');    
         $query = $this->db->get()->result(); 
         return $query;
     }
 
    }