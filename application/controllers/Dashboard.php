<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_dashboard');
        // if(!$this->session->userdata('logged_in')){
        //    echo "<script>alert('Silahkan Login');
        //     window.location.href='" . site_url('login') . "';
        //     </script>";
        // };
        check_sesi();
        
    }

    public function index()
    {
        $data['data'] = $this->M_dashboard->ambil_data();
        $data['title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('nama');
        

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer'); 
        
    }

    public function tambah()
    {
        $data['title'] = 'Form tambah data';
        $data['user'] = $this->session->userdata('nama');
        $data['bbm']  = $this->M_dashboard->databbm();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Dashboard/tambahdata', $data);
        $this->load->view('templates/footer');
        
    }

    public function simpan(){

        $data = [
            'nm_kendaraan' => $this->input->post('nm_kendaraan'),
            'merk_kendaraan' => $this->input->post('merk_kendaraan'),
            'nopol_kendaraan' => $this->input->post('nopol_kendaraan'),
            'kd_bbm' => $this->input->post('bbm_kendaraan'),
            'tahun_kendaraan' => $this->input->post('tahun_kendaraan')
        ];

        $this->M_dashboard->simpan($data);
        echo "<script>alert('Berhasil Hore!!');
            window.location.href='" . site_url('dashboard') . "';
            </script>";
    }
}