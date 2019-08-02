<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
        parent::__construct();
        $this->load->model('m_kategori');
    }
    
    function index(){
        $x['data']=$this->m_kategori->get_kategori();
        $this->load->view('v_kategori',$x);
    }
 
    function get_subkategori(){
        $id=$this->input->post('id');
        $data=$this->m_kategori->get_subkategori($id);
        echo json_encode($data);
    }

	
	
}
