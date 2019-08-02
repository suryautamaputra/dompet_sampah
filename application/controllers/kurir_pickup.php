<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kurir_pickup extends CI_Controller {

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

		$user_id = $this->session->userdata('user_id');

		$date = date('d/m/Y H:i:s');
        $data = array(
                'STATUS_KODE_REF' => 28,
                'UPDATE_BY' => 'Kurir',
                'USERS_USR_ID_AS_KURIR' => $user_id
                
            );
        $where = array(
                'ORD_ID' => $ord_id
            );

        $this->db->where($where);
        $this->db->set('UPDATE_DATE', "to_date('$date','dd/mm/yyyy hh24:mi:ss')", false);
        $this->db->update('ORDERS_HEADER',$data);
        redirect('kurir_proses');
	}
	
}
