<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_dashboard');
        if(!$this->session->userdata('logged_in')){
           echo "<script>alert('Silahkan Login');
            window.location.href='" . site_url('login') . "';
            </script>";
        };
        
    }

    public function index()
    {
        $data['data'] = $this->M_dashboard->ambil_data();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer'); 
        
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Dashboard/tambahdata');
        $this->load->view('templates/footer');
        
        

        
        
    }
}