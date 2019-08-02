<?php
class Users_model extends CI_Model{

    public function getUsers($id = null){
        if($id === null){
            return $this->db->get('USERS')->result_array();
        }else {
            return $this->db->get_where('USERS', ['USR_ID' => $id])->result_array();
        }
        
    }

    public function deleteUsers($id){
        $this->db->delete('USERS', ['USR_ID' => $id]);
        return $this->db->affected_rows();
    }

    public function createUsers($data)
    {
        $this->db->insert('USERS', $data);
        return $this->db->affected_rows();
    }

    public function updateUsers($data, $id){
        $this->db->update('USERS', $data,['USR_ID'=>$id]);
        return $this->db->affected_rows();
    }

    public function getUserByName($name){
        return $this->db->get_where('USERS', ['USR_NAMA' => $name])->result_array();
    }
}