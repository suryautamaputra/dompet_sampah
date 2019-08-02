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
        
        //$this->load->view('form_login',$data);


        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|callback_check_captcha|required');

        if ($this->form_validation->run() == false) {
            
            // var_dump('masul');
            // die;
            $this->load->view('form_login', array('img' => $this->create_captcha()));
        } else {
           
            // validasinya success
            // var_dump($data);
            // die;
            $this->_login();

        }
	}

	
    private function _login(){
    	$username = $this->input->post('username');
        $password = $this->input->post('password');

        //get_where(nama_tabel_database, konsidi)
        $user = $this->db->get_where('USERS', ['USR_NAMA' => $username])->row_array();
        //$pegawai = $this->db->get_where('pegawai', ['id_pegawai' => $user['id_pegawai']])->row_array();
        //$departemen = $this->db->get_where('departemen', ['id_departemen' => $user['id_departemen']])->row_array();

        if ($user) {
            //echo "bvfhbvhf";
            if (password_verify($password, $user['USR_PASSWORD'])) {
                //var_dump($user);
                $data = [
                    'user_id'  => $user['USR_ID'],
                    'username' => $user['USR_NAMA'],
                    'poin'     => $user['USR_POIN'],
                    'order'    => $user['AS_ORDER'],
                    'kurir'    => $user['AS_KURIR'],
                    'admin'    => $user['AS_ADMIN'],
                    'tengkulak'   => $user['AS_TENGKULAK']
                ];

                //echo "<br>jkl";
                $this->session->set_userdata($data);
                if ($this->session->userdata('order') == 1) {
                    redirect('user_order');
                } elseif ($this->session->userdata('admin') == 1) {
                    redirect('admin_sampah');
                } elseif ($this->session->userdata('kurir') == 1) {
                    redirect('kurir_proses');
                }
            }
            else
            {   
                //echo "qwerty";
                //redirect('auth');
            }
			
		} else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Password atau Username Salah! </div>');
            // var_dump("haha");
            // die;
			redirect('Login');
		}
		//$this->load->view('form_login');

    }

    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        redirect('Login');
    }

    public function create_captcha()
    {
        $options = array(
           'img_path' => './capimg/',
           'img_url' => '/dompet_sampah/capimg/',
           'img_width' => 250,
           'img_height' => 45,
           'word_length' => 4
           //'expiration' => 7200
        );
        $cap = create_captcha($options);
        $image = $cap['image'];

        $this->session->set_userdata('captchaword',$cap['word']);
        
        return $image;
    }

    public function check_captcha()
    {
        if ($this->input->post('captcha') == $this->session->userdata('captchaword')) 
        {
            // var_dump($this->input->post('captcha'));
            // var_dump($this->session->userdata('captchaword'));
            // die;
            return true;
        }
        else
        {
            $this->session->set_flashdata('check_captcha', '<div class="alert alert-warning" role="alert"> Captcha Salah! </div>');
            return false;
        }
    }
	
}
