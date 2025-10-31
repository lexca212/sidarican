<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_dashboard');
    }

    public function data()
    {
        $data['data'] = $this->M_dashboard->ambil_data();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer'); 
        
    }
}