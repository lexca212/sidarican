<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_perawatan');
        $this->load->model('M_dashboard');
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

    public function tambah()
    {
      $data['kendaraan'] = $this->M_dashboard->ambil_data();
      $data['title'] = 'Tambah Data Perawatan';
      $data['user'] = $this->session->userdata('nama');

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('perawatan/formAdd', $data);
      $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $id_kendaraan = $this->input->post('id_kendaraan');
        $tgl_perawatan = $this->input->post('tgl_perawatan');
        $biaya = $this->input->post('biaya');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'id_kendaraan' => $id_kendaraan,
            'tgl_perawatan' => $tgl_perawatan,
            'biaya' => $biaya,
            'keterangan' => $keterangan,
        );

        $insert = $this->db->insert('perawatan_kendaraan', $data);

        if ($insert) {
            $this->session->set_flashdata('notif', [
                'type' => 'success',
                'message' => 'Data Perawatan berhasil disimpan!'
            ]);
        } else {
            $this->session->set_flashdata('notif', [
                'type' => 'error',
                'message' => 'Gagal menyimpan data perawatan.'
            ]);
        }

        redirect('perawatan');
    }
}
