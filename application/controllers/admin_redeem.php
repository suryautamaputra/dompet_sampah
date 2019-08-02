<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_redeem extends CI_Controller {

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
		$query = $this->db->query("select * FROM REDEEM")->result();

		$reward = $this->db->query("SELECT * FROM MASTER_GENERAL_REF_DETAIL WHERE KODE_GENERAL_REF = 'Kategori'")->result();

		$redeem = $this->db->query("SELECT RDM_ID, RDM_POIN, RDM_TANGGAL,(SELECT DESCRIPTION FROM MASTER_GENERAL_REF_DETAIL WHERE MASTER_GENERAL_REF_DETAIL.KODE_GENERAL_REF_DETAIL = REDEEM.ITEM_KODE_REF) AS REDEEM FROM REDEEM")->result();

        $data = array(
            'semua' => $query,
            'reward' => $reward,
            'redeem' => $redeem
        );

		$this->load->view('templates/header');
		$this->load->view('Admin/redeem', $data);
		$this->load->view('templates/footer');
		
	}
}
