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
}
?>