<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perjalanan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_perjalanan');
    }

    public function data()
    {
        $data['data'] = $this->M_perjalanan->ambil_data_dengan_kendaraan();
        $data['title'] = 'Data Perjalanan';

        // var_dump($data);
        // die(); // Debugging line to check data

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        
        $this->load->view('perjalanan', $data);
        $this->load->view('templates/footer'); 
        
    }
}
?>