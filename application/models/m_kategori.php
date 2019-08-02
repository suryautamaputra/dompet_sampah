<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kategori extends CI_Model {

	function get_kategori(){
        $hasil=$this->db->query("SELECT * FROM MASTER_GENERAL_REF_DETAIL WHERE KODE_GENERAL_REF = 'Kategori'");
        return $hasil;
    }
 
    function get_subkategori($id){
        $hasil=$this->db->query("SELECT * FROM ITEMS_VIEW WHERE KATEGORI_KODE_REF='$id'");
        	//SELECT * FROM subkategori WHERE subkategori_kategori_id='$id'");
        return $hasil->result();
    }
    function get_subkategori_e($data){
        $hasil=$this->db->query("SELECT * FROM MASTER_GENERAL_REF_DETAIL WHERE KODE_GENERAL_REF_DETAIL='$data'");
        	//SELECT * FROM subkategori WHERE subkategori_kategori_id='$id'");
        return $hasil->result();
    }


}