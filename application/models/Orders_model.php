<?php
class Orders_model extends CI_Model
{

    public function getOrder($id = null)
    {
        if ($id === null) {
            $this->db->order_by('ORD_WAKTU', 'DESC');
            $this->db->join('USERS', 'USERS.USR_ID = ORDERS_VIEW.USER_ID');
            return $this->db->get('ORDERS_VIEW')->result_array();
        } else {
            $this->db->join('USERS', 'USERS.USR_ID = ORDERS_VIEW.USER_ID');
            return $this->db->get_where('ORDERS_VIEW', ['ORD_ID' => $id])->result_array();
        }
    }

    public function getOrderByUser($id)
    {
        // if ($id === null) {
        //     // return $this->db->get('ORDERS_HEADER')->result_array();
        // } else {
        $this->db->join('MASTER_GENERAL_REF_DETAIL', 'ORDERS_HEADER.STATUS_KODE_REF = MASTER_GENERAL_REF_DETAIL.KODE_GENERAL_REF_DETAIL');
        $this->db->order_by('ORD_WAKTU', 'DESC');
        return $this->db->get_where('ORDERS_HEADER', ['USERS_USR_ID_AS_ORDER' => $id])->result_array();
        // }
    }

    public function createOrders($data_headers, $data_details)
    {
        $this->db->query("insert into  ORDERS_HEADER (TOTAL_ITEM, ORD_WAKTU, STATUS_KODE_REF, KODE_KANTOR_CABANG, LOKASI_KODE_REF, USERS_USR_ID_AS_ORDER) VALUES (" . $data_headers['TOTAL_ITEM'] . ", TO_DATE('" . $data_headers['ORD_WAKTU'] . "','YYYY-MM-DD HH24:MI:SS'), '" . $data_headers['STATUS'] . "', '" . $data_headers['KODE_KANTOR_CABANG'] . "', " . $data_headers['LOKASI_KODE_REF'] . ", " . $data_headers['USERS_USR_ID_AS_ORDER'] . ")");

        // var_dump("insert into  ORDERS_HEADER (TOTAL_ITEM, ORD_WAKTU, STATUS_KODE_REF, KODE_KANTOR_CABANG, LOKASI_KODE_REF, USERS_USR_ID_AS_ORDER) VALUES (" . $data_headers['TOTAL_ITEM'] . ", TO_DATE('" . $data_headers['ORD_WAKTU'] . "','YYYY-DD-MM HH:MI:SS'), '" . $data_headers['STATUS'] . "', '" . $data_headers['KODE_KANTOR_CABANG'] . "', " . $data_headers['LOKASI_KODE_REF'] . ", " . $data_headers['USERS_USR_ID_AS_ORDER'] . ")");
        // die;
        $last_id = $this->db->query("SELECT MAX (ORD_ID) AS ID FROM ORDERS_HEADER");
        $last_id = $last_id->result();
        $last_id = $last_id[0]->ID;

        $header_id = $last_id;
        foreach ($data_details as $data) {
            $dt = [
                'ORDERS_HEADER_ORD_ID' => $header_id,
                'ITEM_SAMPAH_ISM_ID' => $data["id"],
                'ESTIMASI_BERAT' => $data["estimasi"]
            ];
            $this->db->insert('ORDERS_DETAIL', $dt);
        }
        return $this->db->affected_rows();
    }

