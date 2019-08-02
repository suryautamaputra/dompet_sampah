<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_reward extends CI_Controller {

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

        $data = array(
            'semua' => $hasil
        );
		
		$this->load->view('templates/header');
		$this->load->view('Admin/reward', $data);
		$this->load->view('templates/footer');
		
	}

	public function tambah_reward()
	{
		$date = date('d/m/Y');
		$data = array(
                //'RWD_NAMA' => htmlspecialchars($this->input->post('reward_baru', true)),
                //'RWD_POIN' => $this->input->post('poin', true)
				'KODE_CABANG' => 1,
                'KODE_TERMINAL' => 'A',
                'KODE_GENERAL_REF' => 'Reward',
                'DESCRIPTION' => htmlspecialchars($this->input->post('reward_baru', true)),
                'VALUE' => $this->input->post('poin', true),
                'PATH' => $this->input->post('link', true),
                'STATUS' => 1,
                'CREATED_BY' => 'Admin',
                //'CREATED_DATE' => $timestamp,
                'PROGRAM_NAME' => 'Admin'

            );
		$this->db->set('CREATED_DATE', "to_date('$date','dd/mm/yyyy')", false);
        $this->db->insert('MASTER_GENERAL_REF_DETAIL', $data);
        redirect('admin_reward');
	}

	public function edit_reward()
	{
		$date = date('d/m/Y');
        $data = array(
                'DESCRIPTION' => htmlspecialchars($this->input->post('reward_edit', true)),
                'VALUE' => $this->input->post('poin_edit', true),
                'PATH' => $this->input->post('link_edit', true),
                'UPDATE_BY' => 'Admin'
                //'UPDATE_DATE' => $timestamp
            );
        $where = array(
                'KODE_GENERAL_REF_DETAIL' => $this->input->post('rwd_id', true)
            );
        $this->db->where($where);
        $this->db->set('UPDATE_DATE', "to_date('$date','dd/mm/yyyy')", false);
        $this->db->update('MASTER_GENERAL_REF_DETAIL',$data);
        redirect('admin_reward');
	}

	public function hapus_reward()
	{
		$where = array(
                'KODE_GENERAL_REF_DETAIL' => $this->input->post('reward_id', true)
            );
        $this->db->where($where);
        $this->db->delete('MASTER_GENERAL_REF_DETAIL');
        redirect('admin_reward');
	}
}
