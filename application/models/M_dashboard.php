<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function ambil_data()
    {

        //return $this->db->get('data_kendaraan')->result();
        //return $this->db->join('master_bbm','data_kendaraan.kd_bbm=master_bbm.kd_bbm')->result();
        $this->db->select('data_kendaraan.*, master_bbm.*');

        $this->db->join('master_bbm', 'data_kendaraan.kd_bbm=master_bbm.kd_bbm', 'left');
        $query = $this->db->get('data_kendaraan');
        return $query->result();
    }

    // ambil data master bbm
    public function databbm()
    {
        return $this->db->get('master_bbm')->result();
    }
    // end 
    public function simpan($data)
    {
        return $this->db->insert('data_kendaraan', $data);
    }

    public function hapus($id)
    {
        return $this->db->where(
            'id_kendaraan',
            $id
        )->delete('data_kendaraan');
    }

    public function update($id_kendaraan, $data)
    {
        return $this->db->where('id_kendaraan', $id_kendaraan)->update('data_kendaraan', $data);
    }
}

/* End of file Dashboard.php */
