<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_timbang extends CI_Controller {

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
		//$id=$this->input->post('ord_id');
		$x['hasil']=$this->db->query("SELECT * FROM ORDERS_DETAIL_VIEW WHERE ORDER_HEADER_ID ='$ord_id'")->result();
		$x['ordId']=$ord_id;
		// var_dump($hasil);
		// die;
		//$data=$this->m_detail->get_detail($ord_id);

		$this->load->view('templates/header');
		$this->load->view('Admin/admin_timbang', $x);
		$this->load->view('templates/footer');
	}

	public function tambah_berat($ordId){

		$ord_detail=$this->db->query("SELECT * FROM ORDERS_DETAIL_VIEW WHERE ORDER_HEADER_ID ='$ordId'")->result();
		$user_id=$this->db->query("SELECT USERS_USR_ID_AS_ORDER FROM ORDERS_HEADER WHERE ORD_ID ='$ordId'")->result();
		$usr_id=$user_id[0]->USERS_USR_ID_AS_ORDER;
		$poin_user=$this->db->query("SELECT USR_POIN FROM USERS WHERE USR_ID ='".$user_id[0]->USERS_USR_ID_AS_ORDER."'")->result();
		$poin=$poin_user[0]->USR_POIN;
		// var_dump(ord_detail_id);
		// die;
		$totalBerat = 0;
		$date = date('d/m/Y');
		foreach ($ord_detail as $data) {
			$totalBerat = $totalBerat + $this->input->post('berat'.$data->ORDDETAIL_ID, true);
			$dt = array(
                'BERAT' => $this->input->post('berat'.$data->ORDDETAIL_ID, true),
                'UPDATE_BY' => 'Admin'
                
            );

       		 $where = array(
                'ORDERS_HEADER_ORD_ID' => $ordId,
                'ORDDETAIL_ID' => $data->ORDDETAIL_ID
            );

        $this->db->where($where);
        $this->db->set('UPDATE_DATE', "to_date('$date','dd/mm/yyyy')", false);
        $this->db->update('ORDERS_DETAIL',$dt);
		}

			$total_poin = $totalBerat*10;

			$dt1 = array(
					'TOTAL_BERAT' => $totalBerat,
					'STATUS_KODE_REF' => 32,
					'UPDATE_BY' => 'Admin',
					'ORD_POIN' => $total_poin,

			);

			$where1 = array(
                'ORD_ID' => $ordId
            );

            $this->db->where($where1);
	        $this->db->set('UPDATE_DATE', "to_date('$date','dd/mm/yyyy')", false);
	        $this->db->update('ORDERS_HEADER',$dt1);

	        //$tpoin_user=$poin_user+$total_poin;

	        $dt2 = array(
					'UPDATE_BY' => 'Admin',
					'USR_POIN' => $poin+$total_poin,

			);

			$where2 = array(
                'USR_ID' => $usr_id
            );

            $this->db->where($where2);
	        $this->db->set('UPDATE_DATE', "to_date('$date','dd/mm/yyyy')", false);
	        $this->db->update('USERS',$dt2);


		// die;
		// $list = array();

		// for($i = 1; $i <= $ordId; $i++){
  //       	$date = date('d/m/Y');
  //       $data = array(
  //               'BERAT' => $this->input->post('berat', true),
  //               'UPDATE_BY' => 'Admin'
                
  //           );
  //       $where = array(
  //               'ORDERs_HEADER_ORD_ID' => $ordId,
  //               'ORDDETAIL_ID' => $ord_detail_id
  //           );

  //       $this->db->where($where);
  //       $this->db->set('UPDATE_DATE', "to_date('$date','dd/mm/yyyy')", false);
  //       $this->db->update('ORDERS_DETAIL',$data);
    	
        redirect('admin_proses');
	}
	
}
