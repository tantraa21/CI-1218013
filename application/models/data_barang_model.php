<?php
class data_barang_model extends CI_Model {

	public function_construct()
	{
		$this->load->database();
	}

	public function get_data_barang($harga = FALSE)
	{
		if($harga===False)
		{
			$query=$this->db->get('barang');
			return $query->result_array();
		}

		$query =$this->db->get_where('barang',array('harga'=>$harga));
		return$query->row_array();
	}

	public function get_barang_by_kode($kode=0)
	{
		if($kode===0)
		{
			$query=$this->db->get('barang');
			return $query->result_array();
		}

		$query=$this->db->get_where('barang',array('kode'=>$kode));
		return $query->row_array();
	}

	public function set_data_barang($kode=0)
	{

	$this->load->helper('url');
	$harga = url_tittle($this->input->post('kode_barang'),'dash',TRUE);

	$data=array(
		'kode_barang' => $this->input->post('kode_barang'),
		'harga'   => $harga,
		'test'   => $this->input->post('text')
	);

	if($kode ==0){
		  return $this->db->insert('data_barang', $data); 
		}else {
			$this->db->where('kode', $kode);             
			return $this->db->update('data_barang', $data); 
		}
	}
	 public function delete_news($id)     
	 {        
	  $this->db->where('id', $id);         
	  return $this->db->delete('news');     
	} 

	    
 	}
