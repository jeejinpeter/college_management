<?php
class Admin_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
  public function get_all_admin()
	{
		    $this->db->select('*'); 
            $this->db->from('tbl_login'); 
            $this->db->where('role', '1'); 
			$query = $this->db->get();
			return $query;
	}
public function get_admin_by_id($id)
	    {
		 $this->db->select('*');
		 $this->db->from('tbl_login'); 
		 $this->db->where('login_id', $id);
		 $query = $this->db->get()->result_array();
		return $query;
	    }	
 
public function update_admin($data, $id)
        {
	      $this->db->where('login_id', $id);
	      return $query = $this->db->update('tbl_login',$data); 
        }
public function remove_admin($id)
        {
	       $this->db->where('login_id',$id);
	     return $query = $this->db->delete('tbl_login');  
        }
/*.........................Funds........................*/
public function Add_fund($data)
    {
       return $this->db->insert('tbl_collegefund', $data);	
    }	
 public function get_fund()
	{
		    $this->db->select('*'); 
            $this->db->from('tbl_collegefund');  
			$query = $this->db->get();
			return $query->result();
	}
public function get_fund_id($id)
	{
		    $this->db->select('*'); 
            $this->db->from('tbl_collegefund'); 
            $this->db->where('f_id', $id); 
			$query = $this->db->get();
			return $query->result();
	}
public function update_fund($id,$data)
        {
	      $this->db->where('f_id', $id);
	      return $query = $this->db->update('tbl_collegefund',$data); 
        }
public function delete_fund($id)
        {
	     $this->db->where('f_id',$id);
	     return $query = $this->db->delete('tbl_collegefund');  
        }
public function get_fund_yr($year)
	{
		    $this->db->select('*'); 
            $this->db->from('tbl_collegefund'); 
            $this->db->where('year(tbl_collegefund.date_tr)',$year); 
            $this->db->limit('1');
            $this->db->order_by('f_id', 'desc'); 
			$query = $this->db->get();
			return $query->result();
	}	
  /*-------------------------message------------------*/
  public function send_message($data)
    {
       return $this->db->insert('tbl_messages', $data);	
    }
    public function get_all_sent_messages()
	{
		    $this->db->select('*'); 
            $this->db->from('tbl_messages');  
			$query = $this->db->get();
			return $query->result_array();
	}	
}
?>

