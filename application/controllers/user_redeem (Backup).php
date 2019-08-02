<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_redeem extends CI_Controller {

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
	function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Redeem_model', 'redeem');
    }

	public function index($item_id, $poin)
	{   
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');

		$params= array(
           "DS_KEY" => "mobile123",
           "poin"	=> $poin,
           "item_id" => $item_id,
           "user_id" => $user_id,
           "tanggal" => $date
        );

		$url = 'http://10.110.11.140/dompetsampah_api/api/redeem';

		$result = $this->postCURL($url, $params);
		$json = json_decode($result, true);
		// var_dump($params);
		// die;
		if($json['status'] == true) {
			//redirect('user_reward');
			$this->pdf($json['data']['VOUCHER']);
		} else {
            //$this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert"> Password atau Username Salah! </div>');
			// var_dump("gagal");
		}
		//$this->load->view('form_login');

		//redirect('user_reward');
	}

	public function postCURL($_url, $_param){

        $postData = '';
        //create name value pairs seperated by &
        foreach($_param as $k => $v) 
        { 
          $postData .= $k . '='.$v.'&'; 
        }
        rtrim($postData, '&');


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    

        $output=curl_exec($ch);

        curl_close($ch);

        return $output;
    }

    public function pdf($voucher){
    	$date = date('Y-m-d');

		$pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,$voucher,0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'VOUCHER BERLAKU TANGGAL '.$date,0,1,'C');
        // // Memberikan space kebawah agar tidak terlalu rapat
        // $pdf->Cell(10,7,'',0,1);
        // $pdf->SetFont('Arial','B',10);
        // $pdf->Cell(20,6,'NIM',1,0);
        // $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
        // $pdf->Cell(27,6,'NO HP',1,0);
        // $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        // $pdf->SetFont('Arial','',10);
        // $mahasiswa = $this->db->get('mahasiswa')->result();
        // foreach ($mahasiswa as $row){
        //     $pdf->Cell(20,6,$row->nim,1,0);
        //     $pdf->Cell(85,6,$row->nama_lengkap,1,0);
        //     $pdf->Cell(27,6,$row->no_hp,1,0);
        //     $pdf->Cell(25,6,$row->tanggal_lahir,1,1); 
        // }
        $pdf->Output();

    }

	
}
