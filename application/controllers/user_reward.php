<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_reward extends CI_Controller {

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
		$query = $this->db->query("SELECT * FROM MASTER_GENERAL_REF_DETAIL WHERE KODE_GENERAL_REF = 'Reward'");
        $hasil = $query->result();
        $user_id = $this->session->userdata('user_id');
        $x= $this->db->query("SELECT USR_POIN FROM USERS WHERE USR_ID = '$user_id'")->result();

        $data = array(
            'semua' => $hasil,
            'poin' => $x
        );

		$this->load->view('templates/header');
		$this->load->view('User/user_reward', $data);
		$this->load->view('templates/footer');
	}
	
}
