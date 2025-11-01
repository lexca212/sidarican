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

  public function get_km_akhir_terakhir($id_kendaraan)
  {
      $this->db->select('km_akhir');
      $this->db->from('perjalanan');
      $this->db->where('id_kendaraan', $id_kendaraan);
      $this->db->order_by('tgl_perjalanan', 'DESC');
      $this->db->limit(1);

      $query = $this->db->get();

      if($query->num_rows() > 0){
          return $query->row()->km_akhir;
      } else {
          return 0; 
      }
  }
}

/* End of file Perjalanan.php */
