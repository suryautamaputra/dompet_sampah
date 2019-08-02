<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->library('session');
        $this->load->helper(array('captcha','form'));
    }

	public function index()
	{
		
		
        /*if ($this->session->userdata('username')) {
            redirect('user');
        }*/ 
        $vals = array(
           'img_path' => './capimg/',
           'img_url' => '/dompet_sampah/capimg/',
           'img_width' => 250,
           'img_height' => 45
        );
        $cap = create_captcha($vals);
        $this->session->set_userdata('keycode',md5($cap['word']));
        $data['captcha_img'] = $cap['image'];
        //$this->load->view('form_login',$data);


        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            
            $this->load->view('form_login', $data);
        } else {
            // validasinya success
            // var_dump($data);
            // die;
            $this->_login();

        }
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
    private function _login(){
    	$username = $this->input->post('username');
		$password = $this->input->post('password');

		$params= array(
           "DS_KEY" => "mobile123",
           "name" => $username,
           "pass" => $password
        );
		$url = 'http://10.110.11.140/dompetsampah_api/api/login';

		//echo '<br><hr><h2>'.$this->postCURL($url, $params).'</h2><br><hr><br>';

		$result = $this->postCURL($url, $params);
		$json = json_decode($result, true);

		if($json['status'] === true) {
            $this->session->set_userdata(array(
                'user_id'  => $json['message']['id'],
                'username' => $json['message']['name'],
                'poin'     => $json['message']['poin'],
                'order'     => $json['message']['as_order'],
                'kurir'   => $json['message']['as_kurir'],
                'tengkulak'   => $json['message']['as_tengkulak'],
            ));
			redirect('user_order');
		} else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Password atau Username Salah! </div>');
			redirect('Login');
		}
		//$this->load->view('form_login');

    }

    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        redirect('Login');
    }
	
}
