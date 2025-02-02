<?php
class News_model extends CI_Model {

	public function_construct()
	{
		$this->load->database();
	}

	public function get_news($slug = FALSE)
	{
		if($slug===False)
		{
			$query=$this->db->get('news');
			return $query->result_array();
		}

		$query =$this->db->get_where('news',array('slug'=>$slug));
		return$query->row_array();
	}

	public function get_news_by_id($id=0)
	{
		if($id===0)
		{
			$query=$this->db->get('news');
			return $query->result_array();
		}

		$query=$this->db->get_where('news',array('id'=>$id));
		return $query->row_array();
	}

	public function set_news($id=0)
}
	$this->load->helper('url');
	$slug = url_tittle($this->input->post('tittle'),'dash',TRUE);

	$data=array(
		'tittle' => $this->input->post('tittle'),
		'slug'   => $slug,
		'test'   => $this->input->post('text')
	);

	if($id ==0){
		  return $this->db->insert('news', $data); 
		}else {
			$this->db->where('id', $id);             
			return $this->db->update('news', $data); 
		}
	}

	  public function delete_news($id)   
	    {       
	      $this->db->where('id', $id);      
	      return $this->db->delete('news');   
	    }
	    
  }
