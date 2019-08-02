<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_history_order extends CI_Controller {

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
	public function index()
	{
		$query = $this->db->query("SELECT * FROM ORDERS_VIEW2 WHERE STATUS = 'Sudah Ditimbang'");
        $hasil = $query->result();

        $order = $this->db->query("SELECT ORD_ID, TOTAL_BERAT, TOTAL_ITEM, ORD_WAKTU, ORD_POIN, 
								  (SELECT DESCRIPTION FROM MASTER_GENERAL_REF_DETAIL WHERE MASTER_GENERAL_REF_DETAIL.KODE_GENERAL_REF_DETAIL = ORDERS_HEADER.STATUS_KODE_REF) AS STATUS 
								   FROM ORDERS_HEADER")->result();

        $data = array(
            'semua' => $hasil,
            'order' => $order
        );

		$this->load->view('templates/header');
		$this->load->view('User/user_history_order', $data);
		$this->load->view('templates/footer');
	}
	
}
