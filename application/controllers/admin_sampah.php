<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_sampah extends CI_Controller {

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
    }

	public function index()
	{
		redirect('admin_sampah/kategori_sampah');
		
	}

    public function kategori_sampah()
    {
        $query = $this->db->query("SELECT * FROM MASTER_GENERAL_REF_DETAIL WHERE KODE_GENERAL_REF = 'Kategori'");
        $hasil = $query->result();

        $data = array(
            'semua' => $hasil
        );
        $this->load->view('templates/header');
        $this->load->view('Admin/kategori_sampah', $data);
        $this->load->view('templates/footer');

    }

    public function item_sampah()
    {
        $query_item_sampah = $this->db->query("SELECT * FROM ITEM_SAMPAH");
        $hasil_item_sampah = $query_item_sampah->result();

        /*$query = $this->db->query("SELECT ITEM_SAMPAH.ISM_ID, ITEM_SAMPAH.ISM_NAMA, MASTER_GENERAL_REF_DETAIL.DESCRIPTION
                                    FROM ITEM_SAMPAH, MASTER_GENERAL_REF_DETAIL
                                    WHERE ITEM_SAMPAH.KATEGORI_KODE_REF = MASTER_GENERAL_REF_DETAIL.KODE_GENERAL_REF_DETAIL");
        $hasil = $query->result();

        $satuan = $this->db->query("SELECT ITEM_SAMPAH.ISM_ID, ITEM_SAMPAH.ISM_NAMA, MASTER_GENERAL_REF_DETAIL.DESCRIPTION 
                                    FROM ITEM_SAMPAH, MASTER_GENERAL_REF_DETAIL
                                    WHERE ITEM_SAMPAH.SATUAN_KODE_REF = MASTER_GENERAL_REF_DETAIL.KODE_GENERAL_REF_DETAIL")->result();*/
        $ism = $this->db->query("SELECT ISM_NAMA, ISM_ID, (SELECT DESCRIPTION FROM MASTER_GENERAL_REF_DETAIL WHERE MASTER_GENERAL_REF_DETAIL.KODE_GENERAL_REF_DETAIL = ITEM_SAMPAH.KATEGORI_KODE_REF) AS KATEGORI, (SELECT DESCRIPTION FROM MASTER_GENERAL_REF_DETAIL WHERE MASTER_GENERAL_REF_DETAIL.KODE_GENERAL_REF_DETAIL = ITEM_SAMPAH.SATUAN_KODE_REF) AS SATUAN FROM ITEM_SAMPAH")->result();

        $kategori_sampah = $this->db->query("SELECT * FROM MASTER_GENERAL_REF_DETAIL WHERE KODE_GENERAL_REF = 'Kategori'")->result();
        $satuan_sampah = $this->db->query("SELECT * FROM MASTER_GENERAL_REF_DETAIL WHERE KODE_GENERAL_REF = 'Satuan'")->result();

        $data = array(
            'semua_query' => $hasil_item_sampah,
            //'semua' => $hasil,
            'kategori_sampah' => $kategori_sampah,
            //'satuan' => $satuan,
            'satuan_sampah' => $satuan_sampah,
            'ism_s' => $ism
            
        );

        /*$data2 = array(
            'satuan' => $satuan,
            'satuan_sampah' => $satuan_sampah
        );*/
        
        $this->load->view('templates/header');
        $this->load->view('Admin/item_sampah', $data);
        $this->load->view('templates/footer');

    }

    public function satuan()
    {
        $query = $this->db->query("SELECT * FROM MASTER_GENERAL_REF_DETAIL WHERE KODE_GENERAL_REF = 'Satuan'");
        $satuan_sampah = $query->result();

        $data = array(
            'satuan_sampah' => $satuan_sampah
        );
        $this->load->view('templates/header');
        $this->load->view('Admin/satuan', $data);
        $this->load->view('templates/footer');

    }

    public function tambah_kategori_sampah() 
    {
        $date = date('d/m/Y');
        //$date2 = $this->db->set(date('d/m/Y'),"to_date('$date','dd/mm/yyyy')",false);
        //$timestamp = date('m/d/Y');
        //$timestamp = "TO_DATE($timestamp,'mm/dd/yyyy')";
        $data = array(
                'KODE_CABANG' => 1,
                'KODE_TERMINAL' => 'A',
                'KODE_GENERAL_REF' => 'Kategori',
                'DESCRIPTION' => htmlspecialchars($this->input->post('kategori_sampah_baru', true)),
                'STATUS' => 1,
                'CREATED_BY' => 'Admin',
                //'CREATED_DATE' => $timestamp,
                'PROGRAM_NAME' => 'Admin'
            );
        $this->db->set('CREATED_DATE', "to_date('$date','dd/mm/yyyy')", false);
        $this->db->insert('MASTER_GENERAL_REF_DETAIL', $data);
        redirect('admin_sampah/kategori_sampah');
    }

    public function tambah_item_sampah() 
    {
        $date = date('d/m/Y');
        $data = array(
                'ISM_NAMA' => htmlspecialchars($this->input->post('item_sampah_baru', true)),
                'CREATED_BY' => 'Admin',
                'PROGRAM_NAME' => 'Admin',
                'KATEGORI_KODE_REF' => $this->input->post('ksm_id', true),
                'SATUAN_KODE_REF' => $this->input->post('ssm_id', true)
            );
        $this->db->set('CREATED_DATE', "to_date('$date','dd/mm/yyyy')", false);
        $this->db->insert('ITEM_SAMPAH', $data);
        redirect('admin_sampah/item_sampah');
    }


    public function edit_kategori_sampah_e($id)
    {
        $data['get_subkategori'] =$this->m_kategori->get_subkategori_e($id);
        $this->load->view('templates/header');
        $this->load->view('Admin/e_kat_sampah', $data);
        $this->load->view('templates/footer');


    }

    public function edit_kategori_sampah()
    {

        $date = date('d/m/Y');
        $data = array(
                'DESCRIPTION' => htmlspecialchars($this->input->post('kategori_sampah_edit', true)),
                'UPDATE_BY' => 'Admin'
                //'UPDATE_DATE' => $timestamp
            );
        $where = array(
                'KODE_GENERAL_REF_DETAIL' => $this->input->post('ksm_id', true)
            );
        $this->db->where($where);
        $this->db->set('UPDATE_DATE', "to_date('$date','dd/mm/yyyy')", false);
        $this->db->update('MASTER_GENERAL_REF_DETAIL',$data);
        redirect('admin_sampah/kategori_sampah');
    }

    public function hapus_kategori_sampah()
    {
        $where = array(
                'KODE_GENERAL_REF_DETAIL' => $this->input->post('ksm_id', true)
            );
        $this->db->where($where);
        $this->db->delete('MASTER_GENERAL_REF_DETAIL');
        redirect('admin_sampah/kategori_sampah');
    }

    public function edit_item_sampah()
    {
        $date = date('d/m/Y');
        $data = array(
                'ISM_NAMA' => htmlspecialchars($this->input->post('item_sampah_edit', true)),
                'UPDATE_BY' => 'Admin',
                'KATEGORI_KODE_REF' => $this->input->post('ksm_id_edit', true),
                'SATUAN_KODE_REF' => $this->input->post('ssm_id_edit', true)
            );
        $where = array(
                'ISM_ID' => $this->input->post('ism_id', true)
            );
        $this->db->where($where);
        $this->db->set('UPDATE_DATE', "to_date('$date','dd/mm/yyyy')", false);
        $this->db->update('ITEM_SAMPAH',$data);
        redirect('admin_sampah/item_sampah');
    }

    public function hapus_item_sampah()
    {
        $where = array(
                'ISM_ID' => $this->input->post('ism_id', true)
            );
        $this->db->where($where);
        $this->db->delete('ITEM_SAMPAH');
        redirect('admin_sampah/item_sampah');
    }

    public function tambah_satuan()
    {
        $date = date('d/m/Y');
        $data = array(
                'KODE_CABANG' => 1,
                'KODE_TERMINAL' => 'A',
                'KODE_GENERAL_REF' => 'Satuan',
                'DESCRIPTION' => htmlspecialchars($this->input->post('satuan_baru', true)),
                'STATUS' => 1,
                'CREATED_BY' => 'Admin',
                'PROGRAM_NAME' => 'Admin'
            );
        $this->db->set('CREATED_DATE', "to_date('$date','dd/mm/yyyy')", false);
        $this->db->insert('MASTER_GENERAL_REF_DETAIL', $data);
        redirect('admin_sampah/satuan');
    }

    public function edit_satuan()
    {
        $date = date('d/m/Y');
        $data = array(
                'DESCRIPTION' => htmlspecialchars($this->input->post('satuan_edit', true)),
                'UPDATE_BY' => 'Admin'
            );
        $where = array(
                'KODE_GENERAL_REF_DETAIL' => $this->input->post('satuan_id', true)
            );
        $this->db->where($where);
        $this->db->set('UPDATE_DATE', "to_date('$date','dd/mm/yyyy')", false);
        $this->db->update('MASTER_GENERAL_REF_DETAIL',$data);
        redirect('admin_sampah/satuan');
    }

    public function hapus_satuan()
    {
        $where = array(
                'KODE_GENERAL_REF_DETAIL' => $this->input->post('satuan_id', true)
            );
        $this->db->where($where);
        $this->db->delete('MASTER_GENERAL_REF_DETAIL');
        redirect('admin_sampah/satuan');
    }


	
}
