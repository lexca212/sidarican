<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perawatan extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        
    }

    public function ambil_data()
    {
        $this->db->select("
            perawatan_kendaraan.*,
            data_kendaraan.*
        ", FALSE);

        $this->db->from('perawatan_kendaraan');
        $this->db->join('data_kendaraan', 'perawatan_kendaraan.id_kendaraan = data_kendaraan.id_kendaraan');
        $this->db->order_by('tgl_perawatan', 'desc');

        $query = $this->db->get();
        return $query->result();
    }


}

?>