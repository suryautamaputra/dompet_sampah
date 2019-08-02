<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_detail extends CI_Model {

	function get_detail($id){
        $hasil=$this->db->query("SELECT * FROM ORDERS_DETAIL_VIEW WHERE ORDER_HEADER_ID ='$id'");
        return $hasil->result();
    }

}