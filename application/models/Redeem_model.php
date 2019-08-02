<?php
class Redeem_model extends CI_Model
{

    public function getRedeem($id = null)
    {
        if ($id === null) {
            return $this->db->get('ORDERS_HEADER')->result_array();
        } else {
            return $this->db->get_where('ORDERS_HEADER', ['ORD_ID' => $id])->result_array();
        }
    }

    public function getRedeemByUser($id)
    {
        // if ($id === null) {
        //     // return $this->db->get('ORDERS_HEADER')->result_array();
        // } else {
            $this->db->join('MASTER_GENERAL_REF_DETAIL','REDEEM.ITEM_KODE_REF = MASTER_GENERAL_REF_DETAIL.KODE_GENERAL_REF_DETAIL');
            return $this->db->get_where('REDEEM', ['USERS_USR_ID' => $id])->result_array();
        // }
    }

    public function redeem($data){
        // $this->db->insert('REDEEM', $data);

        $this->db->query("INSERT INTO REDEEM (RDM_POIN, USERS_USR_ID, ITEM_KODE_REF, RDM_TANGGAL, VOUCHER) VALUES (".$data['RDM_POIN'].",
        ".$data['USERS_USR_ID'].", ".$data['ITEM_KODE_REF'].", TO_DATE('".$data['RDM_TANGGAL']."','YYYY-MM-DD HH24:MI:SS'), '".$data['VOUCHER']."')");
        return $this->db->affected_rows();
    }
}
