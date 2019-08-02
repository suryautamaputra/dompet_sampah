<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_order extends CI_Controller {

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
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_kategori');
        $this->load->model('Orders_model', 'orders');
        $this->load->library('session');
    }

	public function index()
	{
		

		$x['user'] = $this->db->get_where('USERS', ['USR_NAMA' => $this->session->userdata('username')])->row_array();
		$x['data']=$this->m_kategori->get_kategori();
		$x['lokasi']=$lokasi = $this->db->query("SELECT * FROM MASTER_GENERAL_REF_DETAIL WHERE KODE_GENERAL_REF = 'Lokasi'")->result();

		/*$data = array(
            'item_sampah' => $item_sampah,
            'kategori_sampah' => $kategori_sampah,
            'satuan_sampah' => $satuan_sampah,
            'lokasi' => $lokasi,
            'semua' => $query,
            
            
        );*/

		$this->load->view('templates/header',$x);
		$this->load->view('User/user_order', $x);
		$this->load->view('templates/footer',$x);
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

    public function add_order($total){
    	$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
    	for($i = 1; $i <= $total; $i++){
        	$this->form_validation->set_rules('itemsampah'.$i, 'Item sampah', 'trim|required');
        	$this->form_validation->set_rules('berat'.$i, 'Berat', 'trim|required');	
    	}
    	$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');

        if ($this->form_validation->run() == false) {
            
			redirect('user_order');
        } else {
            // validasinya success
            $this->session->set_flashdata('message', '<div class="alert alert-info " role="alert" > Sukses </div>');
            $this->_addorder($total);
        }

    }


    private function _addorder($total){
    	$kategori = $this->input->post('kategori');
		// $item_sampah = $this->input->post('itemsampah');
		// $berat = $this->input->post('berat');
		$lokasi = $this->input->post('lokasi');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');

		$list = array();

		for($i = 1; $i <= $total; $i++){
        	$list[] = array('id' => $this->input->post('itemsampah'.$i) , 'estimasi' => $this->input->post('berat'.$i));
    	}
		
		
		
		
		// var_dump("Kategori:"$kategori);
		// var_dump(""$item_sampah);
		// var_dump($berat);
		// var_dump($lokasi);
		// var_dump($date);
		// var_dump($user_id);

		// var_dump(json_encode($list));
		// die;


		$data_header= [
           //"DS_KEY" => "mobile123",
           "TOTAL_ITEM" => $total,
           "ORD_WAKTU" => $date,
           "STATUS" => 10,
           "KODE_KANTOR_CABANG" => 'Aaa',
           "LOKASI_KODE_REF" => $lokasi,
           "USERS_USR_ID_AS_ORDER" => $user_id,
           // "item" => json_encode($list)
        ];



        // var_dump($params);
        // die;

  //       $ord = $this->orders->createOrders($data_header, $list);
  //       var_dump($ord);
  //       die;

		// // $url = 'http://10.110.11.140/dompetsampah_api/api/order';

		// //echo '<br><hr><h2>'.$this->postCURL($url, $params).'</h2><br><hr><br>';

		// $result = $this->postCURL($url, $params);
		// // var_dump($result);
		// // die;
		// $json = json_decode($result, true);

		if($this->orders->createOrders($data_header, $list)) {
   //          $this->session->set_userdata($params);
			redirect('user_order');
			// var_dump("sukses");
			// die;
		} else {
            //$this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert"> Password atau Username Salah! </div>');
			// var_dump("gagal");
		}
		//$this->load->view('form_login');

    }

    function get_subkategori(){
        $id=$this->input->post('id');
        $data=$this->m_kategori->get_subkategori($id);
        echo json_encode($data);
    }
	
}
