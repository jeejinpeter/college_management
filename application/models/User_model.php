<?php
class User_model extends CI_Model {
	
	public function __construct()
        {
               parent::__construct();
        }
    public function create_admin($data)
    {
       return $this->db->insert('tbl_login', $data);    
    }
    public function update_new_password($data, $id)
  {
   $this->db->where('login_id', $id);
   return  $this->db->update('tbl_login', $data);
  }

     /**
     * hash_password function.
     * 
     * @access private
     * @param mixed $password
     * @return string|bool could be a string on success, or bool false on failure
     */
public function hash_password($password)
    {
		return password_hash($password, PASSWORD_BCRYPT);
	}
        /**
     * resolve_user_login function.
     * 
     * @access public
     * @param mixed $username
     * @param mixed $password
     * @return bool true on success, false on failure
     */
public function resolve_user_login($username, $password) {
        $this->db->select('password');
        $this->db->from('tbl_login');
        $this->db->where('username', $username);
        $hash = $this->db->get()->row('password'); 
        return $this->verify_password_hash($password, $hash);
    }
    /**
     * verify_password_hash function.
     * 
     * @access private
     * @param mixed $password
     * @param mixed $hash
     * @return bool
     */
private function verify_password_hash($password, $hash)
    {
        return password_verify($password, $hash); 
    }
    /**
     * get_user_id_from_username function.
     * 
     * @access public
     * @param mixed $username
     * @return int the user id
     */ 
public function get_user_id_from_username($username)
     {
        $this->db->select('login_id');
        $this->db->from('tbl_login');
        $this->db->where('username', $username);
        return $this->db->get()->row('login_id');
     }
     /**
     * get_user function.
     * 
     * @access public
     * @param mixed $user_id
     * @return object the user object
     */
public function get_user($user_id)
    {
       $this->db->from('tbl_login');
       $this->db->where('login_id', $user_id);
       return $this->db->get()->row();
        
    }
public function add_staff_details($value)
        {
             $this->db->insert('tbl_login',$value);
             $insert_id = $this->db->insert_id();
             return  $insert_id;
        }
public function change_superpassword($data)
    {
       $this->db->where('role', '9');
       $this->db->update('tbl_login', $data);
$DB2 = $this->load->database('sngc_nattika', true);
$DB2->update('tbl_login', $data); $DB2->where('role', '9'); 
$DB3 = $this->load->database('sng_punalur', true);
$DB3->update('tbl_login', $data); $DB3->where('role', '9');
$DB4 = $this->load->database('sngc_naghiyarkulangara', true);
$DB4->update('tbl_login', $data); $DB4->where('role', '9');
$DB5 = $this->load->database('sngc_pambanar', true);
$DB5->update('tbl_login', $data); $DB5->where('role', '9');
$DB6 = $this->load->database('sng_chempazhanthy', true);
$DB6->update('tbl_login', $data); $DB6->where('role', '9');
$DB7 = $this->load->database('sng_mezhuveli', true);
$DB7->update('tbl_login', $data); $DB7->where('role', '9');
$DB8 = $this->load->database('sng_cherthala', true);
$DB8->update('tbl_login', $data); $DB8->where('role', '9');
$DB9 = $this->load->database('sng_varkala', true);
$DB9->update('tbl_login', $data); $DB9->where('role', '9');
$DB10 = $this->load->database('sng_alathur', true);
$DB10->update('tbl_login', $data); $DB10->where('role', '9');
$DB11 = $this->load->database('sng_kannur', true);
$DB11->update('tbl_login', $data); $DB11->where('role', '9');
$DB12 = $this->load->database('sng_legalkollam', true);
$DB12->update('tbl_login', $data); $DB12->where('role', '9');
    return TRUE;
}
}
?>