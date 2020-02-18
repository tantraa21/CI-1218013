<?php
 class Data_barang extends CI_Controller {       

	public function __construct()
	 { 
	   parent::__construct();         
	   $this->load->model('data_barang_model');         
	   $this->load->helper('url_helper');    

	  } 

	public function index()     
	   {         
	   	$data['databarang'] = $this->barang_model->get_data_barang();         
	   	$data['kode_barang'] = 'data_barang archive';          

	   	 $this->load->view('templates/header', $data);         
	   	 $this->load->view('data_barang/index', $data);         
	   	 $this->load->view('templates/footer');     

	   	}

	public function view($slug = NULL)     
	   	 {         
	   	 	$data['news_item'] = $this->barang_model->get_data_barang($slug);                  
	   	 	if (empty($data['news_item']))         
	   	 	{             
	   	 		show_404();         
	   	 	}           

	   	 	$data['title'] = $data['news_item']['nama']; 
	   	 	 $this->load->view('templates/header', $data);         
	   	 	 $this->load->view('news/view', $data);         
	   	 	 $this->load->view('templates/footer');     
	   	 	}

	public function create()     
	   	 	  {         
	   	 	  	$this->load->helper('form');         
	   	 	  	$this->load->library('form_validation');

	   	 	  	$data['title'] = 'Create a news item';           

	   	 	  	$this->form_validation->set_rules('title', 'Title', 'required');         
	   	 	  	$this->form_validation->set_rules('text', 'Text', 'required');           

	   	 	  	if ($this->form_validation->run() === FALSE)         
	   	 	  		{             
	   	 	  			$this->load->view('templates/header', $data);    
	   	 	  			$this->load->view('news/create');             
	   	 	  			$this->load->view('templates/footer'); 

	   	 	  		}         
	   	 	  		else         
	   	 	  		{             
	   	 	  			$this->news_model->set_news();             
	   	 	  			$this->load->view('templates/header', $data);             
	   	 	  			$this->load->view('news/success');             
	   	 	  			$this->load->view('templates/footer');         
	   	 	  		}     
	   	 	  	} 

	public function edit()     
	   	 	  	 {         
	   	 	  	 	$id = $this->uri->segment(3);                 

	   	 	  	 	if (empty($id))         
	   	 	  	 		{             
	   	 	  	 			show_404();         
	   	 	  	 		}                  
	   	 	  	 		$this->load->helper('form');         
	   	 	  	 		$this->load->library('form_validation');                  

	   	 	  	 		$data['title'] = 'Edit a news item';                 
	   	 	  	 		$data['news_item'] = $this->news_model->get_news_by_id($id);

	   	 	  	 		 $this->form_validation->set_rules('title', 'title', 'required');     
	   	 	  	 		 $this->form_validation->set_rules('text', 'Text', 'required');           
	   	 	  	 		 if ($this->form_validation->run() === FALSE)         
	   	 	  	 		 	{             
	   	 	  	 		 $this->load->view('templates/header', $data);             
	   	 	  	 		 $this->load->view('news/edit', $data);             
	   	 	  	 		 $this->load->view('templates/footer'); 
	   	 	  	 		  }         
	   	 	  	 		  else         
	   	 	  	 		  {             
	   	 	  	 		  	$this->news_model->set_news($id);             
	   	 	  	 		  	//$this->load->view('news/success');             
	   	 	  	 		  	redirect( base_url() . 'index.php/news');         
	   	 	  	 		  }     
	   	 	  	 		}

	
	public function tambah()     
	   {         
	   	$data['data_barang'] = $this->news_model->get_news();         
	   	$data['kode_barang'] = 'News archive';          

	   	 $this->load->view('templates/header', $data);         
	   	 $this->load->view('data_barang/create', $data);         
	   	 $this->load->view('templates/footer');     

	   	}
}