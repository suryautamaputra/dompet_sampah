<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_proses_edit extends CI_Controller {

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
		$x['hasil']=$this->db->query("SELECT * FROM MASTER_GENERAL_REF_DETAIL WHERE KODE_GENERAL_REF = 'Status Order'")->result();
		$x['order'] = $this->db->query("SELECT ORD_ID, TOTAL_BERAT, TOTAL_ITEM, ORD_WAKTU, ORD_POIN, STATUS_KODE_REF, 
								  (SELECT DESCRIPTION FROM MASTER_GENERAL_REF_DETAIL WHERE MASTER_GENERAL_REF_DETAIL.KODE_GENERAL_REF_DETAIL = ORDERS_HEADER.STATUS_KODE_REF) AS STATUS 
								   FROM ORDERS_HEADER WHERE ORD_ID ='$ord_id'")->result();
		// var_dump($hasil);
		// die;
		//$data=$this->m_detail->get_detail($ord_id);

		$this->load->view('templates/header');
		$this->load->view('Admin/proses_edit', $x);
		$this->load->view('templates/footer');
	}

	public function edit_status()
    {

        $date = date('d/m/Y H:i:s');
        $data = array(
                'STATUS_KODE_REF' => $this->input->post('status_edit', true),
                'UPDATE_BY' => 'Admin'
                //'UPDATE_DATE' => $timestamp
            );
        $where = array(
                'ORD_ID' => $this->input->post('status', true)
            );
        $this->db->where($where);
        $this->db->set('UPDATE_DATE', "to_date('$date','dd/mm/yyyy hh24:mi:ss')", false);
        $this->db->update('ORDERS_HEADER',$data);
        redirect('admin_proses');
    }
	
}
