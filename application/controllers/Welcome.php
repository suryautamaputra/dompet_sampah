<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		redirect('Login');
	}
	/**public function kategori_sampah()
	{
		$this->load->view('Admin/kategori_sampah');
	}
	public function item_sampah()
	{
		$this->load->view('Admin/item_sampah');
	}
	public function lokasi()
	{
		$query = $this->db->query("select * FROM LOKASI");
		$hasil = $query->result();
		//var_dump($hasil);
		//die;

		$data = array(
			'semua' => $hasil
		);

		$this->load->view('Admin/lokasi', $data);
	}
	public function kurir()
	{
		$this->load->view('Admin/kurir');

	}
	public function order()
	{
		$this->load->view('Admin/order');
	}
	public function reward()
	{
		$this->load->view('Admin/reward');
	}
	public function redeem()
	{
		$this->load->view('Admin/redeem');
	}
	public function user_order()
	{
		$this->load->view('User/user_order');
	}**/
}
