<?php
class Staff_model extends CI_Model {
	
	public function __construct()
        {
               parent::__construct();
                
        }
    public function hash_password($password) 
    {
		return password_hash($password, PASSWORD_BCRYPT);
	}
	public function add_staff($data)
	{
		   return $this->db->insert('tbl_staff',$data);
	}
	public function get_all_staff()
	{
		 $this->db->select('tbl_staff.*,tbl_login.*');
		 $this->db->from('tbl_staff');
		 $this->db->join('tbl_login','tbl_login.login_id=tbl_staff.staff_login_id', 'inner');
		 $query = $this->db->get()->result_array();
	     return $query;
	}
	public function get_all_teacher()
	{
		 $this->db->select('tbl_staff.*,tbl_login.*');
		 $this->db->from('tbl_staff');
		 $this->db->join('tbl_login','tbl_login.login_id=tbl_staff.staff_login_id', 'inner');
		 $this->db->where('role', '2');
		 $query = $this->db->get()->result_array();
	     return $query;
	}
	public function get_all_non_teacher()
	{
		 $this->db->select('tbl_staff.*,tbl_login.*');
		 $this->db->from('tbl_staff');
		 $this->db->join('tbl_login','tbl_login.login_id=tbl_staff.staff_login_id', 'inner');
		 $this->db->where('role', '3');
		 $query = $this->db->get()->result_array();
	     return $query;
	}
	public function get_staff_by_id($id)
	{
		 $this->db->select('tbl_staff.*,tbl_login.*');
		 $this->db->from('tbl_staff'); 
		 $this->db->join('tbl_login','tbl_login.login_id=tbl_staff.staff_login_id', 'inner');
		 $this->db->where('tbl_staff.staff_id', $id);
		 $query = $this->db->get()->result_array();
		 return $query;
	}
	public function update_staff($data,$id,$value)
    {
	     $this->db->where('staff_id',$id);
	      $query = $this->db->update('tbl_staff',$data); 
		  $this->db->where('login_id',$id);
	      return $query = $this->db->update('tbl_login',$value);  
    }
    public function remove_staff($id)
        {
	       $this->db->where('staff_login_id',$id);
	       $query = $this->db->delete('tbl_staff');
	       $this->db->where('login_id',$id);
	       return $query = $this->db->delete('tbl_login'); 
        }
        public function list_all_teachers()
        {
		$this->db->select('tw.*,u.*');
		$this->db->from('tbl_staff tw');
		$this->db->join('tbl_login u', 'tw.staff_login_id = u.login_id','left');
		$this->db->where('u.role', '2');
		$query = $this->db->get();
		return $query->result();
		}
		public function list_all_nonteachers()
		{
		$this->db->select('tw.*,u.*');
		$this->db->from('tbl_staff tw');
		$this->db->join('tbl_login u', 'tw.staff_login_id = u.login_id','left');
		$this->db->where('u.role', '3');
		$query = $this->db->get();
		return $query->result();
		}
    public function add_staff_attendance($data)
	    {
		   return $this->db->insert('tbl_staff_attendance',$data);
	    }
    public function get_all_teacher_role($month,$role)
		{
		$this->db->select('tw.*,u.*,a.*');
		$this->db->from('tbl_staff_attendance tw');
		$this->db->join('tbl_login u', 'tw.staff_login_id = u.login_id','left');
		$this->db->join('tbl_staff a', 'tw.staff_login_id = a.staff_login_id','left');
		$this->db->where('u.role',$role);
		$this->db->where('tw.month',$month);
		$query = $this->db->get();
		return $query->result();
		}
	public function get_staff_attendance_by_id($id)
	{
		 $this->db->select('*');
		 $this->db->from('tbl_staff_attendance'); 
		 $this->db->where('attend_id', $id);
		 $query = $this->db->get()->result_array();
		 return $query;
	}
	public function update_staff_attendance($data,$id)
	{
		$this->db->where('attend_id',$id);
		return $this->db->update('tbl_staff_attendance',$data);
	}
	public function remove_staff_attendance($id)
        {
         $this->db->where('attend_id',$id);
         return $query = $this->db->delete('tbl_staff_attendance'); 
        } 
    	public function get_all_teacher_role_excel($month1,$role)
		{
		$this->db->select('tw.*,u.*,a.*');
		$this->db->from('tbl_staff_attendance tw');
		$this->db->join('tbl_login u', 'tw.staff_login_id = u.login_id','left');
		$this->db->join('tbl_staff a', 'tw.staff_login_id = a.staff_login_id','left');
		$this->db->where('u.role',$role);
		$this->db->where('tw.month',$month1);
		$query = $this->db->get();
		return $query->result_array();
		}
  }
?>