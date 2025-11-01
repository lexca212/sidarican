<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelianbbm extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_pembelianbbm');
        $this->load->model('M_dashboard');
        $this->load->model('M_masterbbm');

        check_sesi();
    }

    public function index() 
    {
        $data['pembelianbbm'] = $this->M_pembelianbbm->ambil_data_pembelian_bbm();
        $data['title'] = 'Data Pemebelian BBM';
        $data['user'] = $this->session->userdata('nama');
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bbm/data', $data);
        $this->load->view('templates/footer');
        
        
        
    }

    public function tambah()
    {
        $data['kendaraan'] = $this->M_dashboard->ambil_data();
        $data['bbm'] = $this->M_masterbbm->ambildata();
        $data['title'] = 'Tambah Data Pembelian BBM';
        $data['user'] = $this->session->userdata('nama');

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bbm/formAdd', $data);
        $this->load->view('templates/footer');
    }

    public function get_harga_bbm()
    {
        $jenis_bbm = $this->input->post('jenis_bbm');

        $harga_bbm = $this->M_masterbbm->get_harga($jenis_bbm);

        if($jenis_bbm){
            echo json_encode(['status' => 'success', 'harga_bbm' => $harga_bbm]);
        } else {
            echo json_encode(['status' => 'empty', 'harga_bbm' => 0]);
        }
    }

    public function simpan()
    {
        $id_kendaraan = $this->input->post('id_kendaraan');
        $tanggal_beli = $this->input->post('tanggal_beli');
        $kd_bbm = $this->input->post('jenis_bbm');
        $harga_bbm = $this->input->post('harga_bbm');
        $jml_liter_bbm = $this->input->post('jml_liter_bbm');
        $jml_harga_bbm = $this->input->post('jml_harga_bbm');

        $data = array(
            'id_kendaraan' => $id_kendaraan,
            'tanggal_beli' => $tanggal_beli,
            'kd_bbm' => $kd_bbm,
            'harga_bbm' => $harga_bbm,
            'jml_liter_bbm' => $jml_liter_bbm,
            'jml_harga_bbm' => $jml_harga_bbm
        );

        $this->db->insert('pembelian_bbm', $data);

        redirect('pembelianbbm');
    }
}