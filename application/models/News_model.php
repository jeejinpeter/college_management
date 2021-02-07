<?php
class News_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
      
  	  
	public function insert_news($data)
    {
     
      $query = $this->db->insert('tbl_news', $data);
	  $insert_news_id = $this->db->insert_id();
      return  $insert_news_id;
        
    }
	
	public  function insert_image($insert_news_id,$image)
    {
    $this->db->where('news_id',$insert_news_id);
    return $this->db->update('tbl_news',$image);   
    }
	 public function get_all_listnews()  
      {  
	   $this->db->select('*'); 
       $this->db->from('tbl_news');  
	$this->db->order_by ("news_id", "desc");
			$query = $this->db->get();
         return $query;  
      }  
	 public function get_by_news_id($id)
        {
             $this->db->where('news_id',$id);
             $query = $this->db->get('tbl_news');
             return $query;
        }
	public function update_news($data,$id)
    {
    $this->db->where('news_id', $id);
    return $this->db->update('tbl_news',$data);   
    
    } 		
 public function delete_news($news_id)
    {
    $this->db->where('news_id',$news_id);
    $this->db->delete('tbl_news');   
    return true;
    }  
} 

?>