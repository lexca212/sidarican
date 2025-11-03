<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_perawatan');
        // $this->load->model('M_dashboard');
        // $this->load->model('M_masterbbm');

        check_sesi();
    }

    public function index() 
    {
        $data['perawatan'] = $this->M_perawatan->ambil_data();
        $data['title'] = 'Data Perawatan Kendaraan';
        $data['user'] = $this->session->userdata('nama');
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('perawatan/index', $data);
        $this->load->view('templates/footer');
        
        
        
    }
}
