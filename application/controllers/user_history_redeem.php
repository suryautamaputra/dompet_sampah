<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_history_redeem extends CI_Controller {

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
    }

	public function index()
	{
		$query = $this->db->query("SELECT RDM_ID, RDM_POIN, RDM_TANGGAL, USERS_USR_ID, ITEM_KODE_REF, VOUCHER, 
								  (SELECT DESCRIPTION FROM MASTER_GENERAL_REF_DETAIL WHERE MASTER_GENERAL_REF_DETAIL.KODE_GENERAL_REF_DETAIL = REDEEM.ITEM_KODE_REF) AS REWARD 
								   FROM REDEEM");
        $hasil = $query->result();
        //$x= $this->db->query("SELECT USR_POIN FROM USERS")->result();

        $data = array(
            'semua' => $hasil,
            //'poin' => $x
        );

		$this->load->view('templates/header');
		$this->load->view('User/user_history_redeem', $data);
		$this->load->view('templates/footer');
	} 
	
	public function pdf($id){
		$redeem = $this->db->query("SELECT RDM_TANGGAL, VOUCHER FROM REDEEM WHERE RDM_ID = '$id'")->result();
		$tanggal = $redeem[0]->RDM_TANGGAL;
		$voucher = $redeem[0]->VOUCHER;

    	$date = date('Y-m-d');

		$pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,$voucher,0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'VOUCHER BERLAKU TANGGAL '.$tanggal,0,1,'C');
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
