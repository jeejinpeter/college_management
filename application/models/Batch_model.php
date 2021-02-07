<?php
class Batch_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
   public  function insert_batchdetails($data)
	{
         return $this->db->insert('tbl_batch',$data);
        
    }
	public function get_all_departments()
	{
		$this->db->select('*');
		$this->db->from('tbl_department');
		$query = $this->db->get();
		return $query->result(); 
	}
	 public function get_all_batch()  
    {  
        
        $query = $this->db->get('tbl_batch')->result();
        return $query;  
    } 
     public function get_batch_by_id($id)
    {
        $this->db->where('batch_id',$id);
        $query = $this->db->get('tbl_batch');
        return $query;
    }
	public function update_batch($data,$id)
	{
		if (is_array($data) && ! empty($data))
		{
			$this->db->where('batch_id', $id);
			$this->db->update('tbl_batch',$data);
		}
		return true; 
	} 
	public function delete_batch($id)
	{
		$this->db->where('batch_id',$id);
		$this->db->delete('tbl_batch');
		return true; 
	}	
	public function get_student_register($d, $s, $b, $div)
	{
		$this->db->select('tbl_stud_batch.*, tbl_department.*, tbl_students.*, tbl_batch.*');
		$this->db->from('tbl_stud_batch');
		$this->db->join('tbl_students', 'tbl_students.student_id = tbl_stud_batch.student_id', 'left');
		$this->db->join('tbl_department', 'tbl_department.dept_id = tbl_stud_batch.department', 'left');
		$this->db->join('tbl_batch', 'tbl_batch.batch_id = tbl_stud_batch.batch_id', 'left');
		$this->db->where('tbl_stud_batch.department', $d);
		$this->db->where('tbl_stud_batch.semester', $s);
		$this->db->where('tbl_stud_batch.batch_id', $b);
		$this->db->where('tbl_stud_batch.division', $div);
		$query = $this->db->get();
		return $query->result_array(); 
	} 
	public function get_batch_year($id)
    {
        $this->db->where('batch_id',$id);
        $query = $this->db->get('tbl_batch')->result();
        return $query;
    }
	public function view_all_batch()  
    {  
        $this->db->order_by ("batch_id", "asc");
        $query = $this->db->get('tbl_batch')->result_array();;
        return $query;  
    }
    public function get_batch_for_stu($id)
        {
	     $this->db->select('*'); 
         $this->db->from('tbl_batch');
		 $this->db->where('batch_id', $id);		 
         $query = $this->db->get()->result_array();
		return $query;
		}	 
}