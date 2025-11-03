<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gantioli extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        
    }

    public function ambil_data()
    {
        $this->db->select("
            ganti_oli.*,
            data_kendaraan.*
        ", FALSE);

        $this->db->from('ganti_oli');
        $this->db->join('data_kendaraan', 'ganti_oli.id_kendaraan = data_kendaraan.id_kendaraan');
        $this->db->order_by('tgl_ganti  ', 'desc');

        $query = $this->db->get();
        return $query->result();
    }


}

?>