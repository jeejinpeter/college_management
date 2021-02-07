<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notice_model extends CI_Model {
	
	public function __construct()
        {
               parent::__construct();
        }
 Public function insert_notice($data)
    {
     return $this->db->insert('tbl_notice', $data);
    }
    public function get_all_details()
 {
   $this->db->select('*');
   $this->db->from('tbl_notice'); 
   $this->db->order_by('notice_id', 'desc');   
  $query = $this->db->get();   
   return $query; 
 }
 public function get_notice($id) {
        
        $this->db->from('tbl_notice');
        $this->db->where('notice_id', $id);
        $query = $this->db->get();   
   return $query; 
        
    }
    Public function update_notice($data, $id)
{
  $this->db->where('notice_id', $id);
  return  $this->db->update('tbl_notice', $data);
}
Public function notice_delete($id)
{
  $this->db->where('notice_id', $id);
  return $this->db->delete('tbl_notice');
}
    }