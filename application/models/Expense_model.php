<?php
class Expense_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
  	public function get_all_departments()
	{
		$this->db->select('*');
		$this->db->from('tbl_department');
		$query = $this->db->get()->result_array();
return $query; 
	}
	 public function get_all_batch()  
    {  $this->db->select('*');
		$this->db->from('tbl_batch');
		$query = $this->db->get()->result_array();
return $query; 
        
    }
Public function insert_expense($data)
{
     return $this->db->insert('tbl_expense', $data);
}	
public function get_all_expenselist()  
  {  
$this->db->select('tbl_department.*,tbl_expense.*');
$this->db->from('tbl_expense');
$this->db->join('tbl_department', 'tbl_expense.dept_id= tbl_department.dept_id', 'left');
$query = $this->db->get();
return $query->result(); 
  }   
  public function get_expense($id) {
        
       $this->db->select('tbl_department.*,tbl_expense.*');
$this->db->from('tbl_expense');
$this->db->join('tbl_department', 'tbl_expense.dept_id= tbl_department.dept_id', 'left');
$this->db->where('eid',$id);
$query = $this->db->get()->result_array();
return $query; 
        
    }
Public function update_expense($data, $id)
{
  $this->db->where('eid', $id);
 $query=$this->db->update('tbl_expense', $data);
 return $query;
}

 public function expense_delete($id){		
	 	 $this->db->where('eid', $id);
    $query = $this->db->delete('tbl_expense');
      return $query;
}
public function get_monthly_expense($month, $year)  
  {  
$this->db->select('tbl_department.*,tbl_expense.*');
$this->db->from('tbl_expense');
$this->db->join('tbl_department', 'tbl_expense.dept_id= tbl_department.dept_id', 'left');
$this->db->where('month(tbl_expense.exp_date)', $month);
$this->db->where('year(tbl_expense.exp_date)', $year);
$query = $this->db->get();
return $query->result_array(); 
  }	
}
?>