<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_masterbbm extends CI_Model {
    public function __construct() {
        parent::__construct();
        // this->load->database();
    }

    public function ambildata(){
        return $this->db->get('master_bbm')->result();
    }

    public function simpan($data)
    {
        return $this->db->insert('master_bbm', $data);
    }

    public function get_harga($jenis_bbm)
    {
        $this->db->select('harga_bbm');
        $this->db->from('master_bbm');
        $this->db->where('kd_bbm', $jenis_bbm);

        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->row()->harga_bbm;
        } else {
            return 0; 
        }
    }
}
?>