<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_detail_history extends CI_Controller {

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
	public function index($ord_id)
	{
		//$id=$this->input->post('ord_id');
		$x['hasil']=$this->db->query("SELECT * FROM ORDERS_DETAIL_VIEW WHERE ORDER_HEADER_ID ='$ord_id'")->result();
		// var_dump($hasil);
		// die;
		//$data=$this->m_detail->get_detail($ord_id);

		$this->load->view('templates/header');
		$this->load->view('User/user_detail_history', $x);
		$this->load->view('templates/footer');
	}
	
}
