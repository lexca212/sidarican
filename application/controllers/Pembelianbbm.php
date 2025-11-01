<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelianbbm extends CI_Controller {
    public function __construct() {
        parent::__construct();
        //$this->load->model('M_pembelianbbm');
    }

    public function index() 
    {
        $data['title'] = 'Data Pemebelian BBM';
        $data['user'] = 
        $this->session->userdata('nama');
        
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bbm/data');
        $this->load->view('templates/footer');
        
        
        
    }
}