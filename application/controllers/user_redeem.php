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
        $this->load->model('Redeem_model','redeem');
        $this->load->model('Users_model','users');
    }

	public function index($item_id, $poin)
	{   
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');

		// $params= array(
  //          "DS_KEY" => "mobile123",
  //          "poin"	=> $poin,
  //          "item_id" => $item_id,
  //          "user_id" => $user_id,
  //          "tanggal" => $date
  //       );

		// $url = 'http://10.110.11.140/dompetsampah_api/api/redeem';
        $users =$this->users->getUsers($user_id);
        $users = $users[0];

		// $result = $this->postCURL($url, $params);
		// $json = json_decode($result, true);
		// var_dump($params);
		// die;
		if($users['USR_POIN'] - $poin < 0) {
			//redirect('user_reward');
			//Poin not enough
		} else {
             $voucher = $this->generateRandomString();

            $data = [
                'RDM_POIN' => $poin,
                'USERS_USR_ID' => $user_id,
                'ITEM_KODE_REF' => $item_id,
                'RDM_TANGGAL' => $date,
                'VOUCHER' => $voucher
            ];

            if ($this->redeem->redeem($data) > 0) {
                $updt_point = $users['USR_POIN'] - $poin;
                $dt = [
                    'USR_POIN' => $updt_point,
                ];
                $data = array_merge($data,$dt);
                if ($this->users->updateUsers($dt, $user_id) > 0) {
                    $this->pdf($voucher);

                    // $this->response([
                    //     'status' => TRUE,
                    //     'message' => 'Redeem Succeed',
                    //     'data' => $data 
                    // ], REST_Controller::HTTP_OK);
                } else {
                    //Failed to update!
                }
            }else{
               //ERROR
            }
            //$this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert"> Password atau Username Salah! </div>');
			// var_dump("gagal");
		}
		//$this->load->view('form_login');

		//redirect('user_reward');
	}
//Generate Random string Vocer//
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

	// public function postCURL($_url, $_param){

 //        $postData = '';
 //        //create name value pairs seperated by &
 //        foreach($_param as $k => $v) 
 //        { 
 //          $postData .= $k . '='.$v.'&'; 
 //        }
 //        rtrim($postData, '&');


 //        $ch = curl_init();
 //        curl_setopt($ch, CURLOPT_URL,$_url);
 //        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
 //        curl_setopt($ch, CURLOPT_HEADER, false); 
 //        curl_setopt($ch, CURLOPT_POST, count($postData));
 //        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    

 //        $output=curl_exec($ch);

 //        curl_close($ch);

 //        return $output;
 //    }

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
        
        $pdf->Output();

    }

	
}
