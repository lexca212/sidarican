<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function ambil_data(){

        return $this->db->get('data_kendaraan')->result();
    }

    

}

/* End of file Dashboard.php */


?>