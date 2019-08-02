<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_lokasi extends CI_Controller {

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
		$query = $this->db->query("SELECT * FROM MASTER_GENERAL_REF_DETAIL WHERE KODE_GENERAL_REF = 'Lokasi'");
        $hasil = $query->result();
        //var_dump($hasil);
        //die;

        $data = array(
            'semua' => $hasil
        );

        $this->load->view('templates/header');
		$this->load->view('Admin/lokasi', $data);
		$this->load->view('templates/footer');
		
	}

	public function tambah_lokasi() 
    {
        $date = date('d/m/Y');
        $data = array(
                //'LKS_NAMA' => htmlspecialchars($this->input->post('lokasi_baru', true))
        		'KODE_CABANG' => 1,
                'KODE_TERMINAL' => 'A',
                'KODE_GENERAL_REF' => 'Lokasi',
                'DESCRIPTION' => htmlspecialchars($this->input->post('lokasi_baru', true)),
                'STATUS' => 1,
                'CREATED_BY' => 'Admin',
                //'CREATED_DATE' => $timestamp,
                'PROGRAM_NAME' => 'Admin'
            );
        $this->db->set('CREATED_DATE', "to_date('$date','dd/mm/yyyy')", false);
        $this->db->insert('MASTER_GENERAL_REF_DETAIL', $data);
        redirect('admin_lokasi');
    }

    public function edit_lokasi()
    {
    	$date = date('d/m/Y');
        $data = array(
                'DESCRIPTION' => htmlspecialchars($this->input->post('lokasi_edit', true)),
                'UPDATE_BY' => 'Admin'
                //'UPDATE_DATE' => $timestamp
            );
        $where = array(
                'KODE_GENERAL_REF_DETAIL' => $this->input->post('lks_id', true)
            );
        $this->db->where($where);
        $this->db->set('UPDATE_DATE', "to_date('$date','dd/mm/yyyy')", false);
        $this->db->update('MASTER_GENERAL_REF_DETAIL',$data);
        redirect('admin_lokasi');
    }

    public function hapus_lokasi()
    {
    	$where = array(
                'KODE_GENERAL_REF_DETAIL' => $this->input->post('lks_id', true)
            );
        $this->db->where($where);
        $this->db->delete('MASTER_GENERAL_REF_DETAIL');
        redirect('admin_lokasi');
    }

}
