

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterbbm extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_masterbbm');
    }

    public function index() 
    {
        $data['title'] = 'Tambah Data';
        $data['user']  = $this->session->userdata('nama');
        $data['bbm']   = $this->M_masterbbm->ambildata();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('masterbbm/datamaster', $data, FALSE);
        $this->load->view('templates/footer');
        
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data';
        $data['user']  = 
        $this->session->userdata('nama');

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('View File', $data, FALSE);
        
        
        
        
    }
}