    public function getDetail($id)
    {
        $result = $this->db->query("SELECT ORDDETAIL_ID, ISM_NAMA, BERAT, ESTIMASI_BERAT,
        (SELECT DESCRIPTION FROM MASTER_GENERAL_REF_DETAIL WHERE MASTER_GENERAL_REF_DETAIL.KODE_GENERAL_REF_DETAIL = ITEM_SAMPAH.KATEGORI_KODE_REF) AS KATEGORI, 
        (SELECT DESCRIPTION FROM MASTER_GENERAL_REF_DETAIL WHERE MASTER_GENERAL_REF_DETAIL.KODE_GENERAL_REF_DETAIL = ITEM_SAMPAH.SATUAN_KODE_REF) AS SATUAN 
        FROM ORDERS_DETAIL
        JOIN ITEM_SAMPAH ON ITEM_SAMPAH.ISM_ID = ORDERS_DETAIL.ITEM_SAMPAH_ISM_ID
        WHERE ORDERS_HEADER_ORD_ID = " . $id)->result_array();

        // $this->db->join('ITEM_SAMPAH','ORDERS_DETAIL.ITEM_SAMPAH_ISM_ID = ITEM_SAMPAH.ISM_ID');
        return $result;
    }

    public function getOrderOngoing($id = null)
    {
        if ($id === null) {
            $this->db->join('USERS', 'USERS.USR_ID = ORDERS_VIEW.USER_ID');
            $this->db->order_by('ORD_WAKTU', 'DESC');
            return $this->db->get_where('ORDERS_VIEW', ['STATUS' => 'Menunggu Kurir'])->result_array();
        } else {
            $this->db->order_by('ORD_WAKTU', 'DESC');
            return $this->db->get_where('ORDERS_VIEW', ['USER_ID' => $id, 'STATUS' => 'Menunggu Kurir'])->result_array();
        }
    }

    public function getOrderHistoryByUser($id, $dateStart, $dateEnd)
    {
        // if ($id === null) {
        //     // return $this->db->get('ORDERS_HEADER')->result_array();
        // } else {
        if ($dateStart === null && $dateEnd === null) {
            $this->db->order_by('ORD_WAKTU', 'DESC');
            return $this->db->get_where('ORDERS_VIEW', ['USER_ID' => $id, 'STATUS !=' => 'Menunggu Kurir'])->result_array();
        } else {
            $this->db->order_by('ORD_WAKTU', 'DESC');
            return $this->db->query("select * from ORDERS_VIEW where ORD_WAKTU >= to_date('" . $dateStart . "','YYYY-MM-DD') and ORD_WAKTU <= to_date('" . $dateEnd . "','YYYY-MM-DD') and USER_ID = " . $id . "and STATUS != 'Menunggu Kurir'")->result_array();
        }

        // }
    }

    public function getOrderHistoryByCourier($id, $dateStart= null, $dateEnd = null)
    {
        // if ($id === null) {
        //     // return $this->db->get('ORDERS_HEADER')->result_array();
        // } else {
        if ($dateStart === null && $dateEnd === null) {
            $this->db->order_by('ORD_WAKTU', 'DESC');
            return $this->db->get_where('ORDERS_VIEW', ['KURIR_ID' => $id, 'STATUS !=' => 'Menunggu Kurir'])->result_array();
        } else {
            $this->db->order_by('ORD_WAKTU', 'DESC');
            return $this->db->query("select * from ORDERS_VIEW where ORD_WAKTU >= to_date('" . $dateStart . "','YYYY-MM-DD') and ORD_WAKTU <= to_date('" . $dateEnd . "','YYYY-MM-DD') and KURIR_ID = " . $id . "and STATUS != 'Menunggu Kurir'")->result_array();
        }

        // }
    }

    public function updateKurir($idOrder, $idKurir)
    {
        $data = array(
            'USERS_USR_ID_AS_KURIR' => $idKurir,
        );

        $this->db->where('ORD_ID', $idOrder);
        return $this->db->update('ORDERS_HEADER', $data);
    }

    public function updatePoint($idOrder, $point)
    {
        $data = array(
            'ORD_POIN' => $point,
        );

        $this->db->where('ORD_ID', $idOrder);
        return $this->db->update('ORDERS_HEADER', $data);
    }

    public function updateRatingKurir($id, $rating)
    {
        $data = array(
            'RATING_KURIR' => $rating,
        );

        $this->db->where('ORD_ID', $id);
        return $this->db->update('ORDERS_HEADER', $data);
    }

    public function updateStatus($id, $status)
    {
        $data = array(
            'STATUS_KODE_REF' => $status,
        );

        $this->db->where('ORD_ID', $id);
        return $this->db->update('ORDERS_HEADER', $data);
    }
}
