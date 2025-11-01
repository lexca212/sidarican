<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembelianbbm extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        
    }

    public function ambil_data_pembelian_bbm()
    {
        $this->db->select("
            pembelian_bbm.*,
            master_bbm.*,
            data_kendaraan.*
        ", FALSE);

        $this->db->from('pembelian_bbm');
        $this->db->join('master_bbm', 'pembelian_bbm.kd_bbm = master_bbm.kd_bbm');
        $this->db->join('data_kendaraan', 'pembelian_bbm.id_kendaraan = data_kendaraan.id_kendaraan');
        $this->db->order_by('tanggal_beli', 'desc');

        $query = $this->db->get();
        return $query->result();
    }


}

?>