<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_perjalanan extends CI_Model
{

  public function ambil_data_dengan_kendaraan()
  {
    $this->db->select("
        perjalanan.*,
        data_kendaraan.*,
        DATE_FORMAT(perjalanan.tgl_perjalanan, '%Y-%m-%d') AS DATEONLY,
        DATE_FORMAT(perjalanan.tgl_perjalanan, '%H:%i:%s') AS TIMEONLY
    ", FALSE); // FALSE supaya CI tidak menambahkan backtick

    $this->db->from('perjalanan');
    $this->db->join('data_kendaraan', 'perjalanan.id_kendaraan = data_kendaraan.id_kendaraan');

    $query = $this->db->get();
    return $query->result();
  }
}

/* End of file Perjalanan.php */
